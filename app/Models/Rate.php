<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'buy_rate',
        'sale_rate',
        'currency_id',
    ];

    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
