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
    		$rango = Pregunta::all();
	    	$rand = rand(1,$rango->count());
	    	$pregunta = Pregunta::find($rand);
	    	$respuestas = Respuesta::where('pregunta_id',$rand)->get();
    		$incorrectas = $request->session()->get('incorrectas');
		if($reiniciar != "reiniciar")
		{
			$contador = session('count',0)+1;
	    	return view('cuestionario.comenzar')->with('pregunta',$pregunta)->with('respuestas',$respuestas)->with('contador',$contador)->with('incorrectas',$incorrectas);    		
	    }
	    else
	    {
	    	session()->put('correctas',0);
	    	session()->put('count',0);
	    	session()->put('incorrectas',0);
		    $contador = $request->session()->get('count',0)+1;
		    $incorrectas = $request->session()->get('incorrectas');

	    	return view('cuestionario.comenzar')->with('pregunta',$pregunta)->with('respuestas',$respuestas)->with('contador',$contador)->with('incorrectas',$incorrectas);
		}
	}
}
