@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div>
    <h1>Palacios | <small>Inicio</small></h1>
</div>
@stop

@section('content')
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Ver Marcas Registradas</h2>
                        <br>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Denominacion Marca</th>
                                    <th scope="col">Descripcio</th>
                                    <th scope="col">Titular</th>
                                    <th scope="col">Ver mas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($marcas as $marca)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$marca->denominacion_marca}}</td>
                                    <td>{{$marca->descripcion_clase}}</td>
                                    <td>{{$marca->titular_marca}}</td>
                                    <td>
                                        <a href="{{route('admin.marcas.edit', ['id'=> $marca->id])}}">
                                            <button class="btn btn-warning">Detalles</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
@stop

@section('js')

@stop