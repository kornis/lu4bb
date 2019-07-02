<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
	<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">  
	<title>@yield('title','default ')| Panel de Administración</title>

</head>
<body>
<div class="container-fluid" style="margin-top: 15px; margin-bottom: 40px;">
	<div class="row">
		<div class="col">
			<img src="{{asset('/images/logo.jpg')}}" style="height: 150px">
			<div style="display: inline-block;margin-left: 25px"><span><strong>BUENOS AIRES RADIO CLUB</strong></span><div><span><small>LU4BB, 146.805 Mhz. -600, CABA, AR</small></span></div></div>
		</div>
		<div class="col" style="margin: auto">
			<div class="menu">
			<div class="menu-nav">
				<a href="">INICIO</a>
				<a href="">BLOG</a>
				<div class="dropdown">
					<button class="dropdownbutton">EL CLUB</button>
					<div class="dropdw1">
					<a href="">menu1</a>
					<a href="">menu2</a>
					<a href="">menu3</a>
				</div>
				</div>
				<a href="">HERRAMIENTAS</a>
			</div>
		</div>
		</div>
	</div>
</div>

<!-- @include("cuestionario.partials.nav") -->


@yield('body')

@include('cuestionario.partials.footer')
</body>
</html>