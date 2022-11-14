<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voucher;
use App\Models\ProductCategory;
use App\Models\ServiceConsideration;

use App\Models\IrSequence;

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
        return $this->belongsToMany(Voucher::class, 'res_partner_voucher');
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

    public function generateCustomerCode(IrSequence $sequenceId)
    {
        if ($sequenceId->is_number) {
            $newSequence = $sequenceId->prefix . str_pad($sequenceId->running_number, $sequenceId->length, '0', STR_PAD_LEFT);
            if ($newSequence) {
                $sequenceId->running_number += 1;
                $sequenceId->save();
            }
            return $newSequence;
        } else {
            return $sequenceId->prefix . substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($sequenceId->length / strlen($x)))), 1, $sequenceId->length);
        }
    }
}
