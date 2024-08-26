<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    function followers() {
        return $this->belongsToMany(User::class);
    }
    function following() {
        return $this->belongsToMany(User::class);
    }
}
