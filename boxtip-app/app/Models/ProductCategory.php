<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ResPartner;

class ProductCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'product_categories';

    public function customers()
    {
        return $this->hasMany(ResPartner::class);
    }
}
