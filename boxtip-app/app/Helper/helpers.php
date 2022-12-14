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
            'res_partners' => ['user_id', 'type'],
            'vouchers' => ['res_partner_id'],
        ];

        foreach (($COMMON + $SPECIFIC[$table]) as $value) {
            if (($key = array_search($value, $raw)) !== false) {
                unset($raw[$key]);
            }
        }

        return $raw;
    }
}
