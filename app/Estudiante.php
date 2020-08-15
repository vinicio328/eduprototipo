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
}
