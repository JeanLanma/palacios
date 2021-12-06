@extends('adminlte::page')

@section('title', 'Clientes/Titulares')

@section('content_header')
<div>
    <h1> Registrar Nuevo | <small>Cliente</small></h1>
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
                    <strong>Error </strong>- {{ $error }} <br>
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
                        <form method="POST" action="{{ route('admin.titular.update', ['id' => $titular->id]) }}" enctype="multipart/form-data">
                        @csrf
                        {{--Datos Dueño--}}
                            <div class="h3"><p> Titular de la marca</p></div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="titulo_marca">Titular o Dueño de la marca</label>
                                        <input name="nombre" value="{{old('nombre') ?? $titular->nombre}}" type="text" class="form-control" id="titulo_marca">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="titular_telefono">Telefono</label>
                                        <input  name="telefono_1" value="{{old('telefono_1') ?? $titular->telefono_1}}" type="text" class="form-control" id="titular_telefono">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="titular_correo">Correo</label>
                                        <input name="correo" value="{{old('correo') ?? $titular->correo}}" type="text" class="form-control" id="titular_correo">
                                    </div>
                                    
                                    <div class="form-row">
                                        <!-- campos para telefono extra -->
                                        <div class="form-group col-md-6">
                                            <label for="telefono_2">Telefono 2</label>
                                            <input name="telefono_2" value="{{old('telefono_2') ?? $titular->telefono_2}}" type="text" class="form-control" id="responsable_marca">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telefono_3">Telefono 3</label>
                                            <input name="telefono_3" value="{{old('telefono_3') ?? $titular->telefono_3}}" type="text" class="form-control" id="responsable_puesto">
                                        </div>
                                        <!--  -->

                                        <!-- Campos Fiscales -->
                                        <div class="form-group col-4">
                                            <label for="titular_facturar">Facturar</label>
                                            <input name="facturar" value="{{old('facturar') ?? $titular->facturar}}" type="text" class="form-control" id="titular_facturar">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="titular_rfc">RFC</label>
                                            <input name="rfc" value="{{old('facturar') ?? $titular->rfc}}" type="text" class="form-control" id="titular_rfc">
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="domicilio_fiscal">Domicilio Fiscal</label>
                                            <input  name="domicilio_fiscal" value="{{old('domicilio_fiscal') ?? $titular->domicilio_fiscal}}" type="text" class="form-control" id="titular_domicilio_fiscal">
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                                <div><button class="btn btn-primary" type="submit">Actualizar</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

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