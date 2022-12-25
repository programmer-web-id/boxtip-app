<?php

use Illuminate\Support\Facades\Schema;

if (!function_exists("getQueryFields")) {
    function getQueryFields($table)
    {
        $raw = Schema::getColumnListing($table);
        return sanitizeFields($table, $raw);
    }
}

if (!function_exists("sanitizeFields")) {
    function sanitizeFields($table, $raw)
    {
        $COMMON = ['id', 'created_at', 'updated_at'];
        $SPECIFIC = [
            'res_partners' => [
                'user_id',
                'type',
                'is_new_to_taobao',
                'regular_bought_product_id',
                'service_consideration_id',
                'province_id',
                'city_id',
                'district_id'
            ],
            'vouchers' => ['res_partner_id'],
        ];

        foreach (array_merge($COMMON, $SPECIFIC[$table]) as $value) {
            if (($key = array_search($value, $raw)) !== false) {
                unset($raw[$key]);
            }
        }

        return $raw;
    }
}
