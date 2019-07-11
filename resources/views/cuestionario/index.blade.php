@extends('cuestionario.template')

@section('title')
Cuestionario de Examen
@endsection


@section('body')
	<a href="{{ route('crear_pregunta.index') }}"><span class="badge badge-primary">Ingresar al panel de Administración</span></a>


	<a href="{{ route('cuestionario') }}"><span class="badge badge-primary">Ingresar a las preguntas</span></a>
@endsection