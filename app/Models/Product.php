<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'supplier_id', 'name', 'existence', 'price', 'stock_max', 'stock_min', 'status', 'description'
    ];

    protected $appends = ['image_url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getImageUrlAttribute()
    {
        $image = $this->images()->first();
        return $image ? asset('storage/' . $image->route) : null;
    }

    public function discountedProducts()
    {
        return $this->hasMany(DiscountedProduct::class);
    }
}
