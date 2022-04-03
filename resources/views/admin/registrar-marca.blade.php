@extends('adminlte::page')

@section('title', 'Registrar Nueva Marca')

@section('content_header')
<div>
    <h1>Registrar | <small>Marca</small></h1>
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
                        <p class="h2">Agregar Nuevo Registro</p>

                        <form method="POST" action="{{ route('admin.marcas.store') }}" enctype="multipart/form-data">
                        @csrf
                            {{-- Tipo de Marcas --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="denominacion_marca">Denominación/Nombre de Marca</label> <span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="denominacion_marca" name="denominacion_marca" value="{{old('denominacion_marca')}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tipo_de_marca">Tipo de Marca: </label><span class="text-danger">*</span>
                                    <select class="custom-select mb-4" id="tipo" name="tipo_de_marca">
                                        <option disabled selected>-- Elegir un tipo --</option>
                                        <option {{old('tipo_de_marca') === 'NOMINATIVO' ? 'selected' : '' ;}}>NOMINATIVO</option>
                                        <option {{old('tipo_de_marca') === 'Mixta' ? 'selected' : '' ;}}>Mixta</option>
                                        <option {{old('tipo_de_marca') === 'Tridimensional' ? 'selected' : '' ;}}>Tridimensional </option>
                                        <option {{old('tipo_de_marca') === 'Innominada' ? 'selected' : '' ;}}>Innominada </option>
                                    </select>
                                </div>
                                <small id="tipoMarcaHelp" class="form-text text-muted">
                                    En caso de que sea tipo Mixta, Tridimensional o Innominada debe agregar una imagen. Nominativo no incluye imagen
                                </small>
                                    <!-- Imagen Logo -->
                                    <div class="custom-file mb-4">
                                            <input disabled type="file" class="custom-file-input" id="imgLogo" name="imagen_logo">
                                            <label class="custom-file-label" for="imagen_logo" data-browse="Buscar Archivo" id="logoTextContent">Cargar Logo en Imagen Gif</label>
                                    </div>
                                    {{-- Preview logo --}}
                                    <div class="d-none" id="preview_logo_container">
                                        <div>
                                            <div class="h4">Logo</div>
                                        </div>
                                        
                                        <div>
                                            <img id="preview_logo_img" data-toggle="prev" class="img-thumbnail" width="200" height="200">
                                        </div>
                                        
                                    </div>
                            </div>
                            

                            {{-- Datos Generales --}}
                            
                            <div class="form-group">
                                <label for="numero_expediente">Numero Expediente</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="numero_expediente" name="numero_expediente" value="{{old('numero_expediente')}}">
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="fecha_legal">Fecha Legal | Ingreso al IMPI:</label><span class="text-danger">*</span>
                                    <input type="date" id="fecha_legal"  name="fecha_legal" value="{{old('fecha_legal')}}">
                                </div>
                                <div class="col-6">
                                    <label for="fecha_concesion" class="mr-3">Fecha de Concesion:</label>
                                    <input name="fecha_consecion" value="{{old('fecha_consecion')}}" type="date" id="start">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="numero_marca">No. Marca o Registro</label>
                                    <input name="numero_marca" value="{{old('numero_marca')}}" type="text" class="form-control" id="numero_marca" placeholder="Numero de marca o regisro..">
                                </div>
                                <div class="form-group col-6">
                                    <label for="clase">Clase</label><span class="text-danger">*</span>
                                    <input name="clase" value="{{old('clase')}}"  type="text" class="form-control" id="clase" placeholder="Clase">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="descripcion_clase">Descripción de la Clase</label><span class="text-danger">*</span>
                                    <textarea name="descripcion_clase"  class="form-control" rows="10" id="descripcion_clase">{{old('descripcion_clase')}}</textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="fecha_primer_uso">Fecha primer uso</label>
                                        <input  name="fecha_primer_uso" value="{{old('fecha_primer_uso')}}" type="date" id="fecha_primer_uso">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="fecha_renovacion">Fecha renovación</label>
                                        <input  name="fecha_renovacion" value="{{old('fecha_renovacion')}}" type="date" id="fecha_renovacion">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-4">
                                    <label for="numero_de_oficina">Numero de Oficina</label>
                                    <input name="numero_de_oficina" value="{{old('numero_de_oficina')}}" type="number" id="numero_de_oficina" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comentarios">Comentarios</label>
                                <textarea name="comentarios" class="form-control" id="comentarios"placeholder="...comentarios">{{old('comentarios')}}</textarea>
                            </div>
                            <div class="form-group">
                                    <label for="fecha_de_comprobacion">Fecha de Comprobación </label>
                                    <input  name="fecha_de_comprobacion" value="{{old('fecha_de_comprobacion')}}" type="date" id="fecha_de_comprobacion">
                            </div>
                            {{--Datos Dueño Titular--}}
                            <div class="h3"><p> Dueño de la marca</p></div>
                            <div class="form-row">
                                
                            {{-- Titular ID --}}
                            <input name="titular_id" value="{{ $titular->id }}" type="hidden" class="form-control" id="titular_id">
                            {{-- /Titular ID --}}
                                
                                
                                <div class="form-group col-md-6">
                                    <label for="titular_nombre">Titular o Dueño de la marca</label>
                                    <input disabled name="titular_nombre" value="{{$titular->titular_nombre}}" type="text" class="form-control" id="titular_nombre">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titular_telefono">Telefono</label>
                                    <input disabled  name="titular_telefono" value="{{$titular->telefono_1}}" type="text" class="form-control" id="titular_telefono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titular_correo">Correo</label>
                                    <input disabled name="titular_correo" value="{{$titular->correo}}" type="text" class="form-control" id="titular_correo">
                                </div>
                                
                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label for="telefono_2">Telefono 2</label>
                                        <input disabled name="telefono_2" value="{{$titular->telefono_2}}" type="text" class="form-control" id="telefono_2">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="domicilio_titular">Domicilio del titular</label>
                                        <input disabled name="domicilio_titular" value="{{$titular->domicilio_titular}}" type="text" class="form-control" id="domicilio_titular">
                                    </div>

                                    <!-- Campos Fiscales -->
                                    <div class="form-group col-4">
                                        <label for="titular_facturar">Facturar</label>
                                        <input disabled name="titular_facturar" value="{{$titular->facturar}}" type="text" class="form-control" id="titular_facturar">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="titular_rfc">RFC</label>
                                        <input disabled name="titular_rfc" value="{{$titular->rfc}}" type="text" class="form-control" id="titular_rfc">
                                    </div>
                                    <div class="form-group col-5">
                                        <label for="titular_domicilio_fiscal">Domicilio Fiscal</label>
                                        <input disabled  name="titular_domicilio_fiscal" value="{{$titular->domicilio_fiscal}}" type="text" class="form-control" id="titular_domicilio_fiscal">
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                            {{--Datos De Tramite--}}
                            <div class="h3"><p> Estatus de Marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                <label for="status_de_marca">Status de Marca</label>
                                    <select class="custom-select" id="status_de_marca" name="status_de_marca">
                                        <option disabled selected>-- Elegir un tipo --</option>
                                        <option {{old('status_de_marca') === 'En trámite' ? 'selected': null}}>En trámite</option>
                                        <option {{old('status_de_marca')=== 'Registrada' ? 'selected': null}}>Registrada</option>
                                        <option {{old('status_de_marca')=== 'Abandonada' ? 'selected': null}}>Abandonada </option>
                                        <option {{old('status_de_marca')=== 'Suspenso' ? 'selected': null}}>Suspenso </option>
                                        <option {{old('status_de_marca')=== 'Demanda' ? 'selected': null}}>Demanda </option>
                                        <option {{old('status_de_marca')=== 'Caduca' ? 'selected': null}}>Caduca </option>
                                        <option {{old('status_de_marca')=== 'Oficio IMPI' ? 'selected': null}}>Oficio IMPI </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="proximo_tramite">Proximo Tramite</label>
                                    <input name="proximo_tramite" value="{{old('proximo_tramite')}}" type="text" class="form-control" id="proximo_tramite">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="fecha_proximo_tramite">Fecha Proximo Tramite</label>
                                    <input type="date" id="fecha_proximo_tramite"  name="fecha_proximo_tramite" value="{{old('fecha_proximo_tramite')}}">
                                </div>
                            </div>
                            {{--Datos responsable--}}
                            <div class="h3"><p> Responsable de la marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="responsable_marca">Responsable de la marca</label>
                                <input name="responsable_marca" value="{{old('responsable_marca')}}" type="text" class="form-control" id="responsable_marca">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="responsable_puesto">Puesto</label>
                                <input name="responsable_puesto" value="{{old('responsable_puesto')}}" type="text" class="form-control" id="responsable_puesto">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="responsable_calle">Calle</label>
                                    <input name="responsable_calle" value="{{old('responsable_calle')}}" type="text" class="form-control" id="responsable_calle">
                                </div>
                                <div class="form-group col-3">
                                    <label for="responsable_telefono">Telefono</label>
                                    <input name="responsable_telefono" value="{{old('responsable_telefono')}}" type="text" class="form-control" id="responsable_telefono">
                                </div>
                                <div class="form-group col-5">
                                    <label for="responsable_correo">Correo</label>
                                    <input  name="responsable_correo" value="{{old('responsable_correo')}}" type="email" class="form-control" id="responsable_correo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="responsable_colonia">Colonia</label>
                                    <input name="responsable_colonia" value="{{old('responsable_colonia')}}" type="text" class="form-control" id="colonia">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="responsable_cp">Codigo Postal</label>
                                    <input name="responsable_cp" value="{{old('responsable_cp')}}" type="text" class="form-control" id="responsable_cp">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="responsable_municipio">Municipio | Alcaldia</label>
                                    <input name="responsable_municipio" value="{{old('responsable_municipio')}}" type="text" class="form-control" id="responsable_municipio">
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

    $('#imgLogo').on('change', function(){
        const file = $('#imgLogo')[0].files[0];
        const imgSrc = URL.createObjectURL(file);
        $('#preview_logo_img').attr('src', imgSrc);
        $('#logoTextContent').addClass('bg-primary text-white');
        $('#logoTextContent').text(file.name);
    });
    

        $("#tipo").on('change',function(event){
            event.preventDefault();
            const logoPreviewContainer = $('#preview_logo_container');
            if(this.value != 'NOMINATIVO'){
                logoPreviewContainer.removeClass('d-none');
                $('#imgLogo').prop("disabled", false);
            } else{
                if(!logoPreviewContainer.hasClass('d-none')){
                    logoPreviewContainer.addClass('d-none');
                }
                $('#imgLogo').prop("disabled", true);
            }
        });
    </script>
@stop