<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table;
    protected $fillable = ['respuestas','pregunta_id','tipo'];

    public function preg()
    {
    	return $this->belongsTo('App\Pregunta');
    }
}
