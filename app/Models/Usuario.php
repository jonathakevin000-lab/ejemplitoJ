<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Hacemos referencai a ala tabla usuarios
    protected $table = 'usuarios';
    //Hacaer que los campos sean editables
    protected $fillable = [
        'nombre',
        'apaterno',
        'amaterno',
        'email',
        'password',
        'telefono',
        'activo'
    ];
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(
            Rol::class,
            'usuario_rol',
            'usuario_id',
            'rol_id'
        );
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'docente_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'estudiante_id');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'estudiante_id');
    }
}
