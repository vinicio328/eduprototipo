<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    public function curso()
    {
        return $this->belongsTo('App\Curso');
    }
}
