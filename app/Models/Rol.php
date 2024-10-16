<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';

    function usuarios(){
        return $this->belongsToMany(User::class, 'rol_usuario', 'rol_id', 'usuario_id');
    }
}
