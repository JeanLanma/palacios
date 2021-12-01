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
                        <div class="table-responsive-sm">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Denominación Marca</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Titular</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($marcas as $marca)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$marca->denominacion_marca}}</td>
                                        <td style="white-space: nowrap;text-overflow: ellipsis; overflow:hidden; max-width: 250px">@php $isLongText; echo substr($marca->descripcion_clase, 0, 105); strlen($marca->descripcion_clase) > 104 ? $isLongText = '...' : $isLongText = '';echo $isLongText; @endphp</td>
                                        <td>{{$marca->titular_marca}}</td>
                                        <td class="row">
                                            <a class="col-md-6" href="{{route('admin.marcas.edit', ['id'=> $marca->id])}}">
                                                <button class="btn btn-warning" title="Ver mas..."><i class="fas fa-user-edit"></i></button>
                                            </a>
                                            <form method="POST" class="col-md-6" action="{{route('admin.marcas.destroy', ['id'=> $marca->id])}}">
                                                @method('delete') 
                                                @csrf
                                                <button class="btn btn-danger" title="Eliminar!"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {!! $marcas->links() !!}
                        </div>
                        <div class="d-flex justify-content-center">
                            <small class="form-text text-muted">Mostrando {{$marcas->count()}} resulados por pagina de {{$marcas->total()}} resultados en total</small>
                        </div>
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