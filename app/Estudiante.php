<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
	protected $fillable = [
		'nombres',
		'apellidos',
		'email',
		'carnet'
	];

	public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'curso_estudiante');
    }
}
