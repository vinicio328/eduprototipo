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
}