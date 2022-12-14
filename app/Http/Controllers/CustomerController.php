<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ProductCategory;
use App\Models\ResPartner;
use App\Models\ServiceConsideration;
use App\Models\IrSequence;
use App\Models\Voucher;
use App\Models\Province;
use App\Models\City;

use App\Exports\ResPartnersExport;
use App\Http\Requests\CustomerRequest;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $customers = ($request->all()) ? $this->search($request) : ResPartner::where('active', 1)->where('type', 'customer')->get();

        return view('backend.customer.index', [
            'title' => 'Customer',
            'path' => '/customer',
            'delete' => False,
            'archive' => True,
            'unarchive' => True,
            'customers' => $customers,
            'fields' => getQueryFields('res_partners'),
        ]);
    }

    public function search(Request $request)
    {
        $query = "";
        foreach ($request->all() as $key => $value) {
            $query .= (($key === array_key_first($request->all())) ? "" : " AND ") . "UPPER({$key}) LIKE UPPER('%{$value}%')";
        };
        return ResPartner::whereRaw($query)->where('type', 'customer')->get();
    }

    public function create()
    {
        //
        $city_ids = [];
        $district_ids = [];
        if (old('province_id')) {
            $city_ids = Province::getCities(old('province_id'));
            if (old('city_id')) {
                $district_ids = City::getDistricts(old('city_id'));
            }
        }

        return view('backend.customer.create', [
            'title' => 'Customer',
            'view_mode' => 'create',
            'regular_bought_product_ids' => ProductCategory::all(),
            'service_consideration_ids' => ServiceConsideration::all(),
            'province_ids' => Province::all(),
            'city_ids' => $city_ids,
            'district_ids' => $district_ids,
        ]);
    }

    public function store(CustomerRequest $request)
    {
        $resPartner = new ResPartner();
        $voucher = new Voucher();
        $sequenceId = IrSequence::where(['model' => 'res_partners', 'sequence_code' => 'create.customer'])->first();

        $new = ResPartner::create([
            'code' => $resPartner->generateCustomerCode($sequenceId),
            'old_code' => $request->old_code,
            'type' => 'customer',
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'is_male' => $request->is_male,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'is_new_to_taobao' => $request->is_new_to_taobao,
            'regular_bought_product_id' => $request->regular_bought_product_id,
            'service_consideration_id' => $request->service_consideration_id,
        ]);

        if ($new) {
            $newVoucher = $voucher->generateVoucher($new, IrSequence::where(['model' => 'vouchers', 'sequence_code' => 'signup.voucher'])->first());
        }

        return redirect('/customer/' . $new->id)->with('created', [true, $new, $newVoucher]);
    }

    public function show($id)
    {
        $data = ResPartner::findOrFail($id);
        //
        return view('backend.customer.show', [
            'title' => 'Customer',
            'data' => $data,
            'header' => $data->name,
            'view_mode' => 'read',
            'regular_bought_product_ids' => ProductCategory::all(),
            'service_consideration_ids' => ServiceConsideration::all(),
        ]);
    }

    public function edit($id)
    {
        $data = ResPartner::findOrFail($id);
        $city_ids = [];
        $district_ids = [];

        if ($data->province_id) {
            $city_ids = Province::getCities($data->province_id);
            if ($data->city_id) {
                $district_ids = City::getDistricts($data->city_id);
            }
        }
        return view('backend.customer.edit', [
            'title' => 'Customer',
            'data' => $data,
            'header' => $data->name,
            'view_mode' => 'edit',
            'service_consideration_ids' => ServiceConsideration::all(),
            'regular_bought_product_ids' => ProductCategory::all(),
            'province_ids' => Province::all(),
            'city_ids' => $city_ids,
            'district_ids' => $district_ids,
        ]);
    }

    public function update(CustomerRequest $request, $id)
    {
        $customer = ResPartner::findOrFail($id);

        $customer->old_code = $request->old_code;
        $customer->name = $request->name;
        $customer->birth_date = $request->birth_date;
        $customer->is_male = $request->is_male;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->province_id = $request->province_id;
        $customer->city_id = $request->city_id;
        $customer->district_id = $request->district_id;
        $customer->is_new_to_taobao = $request->is_new_to_taobao;
        $customer->regular_bought_product_id = $request->regular_bought_product_id;
        $customer->service_consideration_id = $request->service_consideration_id;

        $customer->save();

        return redirect('/customer/' . $id);
    }

    public function destroy($id)
    {
        $ids = explode(',', $id);
        ResPartner::destroy($ids);
        return redirect('/customer');
    }

    public function archive($id)
    {
        $ids = explode(',', $id);
        ResPartner::archive($ids);
        return redirect('/customer');
    }

    public function unarchive($id)
    {
        $ids = explode(',', $id);
        ResPartner::unarchive($ids);
        return redirect('/customer');
    }

    public function export($ids)
    {
        $customers = new ResPartnersExport();
        $customers->setIds(explode(',', $ids));

        return Excel::download($customers, 'customers.xlsx');
    }
}
