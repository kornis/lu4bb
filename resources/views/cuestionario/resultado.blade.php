@extends('cuestionario.template')



@section('body')

<p>{{ session('correctas') }}</p>
<br>
<br>
<a href="{{ route('cuestionario','reiniciar') }}"><button class="btn btn-warning">Reiniciar Cuestionario</button></a>

<br>
<p>{{session('contador')}}</p>
<br>
<button class="btn btn-success">Enviar Resultados</button>

@endsection