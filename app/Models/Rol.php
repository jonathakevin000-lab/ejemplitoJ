<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    // Hacemos referencai a ala tabla usuarios
    protected $table = 'roles';
    //Hacaer que los campos sean editables
    protected $fillable = [
        'id',
        'nombre',
    ];
    use HasFactory;

    public function usuarios()
    {
        return $this->belongsToMany(
            Usuario::class,
            'usuario_rol',
            'rol_id',
            'usuario_id'
        );
    }
}
