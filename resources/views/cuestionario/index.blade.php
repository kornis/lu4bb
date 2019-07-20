@extends('cuestionario.template')

@section('title')
Cuestionario de Examen
@endsection


@section('body')
	<div class="container">
	<h1>SIMULACRO DE EXAMEN PARA CURSO DE RADIOAFICIONADOS</h1>
	<h5>Preguntas multiple choice segun cuestionario ENACOM 2019</h5>
	<a href="{{ route('crear_pregunta.index') }}"><button class="btn btn-primary">Ingresar al panel de Administración</button></a>

	
	<a href="{{ route('cuestionario') }}"><button class="btn btn-primary">Ingresar a las preguntas</button></a>
</div>
@endsection