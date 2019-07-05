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
			$valores['datos'] = array('respuesta'=>'No seleccionó pregunta...');
			$json_respuestas = json_encode($valores);
			return $json_respuestas;
		}
		else
		{
			foreach($request->respuesta as $id_respuesta)
			{
				$respuesta = Respuesta::find($id_respuesta);
				
				if($respuesta->valor == "falso")
				{
					session(['incorrectas' => session('incorrectas')+1]);

					$valores = Respuesta::where('pregunta_id',$respuesta->pregunta_id)->get();
					$valor = session('incorrectas');
					$valores["datos"] = array('respuesta' => 'falso','incorrectas' => $valor);
					$json_respuestas = json_encode($valores);
					return $json_respuestas;
					break;
				}
			}
			session(['correctas' => session('correctas')+1]);
			$cantCorrectas = session('correctas');
			$valores['datos'] = array('respuesta'=>"verdadero",'correctas'=>$cantCorrectas);
			$json_respuestas = json_encode($valores);
			return $json_respuestas;
		}
		
	}
	
}



