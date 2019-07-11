@extends("cuestionario.template")



@section('body')
<div class="container contBody" id="contBody">


<div class="row">
	<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			Preguntas - Contador: {{$contador}} - Respuestas incorrectas: <span id="resp">{{$incorrectas
			}} </span>  - Respuestas correctas: <span id="correct">{{session('correctas')
			}} </span> 
		</div>
	</div>	
	</div>
</div>
	

		<div class="row">
			<div class="col-md-12">
		<div class="card" style="border: none">
			 <div class="alert alert-primary">
			 	{{$pregunta->preguntas}}
			 </div>
			<form method="post" id="form" action="{{ route('consultar') }}">
				{{ csrf_field() }}
				@foreach ($respuestas as $resp)
				<div class="form-group">
					<label for="respuesta">Respuesta</label>

					<div class="content alert alert-secondary respuesta" id="{{ $resp->id }}">
						{{ $resp->respuestas }}
					</div>

					<input type="checkbox" class="rcheck" id="respuesta[{{ $resp->id }}]" hidden="true" name="respuesta[{{ $resp->id }}]" value="{{ $resp->id }}">
				</div>
			
				@endforeach
				
			</form>
		</div>
		</div>
	</div>

					{{ session()->put('count',$contador) }}
					<div class="row">
						<div class="col">
			<a href="{{ route('cuestionario') }}"><button class="nextt btn btn-success" disabled="true">Siguiente Pregunta</button></a>
			<a href="{{ route('cuestionario','reiniciar') }}" ><span class="btn btn-warning">Reiniciar Contador</span></a>
			<button class="btn btn-primary" id="validate" onclick="gp.validar()">Validar</button>
			</div>
		</div>
	
	</div>
	


	@endsection
	
	
