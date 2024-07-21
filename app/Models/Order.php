<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'payment_id',
        'order_date',
        'total',
        'status',
        'created_at',
        'updated_at'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function shipper()
    {
        return $this->hasOne(Shipper::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id');
    }
    
    
}

