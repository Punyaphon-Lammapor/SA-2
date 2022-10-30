<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Used extends Model
{
    use HasFactory;

    public function material() {
        $this->belongsTo(Material::class);
    }

    public function product() {
        $this->belongsTo(Product::class);
    }
}
