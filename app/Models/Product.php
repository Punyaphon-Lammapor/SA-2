<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function order() {
        $this->belongsTo(Order::class);
    }

    public function uses() {
        $this->hasMany(Used::class);
    }
}
