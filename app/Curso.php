<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
		'nombre',
		'descripcion',
		'codigo',
		'ciclo',
		'semestre'
	];
	
    public function actividades()
    {
        return $this->hasMany('App\Actividad');
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'curso_estudiante');
    }
}
