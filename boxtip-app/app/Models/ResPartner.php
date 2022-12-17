<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Voucher;
use App\Models\ProductCategory;
use App\Models\ServiceConsideration;

use App\Models\Province;
use App\Models\City;
use App\Models\District;

use App\Models\IrSequence;
use PDO;

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

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public static function archive($ids)
    {
        return ResPartner::whereIn('id', $ids)->update(['active' => 0]);
    }

    public static function unarchive($ids)
    {
        return ResPartner::whereIn('id', $ids)->update(['active' => 1]);
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
