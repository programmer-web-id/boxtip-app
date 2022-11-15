<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ResPartner;
use App\Models\Voucher;
use App\Models\IrSequence;

use App\Exports\VouchersExport;
use Maatwebsite\Excel\Facades\Excel;

class VoucherController extends Controller
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
        $voucher = new Voucher;
        //        
        return view('voucher.tree', [
            'title' => 'Voucher',
            'path' => '/voucher',
            'vouchers' => Voucher::all(),
            'fields' => $voucher->getTableColumns(),
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
        return view('voucher.form', [
            'title' => 'Voucher',
            'view_mode' => 'create',
            'data' => False,
            'header' => False,
            'customer_ids' => ResPartner::where('type', 'customer')->get(),
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
        // dd($request);
        $voucher = new Voucher();
        $today = date('Y/m/d');

        $validatedData = $request->validate([
            // 'voucher_code' => 'required',
            'type' => 'required',
            'customer_ids' => 'required',
            'expired_date' => 'required_if:type,general',
        ]);
        $voucherCode = $voucher->generateVoucherCode(
            IrSequence::where(['model' => 'vouchers', 'sequence_code' => 'signup.voucher'])->first()
        );
        $new = Voucher::create([
            'voucher_code' => $voucherCode,
            'type' => $request->type,
            'issued_date' => $today,
            'expired_date' => date('Y/m/d', strtotime('+1 month', strtotime($today))),
            'used_date' => $request->used_date,
            'remarks' => $request->remarks,
        ]);
        $new->resPartners()->attach($request->customer_ids);
        return redirect('/voucher/' . $new->id);
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
        $data = Voucher::findOrFail($id);
        return view('voucher.form', [
            'title' => 'Voucher',
            'data' => $data,
            'header' => $data->voucher_code,
            'view_mode' => 'read',
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
        $data = Voucher::findOrFail($id);
        // dd($data->resPartners()->pluck('res_partner_id'));
        return view('voucher.form', [
            'title' => 'Voucher',
            'data' => $data,
            'header' => $data->voucher_code,
            'view_mode' => 'edit',
            'customer_ids' => ResPartner::where('type', 'customer')->get(),
            'rel_customer_ids' => $data->resPartners()->pluck('res_partner_id')->all(),
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
        $voucher = Voucher::findOrFail($id);
        $validatedData = $request->validate([
            'expired_date' => 'required',
            'customer_ids' => 'required',
        ]);

        $voucher->expired_date = $request->expired_date;
        $voucher->used_date = $request->used_date;
        $voucher->remarks = $request->remarks;

        $voucher->save();
        $voucher->resPartners()->detach();
        $voucher->resPartners()->attach($request->customer_ids);

        return redirect('/voucher/' . $id);
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
        Voucher::destroy($ids);
        return redirect('/voucher');
    }
    public function export($ids)
    {
        $vouchers = new VouchersExport();
        $vouchers->setIds(explode(',', $ids));

        return Excel::download($vouchers, 'vouchers.xlsx');
    }
}
