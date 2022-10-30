<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function orderStatus() {
        $this->belongsTo(OrderStatus::class);
    }

    public function customer() {
        $this->belongsTo(Customer::class);
    }

    public function products() {
        $this->hasMany(Product::class);
    }

    public function deliveryNote() {
        $this->hasOne(DeliveryNote::class);
    }

    public function problems() {
        $this->hasMany(Problem::class);
    }
}
