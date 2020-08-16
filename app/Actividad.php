<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    
    protected $fillable = [
		'nombre',
		'descripcion',
        'valor',
        'curso_id'
    ];
    
    protected $table = 'actividades';

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
