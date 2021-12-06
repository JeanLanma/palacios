@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div>
        <h1> <span>Bienvenido: </span>{{  Auth::user()->name }}</h1>
    </div>
@stop

@section('content')
    
@stop