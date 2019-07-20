<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>@yield('title','default ')| Panel de Administración</title>

</head>
<body>
	
	<div class="alto">

<div class="container-fluid" style="margin-top: 15px; margin-bottom: 40px;">
	<div class="row info">
		<div class="col-md-2 col-xs-12 div_logo">
			<img class="logo" src="{{asset('/images/logo.jpg')}}" style="height: 150px">
			</div>
			<div class="col-md-4 col-xs-12 title_top"><p><strong>BUENOS AIRES RADIO CLUB</strong></p>
			<span><small>LU4BB, 146.805 Mhz. -600, CABA, AR</small></span></div>

			<div class="col-md-6 col-xs-6" style="margin: auto">
			<div class="menu">
			<div class="menu-nav">
				<a href="">INICIO</a>
				<a href="">BLOG</a>
				<a href="">EL CLUB</a>
				<div class="dropdown">
					<button class="dropdownbutton">HERRAMIENTAS</button>
					<div class="dropdw1">
					<a href="">ADMINISTRAR PREGUNTAS</a>
					<a href="">menu2</a>
					<a href="">menu3</a>
				</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		<div class="row">
		
	</div>
</div>



@include('cuestionario.partials.menu_small')
@yield('body')
</div>
@include('cuestionario.partials.footer')

<script type="text/javascript" src="{{ asset('js/validar.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/small_menu.js') }}"></script>

</body>
</html>