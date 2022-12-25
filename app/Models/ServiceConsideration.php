<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ResPartner;

class ServiceConsideration extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'service_considerations';

    public function customers()
    {
        return $this->hasMany(ResPartner::class);
    }
}
