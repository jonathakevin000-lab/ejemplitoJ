<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    protected $table = 'grupos';

    protected $fillable = [
        'nombre',
        'semestre',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'grupo_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'grupo_id');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'grupo_id');
    }
}
