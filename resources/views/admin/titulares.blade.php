@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div>
    <h1>Palacios | <small>Inicio</small></h1>
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
@if ($errors->any())
    <div class="error-notice">
        <ul class="oaerror danger">
            @foreach ($errors->all() as $error)
                <strong>Error </strong>- {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Titulares</h2>
                        <br>
                        <div class="table-responsive-sm">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">RFC</th>
                                        <th scope="col">Domicilio Fiscal</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($titulares as $titular)
                                    <tr>
                                        <th scope="row">{{$titular->id}}</th>
                                        <td>{{$titular->titular_nombre}}</td>
                                        <td>{{ $titular->rfc ?? '---' }}</td>
                                        <td>{{$titular->domicilio_fiscal}}</td>
                                        <td class="row">
                                            <a class="col-md-6" href="{{route('admin.titular.edit', ['titular'=> $titular->id])}}">
                                                <button class="btn btn-warning" title="Ver mas..."><i class="fas fa-user-edit"></i></button>
                                            </a>
                                            
                                            <form method="POST" class="col-md-6" action="{{route('admin.titular.destroy', ['id'=> $titular->id])}}">
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
                            {!! $titulares->links() !!}
                        </div>
                        <div class="d-flex justify-content-center">
                            <small class="form-text text-muted">Mostrando {{$titulares->count()}} resulados por pagina de {{$titulares->total()}} resultados en total</small>
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