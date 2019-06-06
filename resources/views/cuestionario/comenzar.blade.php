<!DOCTYPE html>
<html>
<head>
	<title>Cuestionario</title>
</head>
<body>
	<div class="card">
		<div class="card-header">
			Preguntas - Contador: {{$contador}} - Respuestas correctas: <span id="resp"> </span>
		</div>
		<div class="card-body">
			{{ csrf_field() }}
			<div>
				{{ $pregunta->preguntas }}
			</div>
			<table>
				<tr>
					<th>Respuesta</th>
					<th>Opcion Correcta</th>
				</tr>
			@foreach ($respuestas as $resp)
				<tr>
					<td>{{ $resp->respuestas }}</td>
					<td><input type="radio" name='{{$resp->id}}' class="rcheck"></td>
				</tr>
			@endforeach
		</table>
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