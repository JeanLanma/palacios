@extends('adminlte::page')

@section('title', 'Clientes/Titulares')

@section('content_header')
<div>
    <h1> Registrar Nuevo | <small>Cliente</small></h1>
</div>
@stop
@section('content')
    @if(session()->has('success'))
        <div class="error-notice" id="close-alert">
            <div class="oaerror success">
                <strong>Bien!</strong> - {{session()->get('success')}}
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
                        <form method="POST" action="{{ route('admin.titular.store') }}" enctype="multipart/form-data">
                        @csrf
                        {{--Datos Dueño--}}
                            <div class="h3"><p> Titular de la marca</p></div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="titulo_marca">Titular o Dueño de la marca</label>
                                        <input name="titular_marca" value="{{old('titular_marca')}}" type="text" class="form-control" id="titulo_marca">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="titular_telefono">Telefono</label>
                                        <input  name="titular_telefono" value="{{old('titular_telefono')}}" type="text" class="form-control" id="titular_telefono">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="titular_correo">Correo</label>
                                        <input name="titular_correo" value="{{old('titular_correo')}}" type="text" class="form-control" id="titular_correo">
                                    </div>
                                    
                                    <div class="form-row">
                                        <!-- campos para telefono extra -->
                                        <div class="form-group col-md-6">
                                            <label for="responsable_marca">Responsable de la marca</label>
                                            <input name="responsable_marca" value="{{old('responsable_marca')}}" type="text" class="form-control" id="responsable_marca">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="responsable_puesto">Puesto</label>
                                            <input name="responsable_puesto" value="{{old('responsable_puesto')}}" type="text" class="form-control" id="responsable_puesto">
                                        </div>
                                        <!--  -->

                                        <!-- Campos Fiscales -->
                                        <div class="form-group col-4">
                                            <label for="titular_facturar">Facturar</label>
                                            <input name="titular_facturar" value="{{old('titular_facturar')}}" type="text" class="form-control" id="titular_facturar">
                                        </div>
                                        <div class="form-group col-3">
                                            <label for="titular_rfc">RFC</label>
                                            <input name="titular_rfc" value="{{old('titular_facturar')}}" type="text" class="form-control" id="titular_rfc">
                                        </div>
                                        <div class="form-group col-5">
                                            <label for="titular_domicilio_fiscal">Domicilio Fiscal</label>
                                            <input  name="titular_domicilio_fiscal" value="{{old('titular_domicilio_fiscal')}}" type="email" class="form-control" id="titular_domicilio_fiscal">
                                        </div>
                                        <!--  -->
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection