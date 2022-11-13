<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductCategory;
use App\Models\ResPartner;
use App\Models\ServiceConsideration;
use App\Models\IrSequence;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partner = new ResPartner;

        return view('customer.tree', [
            'title' => 'Customer',
            'customers' => ResPartner::where('type', 'customer')->get(),
            'fields' => $partner->getTableColumns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('customer.form', [
            'title' => 'Customer',
            'data' => False,
            'view_mode' => 'create',
            'regular_bought_product_ids' => ProductCategory::all(),
            'service_consideration_ids' => ServiceConsideration::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sequence = IrSequence::where(['model' => 'res_partners', 'sequence_code' => 'create.customer'])->first();

        $validatedData = $request->validate([
            'name' => ['required'],
            'birth_date' => ['required'],
            'is_male' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'is_new_to_taobao' => ['required'],
            'regular_bought_product_id' => ['required'],
            'service_consideration_id' => ['required'],
        ]);


        $new = ResPartner::create([
            'code' => $sequence->prefix . str_pad($sequence->running_number, $sequence->length, '0', STR_PAD_LEFT),
            'old_code' => $request->old_code,
            'type' => 'customer',
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'is_male' => $request->is_male,
            'email' => $request->email,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'is_new_to_taobao' => $request->is_new_to_taobao,
            'regular_bought_product_id' => $request->regular_bought_product_id,
            'service_consideration_id' => $request->service_consideration_id,
        ]);

        if ($new) {
            $sequence->running_number += 1;
            $sequence->save();
        };

        return redirect('/customer/' . $new->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('customer.form', [
            'title' => 'Customer',
            'data' => ResPartner::findOrFail($id),
            'view_mode' => 'read',
            'regular_bought_product_ids' => ProductCategory::all(),
            'service_consideration_ids' => ServiceConsideration::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('customer.form', [
            'title' => 'Customer',
            'data' => ResPartner::findOrFail($id),
            'view_mode' => 'edit',
            'service_consideration_ids' => ServiceConsideration::all(),
            'regular_bought_product_ids' => ProductCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required'],
            'birth_date' => ['required'],
            'is_male' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'province' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'is_new_to_taobao' => ['required'],
            'regular_bought_product_id' => ['required'],
            'service_consideration_id' => ['required'],
        ]);
        //
        $customer = ResPartner::findOrFail($id);

        // $customer->code = $request->code;
        $customer->old_code = $request->old_code;
        $customer->name = $request->name;
        $customer->birth_date = $request->birth_date;
        $customer->is_male = $request->is_male;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->province = $request->province;
        $customer->city = $request->city;
        $customer->district = $request->district;
        $customer->is_new_to_taobao = $request->is_new_to_taobao;
        $customer->regular_bought_product_id = $request->regular_bought_product_id;
        $customer->service_consideration_id = $request->service_consideration_id;

        $customer->save();

        return redirect('/customer/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ids = explode(',', $id);
        ResPartner::destroy($ids);
        return redirect('/customer');
    }
}
