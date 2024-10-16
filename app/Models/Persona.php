<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    function direcciones(){
        return $this->hasMany(Direccion::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }

}
