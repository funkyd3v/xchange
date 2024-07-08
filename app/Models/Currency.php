<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'amount',
        'image',
        'dollar'
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
