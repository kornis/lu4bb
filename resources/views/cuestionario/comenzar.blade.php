<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Cuestionario</title>
</head>
<body>
	<div class="card">
		<div class="card-header">
			Preguntas - Contador: {{$contador}} - Respuestas correctas: <span id="resp"> </span>
		</div>

			
			
	</div>
		<div class="col-md-6">
		<div class="card">
			<input type="text" name="pregunta" value="{{$pregunta->preguntas}}">
			<form method="post" action="">
				{{ csrf_field() }}
				@foreach ($respuestas as $resp)
				<div class="form-group">
					<label for="respuesta">Respuesta</label>
					<input type="text" class="form-control" name="respuesta" value="{{ $resp->respuestas }}">
					<input type="checkbox" class="rcheck" name="{{ $resp->id }}">
				</div>
				@endforeach
				
			</form>
		</div>
					{{ session()->put('count',$contador) }}
			<a href="{{ route('cuestionario') }}">Siguiente Pregunta</a>
			<a href="{{ route('cuestionario','reiniciar') }}" >Reiniciar Contador</a>
		<button onclick="gp.validar()">Validar</button>
	</div>


	<script>

		var mp = 
		{
			respuestas: document.querySelectorAll('.rcheck'),
			val:""
		}
		

		var gp =
		{
			inicio: function()
			{
				for(var i = 0;i< mp.respuestas.length;i++)
				{
		 			mp.respuestas[i].addEventListener("click", gp.chequear);
		 			
				}
			},

			chequear: function(radio){
				
			if(radio.target.checked == true)
			{
				mp.val = radio.target.name;
				
			}
			},

			validar: function()
			{
				var url = '{{ url("/consultar", ":id") }}';
					url = url.replace('%3Aid', mp.val);
					console.log(url);
				var xmlhttp = new XMLHttpRequest();


				xmlhttp.onreadystatechange = function()
				{
					console.log(xmlhttp.status);
					if (this.readyState == 4 && this.status == 200) 
					{

												
						if (xmlhttp.response == "falso")
						{
							document.getElementById("resp").innerHTML = "1";
						}
						
					}
				}
				xmlhttp.open("get",url);
				xmlhttp.send();
			}


		}
			
		gp.inicio();

		
	


		

	</script>
</body>
</html>