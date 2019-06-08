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
					return "falso";
					break;
				}
			}
			return "verdadero";
		}
		
	}
	
}