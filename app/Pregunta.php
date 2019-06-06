<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    protected $table;
    protected $fillable = ['preguntas','tipo'];

    public function resp()
    {
    	return $this->hasMany('App\Respuesta');
    }
}
