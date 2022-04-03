@extends('adminlte::page')

@section('title', 'Ver Marcas')

@section('content_header')
<div>
    <h1>Palacios | <small>Marcas</small></h1>
</div>
@stop

@section('content')
@if(session()->has('msg'))
    <div class="error-notice" id="close-alert">
        <div class="oaerror {{session()->get('alert-type')}}">
        <strong>Muy Bien!</strong> - {{session()->get('msg')}}
        </div> 
    </div>
@endif
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Marcas Registradas</h2>
                        <br>
                        <div class="table-responsive-sm">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Denominación</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Titular</th>
                                        <th scope="col" style="width: 8rem;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($marcas as $marca)
                                    <tr>
                                        <th scope="row">{{$marca->id}}</th>
                                        <td style="width:.3rem;">{{$marca->denominacion_marca}}</td>
                                        <td style="text-overflow: ellipsis; overflow:hidden; max-width: 150px; font-size: .8rem;">@php $isLongText; echo substr($marca->descripcion_clase, 0, 55); strlen($marca->descripcion_clase) > 104 ? $isLongText = '...' : $isLongText = '';echo $isLongText; @endphp</td>
                                        <td>{{ $marca->titular->titular_nombre }}</td>
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
 <link rel="stylesheet" href="{{asset('assets/css/custome-alerts.css')}}">
@stop

@section('js')
<script>
    $(document).on('DOMContentLoaded', function(){
        if($('#close-alert').length){
            setTimeout(function(){
                $('#close-alert').toggle('slow');
            },3000);
        }
    });
</script>
@stop