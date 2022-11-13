<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ResPartner as Partner;
use App\Models\ProductCategory;
use App\Models\ResPartner;
use App\Models\ServiceConsideration;

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
            'customers' => Partner::where('type', 'customer')->get(),
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
        //
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
            'data' => Partner::findOrFail($id),
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
            'data' => Partner::findOrFail($id),
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
        //
        $customer = ResPartner::findOrFail($id);

        $customer->code = $request->input('code');
        $customer->old_code = $request->input('old_code');
        $customer->name = $request->input('name');
        $customer->birth_date = $request->input('birth_date');
        $customer->is_male = $request->input('is_male');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->province = $request->input('province');
        $customer->city = $request->input('city');
        $customer->district = $request->input('district');
        $customer->is_new_to_taobao = $request->input('is_new_to_taobao');
        $customer->regular_bought_product_id = $request->input('regular_bought_product_id');
        $customer->service_consideration_id = $request->input('service_consideration_id');

        $customer->save();
        // dd($customer);

        return redirect('/customer/${id}');
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
    }
}
