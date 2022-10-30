<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function province() {
        $this->belongsTo(Customer::class);
    }

    public function orders() {
        $this->hasMany(Order::class);
    }
}
