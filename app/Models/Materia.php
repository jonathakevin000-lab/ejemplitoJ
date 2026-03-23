<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';

    protected $fillable = [
        'nombre',
        'descripcion',
        'creditos',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id');
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class, 'materia_id');
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class, 'materia_id');
    }
}
