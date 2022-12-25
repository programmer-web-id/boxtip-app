<?php

namespace App\Exports;

use App\Models\Voucher;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VouchersExport implements FromArray, WithHeadings
{
    private $ids;

    public function setIds(array $ids)
    {
        $this->ids = $ids;
    }

    public function array(): array
    {
        $vouchers = Voucher::select('voucher_code', 'type', 'issued_date', 'expired_date', 'used_date', 'remarks')->whereIn('id', $this->ids)->get();
        $returnValues = [];

        foreach ($vouchers as $voucher) {
            # code...
            $voucherObj = Voucher::where('voucher_code', $voucher->voucher_code)->first();
            $partners = "";
            $counter = 1;
            foreach ($voucherObj->resPartners as $partner) {
                if ($counter == 1) {
                    $partners .= $partner->code . '-' . $partner->name;
                } else {
                    $partners .= ', ' . $partner->code . '-' . $partner->name;
                }
                $counter += 1;
            }
            array_push(
                $returnValues,
                [
                    $voucher->voucher_code,
                    $voucher->type,
                    $voucher->issued_date,
                    $voucher->expired_date,
                    $voucher->used_date,
                    $partners,
                    $voucher->remarks,
                ]
            );
        }
        return $returnValues;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ['Voucher Code', 'Voucher Type', 'Issued Date', 'Expired Date', 'Used Date', 'Customers', 'Remarks'];
    }
}
