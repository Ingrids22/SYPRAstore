<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipper extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'tracking_number', 'phone', 'parcel', 'shipping_date', 'arrival_date'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
