<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;

class chequearController extends Controller
{

	public function consulta($id = null)
	{

		//$pregunta_id = $_REQUEST['pid'];
		//$respuesta_id = $_REQUEST['rid'];
		//$pregunta = Pregunta::find($pregunta_id);
		if($id == null)
		{
			return "falso";
		}
		$respuesta = Respuesta::where('id',$id)->get();

		if($respuesta == "verdadero")
		{
			return "verdadero";
		}
		else
		{
			return "falso";
		}
	}
	
}