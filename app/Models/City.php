<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Province;
use App\Models\District;
use App\Models\ResPartner;

class City extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function partners()
    {
        return $this->hasMany(ResPartner::class);
    }

    public static function getDistricts($id)
    {
        return City::findOrFail($id)->districts->map(function ($district) {
            return collect($district)->only(['id', 'name']);
        });
    }
}
