<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;

class preguntaController extends Controller
{
    public function index()
    {
    	return view('admin.index');
    }

    public function create()
    {
    	return view('admin.addPreguntas');
    }

    public function store(Request $request)
    {
    	$pregunta = new Pregunta();
    	$pregunta->preguntas= $request->pregunta;
    	$pregunta->save();
    	
    	if($request->respuesta1)
    	{
    		$respuesta1 = new Respuesta();
    		$respuesta1->respuestas = $request->respuesta1;
    		$respuesta1->pregunta_id = $pregunta->id; 
    		$respuesta1->valor = $request->type1; 
    		$respuesta1->save();   		
    	}
    	
    	if($request->respuesta2)
    	{
    		$respuesta2 = new Respuesta();
    		$respuesta2->respuestas = $request->respuesta2;
    		$respuesta2->pregunta_id = $pregunta->id;
    		$respuesta2->valor = $request->type2;
    		$respuesta2->save();	
    	}

    	if($request->respuesta3)
    	{
    		$respuesta3 = new Respuesta();
    		$respuesta3->respuestas = $request->respuesta3;
    		$respuesta3->pregunta_id = $pregunta->id;
    		$respuesta3->valor = $request->type3;
    		$respuesta3->save();
    	}
    	
    	if($request->respuesta4)
    	{
    		$respuesta4 = new Respuesta();
    		$respuesta4->respuestas = $request->respuesta4;
    		$respuesta4->pregunta_id = $pregunta->id;
    		$respuesta4->valor = $request->type4;
    		$respuesta4->save();
    	}
    	
    }
}
