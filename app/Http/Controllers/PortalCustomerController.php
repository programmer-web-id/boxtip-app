<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ResPartner;
use App\Models\ServiceConsideration;
use App\Models\IrSequence;
use App\Models\Voucher;

use App\Models\Province;
use App\Models\City;

use App\Http\Requests\CustomerRequest;

class PortalCustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $city_ids = [];
        $district_ids = [];
        if (old('province_id')) {
            $city_ids = Province::getCities(old('province_id'));
            if (old('city_id')) {
                $district_ids = City::getDistricts(old('city_id'));
            };
        }
        return view('portal.customer.create', [
            'regular_bought_product_ids' => ProductCategory::all(),
            'service_consideration_ids' => ServiceConsideration::all(),
            'province_ids' => Province::all(),
            'city_ids' => $city_ids,
            'district_ids' => $district_ids,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $resPartner = new ResPartner();
        $voucher = new Voucher();
        $sequenceId = IrSequence::where(['model' => 'res_partners', 'sequence_code' => 'create.customer'])->first();

        $new = ResPartner::create([
            'code' => $resPartner->generateCustomerCode($sequenceId),
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

        return redirect('/portal/customer')->with('created', [true, $new, $newVoucher]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
