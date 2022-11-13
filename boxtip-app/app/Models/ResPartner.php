<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voucher;
use App\Models\ProductCategory;
use App\Models\ServiceConsideration;

class ResPartner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function regularBoughtProduct()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function serviceConsideration()
    {
        return $this->belongsTo(ServiceConsideration::class);
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function getTableColumns()
    {
        $raw = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        $raw = $this->removeBaseColumns($raw);
        return $raw;
    }

    public function removeBaseColumns($array)
    {
        $VALUES = ['id', 'created_at', 'updated_at', 'user_id', 'type'];
        foreach ($VALUES as $value) {
            if (($key = array_search($value, $array)) !== false) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}
