<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\City;
use App\Models\District;
use App\Models\ResPartner;

class Province extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function districts()
    {
        return $this->hasManyThrough(District::class, City::class);
    }

    public function partners()
    {
        return $this->hasMany(ResPartner::class);
    }

    public static function getCities($id)
    {
        return Province::findOrFail($id)->cities->map(function ($city) {
            return collect($city)->only(['id', 'name']);
        });
    }
}
