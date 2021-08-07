<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>Eventually by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<h1>Palacios</h1>
				<p>Un proyecto sencillo pero potente<br />
			</header>

		<!-- Signup Form -->
<!-- 			<form id="signup-form" method="post" action="#">
				<input type="email" name="email" id="email" placeholder="Email Address" />
				<input type="submit" value="Sign Up" />
				<button type="button" class="btn btn-info btn-lg">Info</button>
			</form> -->
			<a href="{{ route('admin')}}">
				<button type="button" class="btn btn-info">Inresar al sistema</button>
			</a>

		<!-- Footer -->
			<footer id="footer">
			</footer>

		<!-- Scripts -->
		<script src="assets/js/main.js"></script>
	</body>
</html>