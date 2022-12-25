<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ResPartner;
use App\Models\IrSequence;

class Voucher extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resPartners()
    {
        return $this->belongsToMany(ResPartner::class, 'res_partner_voucher');
    }

    public function generateVoucherCode(IrSequence $sequenceId)
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

    public function generateVoucher(ResPartner $partnerId, IrSequence $sequenceId)
    {
        $today = date('Y/m/d');
        $new = $this->create([
            'voucher_code' => $this->generateVoucherCode($sequenceId),
            'type' => 'personal',
            'issued_date' => $today,
            'expired_date' => date('Y/m/d', strtotime("now +1 month")),
        ]);
        $partnerId->vouchers()->attach($new);
        return $new;
    }
}
