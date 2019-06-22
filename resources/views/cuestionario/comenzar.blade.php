<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Cuestionario</title>
</head>
<body>
	<div class="card">
		<div class="card-header">
			Preguntas - Contador: {{$contador}} - Respuestas correctas: <span id="resp">{{$incorrectas
			}} </span>
		</div>

			
			
	</div>
		<div class="col-md-6">
		<div class="card">
			<input type="text" name="pregunta" value="{{$pregunta->preguntas}}">
			<form method="post" id="form" action="{{ route('consultar') }}">
				{{ csrf_field() }}
				@foreach ($respuestas as $resp)
				<div class="form-group" id="{{$resp->id}}">
					<label for="respuesta">Respuesta</label>
					<input type="text" class="form-control" name="" value="{{ $resp->respuestas }}">
					<input type="checkbox" class="rcheck" name="respuesta[{{ $resp->id }}]" value="{{ $resp->id }}">
				</div>
				@endforeach
				<button type="submit">enviar</button>
			</form>
		</div>
					{{ session()->put('count',$contador) }}
			<a href="{{ route('cuestionario') }}">Siguiente Pregunta</a>
			<a href="{{ route('cuestionario','reiniciar') }}" >Reiniciar Contador</a>
		<button id="validate" onclick="gp.validar()">Validar</button>
	</div>


	<script>

		var mp = 
		{
			respuestas: document.querySelectorAll('.rcheck'),
			val:"",
			clicked:""
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

			chequear: function(check){
				
			if(check.target.checked == true)
			{
				mp.val = check.target.value;
				mp.clicked = check.target;
			}
			},

			validar: function()
			{
				/*var url = '{{ url("/consultar", ":id") }}';
					url = url.replace('%3Aid', mp.val);*/
					var url = document.getElementById('form')
					var token = document.getElementsByName('_token');

					
				var xmlhttp = new XMLHttpRequest();


				xmlhttp.onreadystatechange = function()
				{
					
					if (this.readyState == 4 && this.status == 200) 
					{					

						if (xmlhttp.response == "verdadero")
						{
							mp.clicked.parentNode.style.backgroundColor = 'green';
							document.getElementById("validate").disabled = true;
						}
						else if(xmlhttp.response == 'no seleccionó pregunta')
						{
							alert("No seleccionó ninguna respuesta...!");
						}
						else
						{
							var myObj = JSON.parse(this.responseText);
							
							for(var i = 0; i<myObj.length; i++)
							{
								if(myObj[i].valor == "falso")
							{
								document.getElementById(myObj[i].id).style.backgroundColor = 'red';
							}
							else if(myObj[i].valor == "verdadero")
							{
								document.getElementById(myObj[i].id).style.backgroundColor = 'green';
							}
							else
							{
								var incorrectas = myObj[i].incorrecta;
							}
							}
							
							document.getElementById("validate").disabled = true;
							document.getElementById("resp").innerHTML = incorrectas;
						}
						
					}
					
				}

				xmlhttp.open("post",url.action);
				xmlhttp.setRequestHeader('x-csrf-token', token[0].value);
				xmlhttp.send(new FormData(url));
			}


		}
			
		gp.inicio();

		
	


		

	</script>
</body>
</html>