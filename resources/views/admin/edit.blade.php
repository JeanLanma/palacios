@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
<div>
    <h1>Palacios | <small>Ver</small></h1>
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
                        <p class="h2">Ver Detalle | Editar</p>

                        <form method="POST" action="{{ route('admin.marcas.update', $marca->id) }}" enctype="multipart/form-data">
                        @csrf
                            {{-- Tipo de Marcas --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="denominacion_marca">Denominación Nombre de Marca</label>
                                    <input type="text" class="form-control" id="denominacion_marca" name="denominacion_marca" value="{{ $marca->denominacion_marca }}">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="tipo_de_marca">Tipo de Marcas: </label>
                                <select class="custom-select mb-4" id="tipo_de_marca" name="tipo_de_marca">
                                    <option disabled>-- Elegir un tipo --</option>
                                    <option @if($marca->tipo_de_marca == 'NOMINATIVO') selected @endif>NOMINATIVO</option>
                                    <option @if($marca->tipo_de_marca == 'Mixta') selected @endif>Mixta</option>
                                    <option @if($marca->tipo_de_marca == 'Tridimensional') selected @endif>Tridimensional </option>
                                    <option @if($marca->tipo_de_marca == 'Innominada') selected @endif>Innominada </option>
                                </select>
                                </div>  
                            </div>
                            
                            <!-- Logo input -->
                            <div class="form-group">
                                <small id="tipoMarcaHelp" class="form-text text-muted">
                                 En caso de que sea tipo Mixta, Tridimensional o Innominada debe agregar una imagen. Nominativo no oncluye imagen
                                </small>
                                <div class="custom-file mb-4">
                                    <input type="file" class="custom-file-input" id="imgLogo" name="imagen_logo">
                                    <label class="custom-file-label" for="imagen_logo" data-browse="Buscar Archivo" id="imgLogoLabel">Cargar imagen gif</label>
                                </div>
                            <div>
                                <div>
                                    <div class="h4">Logo</div>
                                </div>
                                @if($marca->imagen_logo  != 'no image')
                                <div>
                                    <img id="preview_logo" data-toggle="prev" class="img-thumbnail" width="200" height="200" src="/storage/{{$marca->imagen_logo}}">
                                </div>
                                @else
                                <div class="alert alert-light text-center" role="alert">
                                    <h2>Sin Imagen</h2>
                                </div>
                                @endif
                            </div>
                            </div>

                            {{-- Datos Generales --}}
                            
                            <div class="form-group">
                                <label for="numero_expediente">Expediente</label>
                                <input type="text" class="form-control" id="numero_expediente" name="numero_expediente" value="{{ $marca->numero_expediente }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="fecha_legal">Fecha Legal | Ingreso al IMPI:</label>
                                    <input type="date" id="fecha_legal"  name="fecha_legal" value="{{ $marca->fecha_legal }}">
                                </div>
                                <div class="col-6">
                                    <label for="fecha_concesion" class="mr-3">Fecha de Concesion:</label>
                                    <input name="fecha_consecion" type="date" id="start" value="{{ $marca->fecha_consecion }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="numero_marca">No. Marca o Registro</label>
                                    <input name="numero_marca" value="{{ $marca->numero_marca }}" type="text" class="form-control" id="numero_marca" placeholder="Numero de marca o regisro..">
                                </div>
                                <div class="form-group col-4">
                                    <label for="clase">Clase</label>
                                    <input name="clase" value="{{ $marca->clase }}" type="text" class="form-control" id="clase" placeholder="Clase">
                                </div>
                                <div class="form-group col-4">

                                    <label for="tipo_clase">Tipo de Clase: </label>
                                    <select class="custom-select mb-4" id="tipo_clase" name="tipo_clase" value="{{old('tipo_clase')}}">
                                        <option disabled selected>-- Elegir Tipo de Clase --</option>
                                        @for($i = 1; $i <= 45; $i++)
                                            <option @if($i == $marca->tipo_clase) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="descripcion_clase">Descripción de la Clase</label>
                                    <textarea name="descripcion_clase"  class="form-control" rows="10" id="descripcion_clase">{{$marca->descripcion_clase}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="fecha_primer_uso">Fecha primer uso</label>
                                        <input  name="fecha_primer_uso" value="{{ $marca->fecha_primer_uso }}" type="date" id="fecha_primer_uso">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="fecha_renovacion">Fecha renovación</label>
                                        <input  name="fecha_renovacion" value="{{ $marca->fecha_renovacion }}" type="date" id="fecha_renovacion">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-4">
                                    <label for="numero_oficina">Numero de Oficina</label>
                                    <input name="numero_oficina" value="{{ $marca->numero_oficina }}" type="number" id="n_oficna" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comentarios">comentarios</label>
                                <textarea name="comentarios" class="form-control" id="comentarios"placeholder="...comentarios"> {{ $marca->comentarios }}</textarea>
                            </div>
                            <div class="form-group">
                                    <label for="fecha_comprobacion">Fecha de Comprobación </label>
                                    <input  name="fecha_comprobacion" value="{{ $marca->fecha_comprobacion }}" type="date" id="fecha_comprobacion">
                            </div>
                            {{--Datos Dueño--}}
                            <div class="h3"><p> Dueño de la marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="titulo_marca">Titular o Dueño de la marca</label>
                                    <input disabled name="titular_marca" value="{{ $titular->nombre }}" type="text" class="form-control" id="titulo_marca">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titular_telefono">Telefono</label>
                                    <input disabled  name="titular_telefono" value="{{ $titular->telefono_1 }}" type="text" class="form-control" id="titular_telefono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titular_correo">Correo</label>
                                    <input disabled name="titular_correo" value="{{ $titular->correo }}" type="text" class="form-control" id="titular_correo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titular_rfc">RFC</label>
                                    <input disabled name="titular_rfc" value="{{ $titular->rfc }}" type="text" class="form-control" id="titular_rfc">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo_facturar">Facturar</label>
                                    <input disabled name="titular_facturar" value="{{ $titular->facturar }}" type="text" class="form-control" id="titulo_facturar">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo_domicilio_fiscal">Domicilio Fiscal</label>
                                    <input disabled name="titular_domicilio_fiscal" value="{{ $titular->domicilio_fiscal }}" type="text" class="form-control" id="titulo_domicilio_fiscal">
                                </div>
                                <div class="form-group col-md-4">
                                    <!-- <label for="titular_id">Titular_id {{ $titular->id }}</label> -->
                                    <input disabled name="titular_id" value="{{ $titular->id}}" type="hidden" class="form-control" id="titular_id">
                                </div>
                            </div>
                            {{--Datos De Tramite--}}
                            <div class="h3"><p> Status de Marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="status_de_marca">Status de Marca</label>
                                    <select class="custom-select" id="status_de_marca" name="status_de_marca">
                                        <option disabled>-- Elegir un tipo --</option>
                                        <option @if($marca->tipo_clase =="En tramite") selected @endif>En tramite</option>
                                        <option @if('Registrada' == $marca->status_de_marca) selected @endif>Registrada</option>
                                        <option @if('Abandonada' == $marca->tipo_clase) selected @endif>Abandonada </option>
                                        <option @if('Suspenso' == $marca->tipo_clase) selected @endif>Suspenso </option>
                                        <option @if('Demanda' == $marca->tipo_clase) selected @endif>Demanda </option>
                                        <option @if('Caduca' == $marca->tipo_clase) selected @endif>Caduca </option>
                                        <option @if("Oficio IMPI" == $marca->tipo_clase) selected @endif>Oficio IMPI </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="proximo_tramite">Proximo Tramite</label>
                                    <input name="proximo_tramite" value="{{$marca->proximo_tramite}}" type="text" class="form-control" id="proximo_tramite">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fecha_proximo_tramite">Fecha Proximo Tramite</label>
                                    <input type="date" id="fecha_proximo_tramite"  name="fecha_proximo_tramite" value="{{$marca->fecha_proximo_tramite}}">
                                </div>
                            </div>
                            {{--Datos responsable--}}
                            <div class="h3"><p> Responsable de la marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="responsable_marca">Responsable de la marca</label>
                                <input name="responsable_marca" value="{{ $marca->responsable_marca }}" type="text" class="form-control" id="responsable_marca">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="responsable_puesto">Puesto</label>
                                <input name="responsable_puesto" value="{{ $marca->responsable_puesto }}" type="text" class="form-control" id="responsable_puesto">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="responsable_calle">Calle</label>
                                    <input name="responsable_calle" value="{{ $marca->responsable_calle }}" type="text" class="form-control" id="responsable_calle">
                                </div>
                                <div class="form-group col-3">
                                    <label for="responsable_telefono">Telefono</label>
                                    <input name="responsable_telefono" value="{{ $marca->responsable_telefono }}" type="text" class="form-control" id="responsable_telefono">
                                </div>
                                <div class="form-group col-5">
                                    <label for="responsable_correo">Correo</label>
                                    <input  name="responsable_correo" value="{{ $marca->responsable_correo }}" type="email" class="form-control" id="responsable_correo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="responsable_colonia">Colonia</label>
                                    <input name="responsable_colonia" value="{{ $marca->responsable_colonia }}" type="text" class="form-control" id="colonia">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="responsable_cp">Codigo Postal</label>
                                    <input name="responsable_cp" value="{{ $marca->responsable_cp }}" type="text" class="form-control" id="responsable_cp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="responsable_municipio">Municipio | Alcaldia</label>
                                    <input name="responsable_municipio" value="{{ $marca->responsable_municipio }}" type="text" class="form-control" id="responsable_municipio">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Agregar Registro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('js')
    <script>
        let preview = $('#preview_imgTipoMarca');
        $('#imgTipoMarca').on('change',function(){
            let file = $('#imgTipoMarca')[0].files[0];
            let url = URL.createObjectURL(file);
            preview.attr('src', url);
            $('#imgTypeLabel').text(file.name);
        })
        let preview_logo = $('#preview_logo');
        $('#imgLogo').on('change', function(){
            let file = $('#imgLogo')[0].files[0];
            let url = URL.createObjectURL(file);
            preview_logo.attr('src', url);
            $('#imgLogoLabel').text(file.name);
        });

        $(document).on('DOMContentLoaded', function(){
            if($('#close-alert').length){
                setTimeout(function(){
                    $('#close-alert').toggle('slow');
                },3000);
            }
        });
    </script>
@stop

@section('css')
 <link rel="stylesheet" href="{{asset('assets/css/custome-alerts.css')}}">
@stop