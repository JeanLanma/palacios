@extends('layouts.app')

@section('content')
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
@stop