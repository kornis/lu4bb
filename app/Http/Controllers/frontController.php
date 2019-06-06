<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;

class frontController extends Controller
{
    public function index()
    {
    	return view('cuestionario.index');
    }

    public function cuestionario(Request $request,$reiniciar=null)
    {
    		
		if($reiniciar != "reiniciar")
		{
    		$contador = $request->session()->get('count',0)+1;
	    	$rango = Pregunta::all();
	    	$rand = rand(1,$rango->count());
	    	$pregunta = Pregunta::find($rand);
	    	$respuestas = Respuesta::where('pregunta_id',$rand)->get();
	    	return view('cuestionario.comenzar')->with('pregunta',$pregunta)->with('respuestas',$respuestas)->with('contador',$contador);    		
	    }
	    else
	    {
	    	session()->put('count',0);
		    $contador = $request->session()->get('count',0)+1;
	    	$rango = Pregunta::all();
	    	$rand = rand(1,$rango->count());
	    	$pregunta = Pregunta::find($rand);
	    	$respuestas = Respuesta::where('pregunta_id',$rand)->get();
	    	return view('cuestionario.comenzar')->with('pregunta',$pregunta)->with('respuestas',$respuestas)->with('contador',$contador);
		}
	}
}
