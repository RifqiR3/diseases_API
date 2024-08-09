<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    use HasFactory;

    public function Symptoms()
    {
        return $this->hasMany(Symptoms::class);
    }
}
