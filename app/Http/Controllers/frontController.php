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

    public function num_random($inicial,$final)
    {
 
    	return $rand;
    }

    public function cuestionario(Request $request,$reiniciar=null)
    {
    		$i = $request->session()->get('contador',0);
    		$max = 2;
    		$rango = Pregunta::all();
    		$arr = array();
    		$rand = rand(1,count($rango));
    		$pregunta = "";
    		$respuestas ="";
    		$incorrectas ="";



		if($reiniciar != "reiniciar")
		{
			$contador = session('count',0)+1;
	    	return view('cuestionario.comenzar')->with('pregunta',$this->pregunta)->with('respuestas',$respuestas)->with('contador',$contador)->with('incorrectas',$incorrectas);    		
	    }
	    if($reiniciar == "reiniciar")
	    {
	    	session()->put('contador',0);
	    	session()->put('correctas',0);
	    	session()->put('count',0);
	    	session()->put('incorrectas',0);
		    $contador = $request->session()->get('count',0)+1;
		    $incorrectas = $request->session()->get('incorrectas');

	    	return view('cuestionario.comenzar')->with('pregunta',$pregunta)->with('respuestas',$respuestas)->with('contador',$contador)->with('incorrectas',$incorrectas);
		}



    		if($i != $max)
    		{
    			while($i<=$max)
    			{
    				if(!in_array($rand,$arr))
    				{	
				    	$pregunta = Pregunta::find($rand);
				    	$respuestas = Respuesta::where('pregunta_id',$rand)->get();
			    		$incorrectas = $request->session()->get('incorrectas');
			    		$arr[]=$rand;
			    		$i++;
			    		$request->session()->put('contador',$i);
			    		break;
    				}
    				$rand = rand(1,count($rango));
    			}
    		}
    		else
    		{
    			return view('cuestionario.resultado');
    		}

	}
}
