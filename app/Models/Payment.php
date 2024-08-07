<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [ 'payer_id', 'payer_email', 'amount', 'currency']; // Asegúrate de tener los campos adecuados aquí

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
