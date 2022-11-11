<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductCategory;
use App\Models\ServiceConsideration;

class ResPartner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function regular_bought_product_id()
    {
        return $this->hasOne(ProductCategory::class);
    }
    public function service_consideration_id()
    {
        return $this->hasOne(ServiceConsideration::class);
    }
}
