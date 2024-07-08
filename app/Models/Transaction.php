<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_currency',
        'receive_currency',
        'send_currency_amount',
        'receive_currency_amount',
        'image',
        'user_id',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);  
    }
}
