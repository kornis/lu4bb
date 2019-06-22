<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;

class chequearController extends Controller
{

	public function consulta(Request $request)
	{
		if($request->respuesta == null)
		{
			return "no seleccionó pregunta";
		}
		else
		{
			foreach($request->respuesta as $id_respuesta)
			{
				$respuesta = Respuesta::find($id_respuesta);
				
				if($respuesta->valor == "falso")
				{
					$valores = Respuesta::where('pregunta_id',$respuesta->pregunta_id)->get();
					
					session(['incorrectas' => session('incorrectas')+1]);
					$valor = session('incorrectas');
					$valores[] = array('incorrecta'=>$valor);
					$json_respuestas = json_encode($valores);
					return $json_respuestas;
					break;
				}
			}
			return "verdadero";
		}
		
	}
	
}


				/*$consulta = Respuesta::find($id_respuesta);
				$respuestas = Respuesta::where('pregunta_id',$consulta->pregunta_id);
				dd($respuestas);
				$valores = array(
					array($respuesta->id => $respuesta->valor),
					array()*/

