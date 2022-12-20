<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ResPartner;
use App\Models\Voucher;
use App\Models\IrSequence;

use App\Exports\VouchersExport;

use App\Http\Requests\VoucherRequest;

use Maatwebsite\Excel\Facades\Excel;

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $vouchers = ($request->all()) ? $this->search($request) : Voucher::all();
        return view('backend.voucher.index', [
            'title' => 'Voucher',
            'path' => '/voucher',
            'delete' => True,
            'archive' => False,
            'unarchive' => False,
            'vouchers' => $vouchers,
            'fields' => getQueryFields('vouchers'),
        ]);
    }

    public function search(Request $request)
    {
        $query = "";
        foreach ($request->all() as $key => $value) {
            $query .= (($key === array_key_first($request->all())) ? "" : " AND ") . "UPPER({$key}) LIKE UPPER('%{$value}%')";
        };
        return ResPartner::whereRaw($query)->get();
    }

    public function create()
    {
        return view('backend.voucher.create', [
            'title' => 'Voucher',
            'view_mode' => 'create',
            'customer_ids' => ResPartner::where('type', 'customer')->get(),
        ]);
    }

    public function store(VoucherRequest $request)
    {
        $voucher = new Voucher();
        $today = date('Y/m/d');

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

    public function show($id)
    {
        $data = Voucher::findOrFail($id);
        return view('backend.voucher.show', [
            'title' => 'Voucher',
            'data' => $data,
            'header' => $data->voucher_code,
            'view_mode' => 'read',
        ]);
    }

    public function edit($id)
    {
        $data = Voucher::findOrFail($id);
        return view('backend.voucher.edit', [
            'title' => 'Voucher',
            'data' => $data,
            'header' => $data->voucher_code,
            'view_mode' => 'edit',
            'customer_ids' => ResPartner::where('type', 'customer')->get(),
            'rel_customer_ids' => $data->resPartners()->pluck('res_partner_id')->all(),
        ]);
    }

    public function update(VoucherRequest $request, $id)
    {
        $voucher = Voucher::findOrFail($id);

        $voucher->expired_date = $request->expired_date;
        $voucher->used_date = $request->used_date;
        $voucher->remarks = $request->remarks;

        $voucher->save();
        $voucher->resPartners()->detach();
        $voucher->resPartners()->attach($request->customer_ids);

        return redirect('/voucher/' . $id);
    }

    public function destroy($id)
    {
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
