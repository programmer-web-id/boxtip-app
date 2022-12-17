<?php

namespace App\Exports;

use App\Models\ResPartner;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResPartnersExport implements FromArray, WithHeadings
{
    private $ids;

    public function setIds(array $ids)
    {
        $this->ids = $ids;
    }

    public function array(): array
    {
        $customers = ResPartner::select('code', 'old_code', 'name', 'birth_date', 'is_male', 'email', 'phone', 'address', 'province', 'city', 'district', 'is_new_to_taobao', 'regular_bought_product_id', 'service_consideration_id')->whereIn('id', $this->ids)->get();
        $returnValues = [];

        foreach ($customers as $customer) {
            # code...
            array_push(
                $returnValues,
                [
                    $customer->code,
                    $customer->old_code,
                    $customer->name,
                    $customer->birth_date,
                    $customer->is_male ? 'Male' : 'Female',
                    $customer->email,
                    $customer->phone,
                    $customer->address,
                    $customer->province,
                    $customer->city,
                    $customer->district,
                    $customer->is_new_to_taobao ? 'Yes' : 'No',
                    $customer->regularBoughtProduct->name,
                    $customer->serviceConsideration->name,
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
        return ["Code", "Old Code", "Name", "Birth Date", "Gender", "Email", "Phone", "Address", "Province", "City", "District", "New to Taobao", "Regular Bought Product", "Service Consideration"];
    }
}
