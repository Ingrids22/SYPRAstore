<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'supplier_id', 'name', 'existence', 'price', 'stock_max', 'stock_min', 'status', 'description', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function image_url()
    {
        return asset('storage/' . $this->image);
    }


    public function discountedProducts()
    {
        return $this->hasMany(DiscountedProduct::class);
    }
}
