<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemStatus extends Model
{
    use HasFactory;

    public function problems() {
        $this->hasMany(Problem::class);
    }
}
