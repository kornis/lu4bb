<!DOCTYPE html>
<html>
<head>
	<title>Admin preguntas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="card">
	<div class="card-body">
	<form method="post" action="{{ route('crear_pregunta.store') }}">
			{{ csrf_field() }}
			
		<div class="form-group">
			<label for="pregunta">Ingrese nueva Pregunta</label>
			<input class="form-control" type="text" name="pregunta">
			<select name="type_option">
			<option value="Tecnica">Tecnica</option>
			<option value="Teorico">Teorico</option>
		</select>
		</div>

		<div class="form-group">
			<label for="respuesta1">Ingrese Respuesta 1</label>
			<input class="form-control" type="text" name="respuesta1">
			<select name="type1">
				<option value="falso">Falso</option>
				<option value="verdadero">Verdadero</option>
			</select>
		</div>
		<div class="form-group">
			<label for="respuesta2">Ingrese Respuesta 2</label>
			<input class="form-control" type="text" name="respuesta2">
			<select name="type2">
				<option value="falso">Falso</option>
				<option value="verdadero">Verdadero</option>
			</select>
		</div>
		<div class="form-group">
			<label for="respuesta3">Ingrese Respuesta 3</label>
			<input class="form-control" type="text" name="respuesta3">
			<select name="type3">
				<option value="falso">Falso</option>
				<option value="verdadero">Verdadero</option>
			</select>
		</div>
		<div class="form-group">
			<label for="respuesta4">Ingrese Respuesta 4</label>
			<input class="form-control" type="text" name="respuesta4">
			<select name="type4">
				<option value="falso">Falso</option>
				<option value="verdadero">Verdadero</option>
			</select>
		</div>
		<button class="btn btn-success" type="submit">Subir</button>
	</form>
</div>
</div>
</body>
</html>