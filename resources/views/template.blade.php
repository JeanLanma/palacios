@extends('layouts.app')

@section('content')
<!-- Header -->
			<header id="header">
				<h1>De palacio y cia.s.c.</h1>
				<p>Un proyecto sencillo pero potente.<br />
			</header>

			<a href="{{ route('admin')}}">
				<button type="button" class="btn btn-info">Inresar al sistema</button>
			</a>
@stop