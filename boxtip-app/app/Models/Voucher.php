<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ResPartner;

class Voucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resPartner()
    {
        return $this->belongsTo(ResPartner::class);
    }

    public function getTableColumns()
    {
        $raw = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        return $this->removeBaseColumns($raw);
    }

    public function removeBaseColumns($array)
    {
        $VALUES = ['id', 'created_at', 'updated_at', 'res_partner_id'];
        foreach ($VALUES as $value) {
            if (($key = array_search($value, $array)) !== false) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}
