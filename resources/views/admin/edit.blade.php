@extends('adminlte::page')

@section('title', 'Ver')

@section('content_header')
<div>
    <h1>Palacios | <small>Ver</small></h1>
</div>
@stop

@section('content')

@if(session()->has('success'))
    <div class="error-notice" id="close-alert">
        <div class="oaerror success">
        <strong>Muy Bien!</strong> - {{session()->get('success')}}
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
                                    <label for="descripcion_clase">Descripción de la Clase</label>
                                    <input type="text" class="form-control" id="descripcion_clase" name="descripcion_clase" value="{{ $marca->descripcion_clase }}">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipo">Tipo de Marcas: </label>
                                <select class="custom-select mb-4" id="tipo" name="tipo">
                                    <option disabled>-- Elegir un tipo --</option>
                                    <option @if($marca->tipo == 'NOMINATIVO') selected @endif>NOMINATIVO</option>
                                    <option @if($marca->tipo == 'Mixta') selected @endif>Mixta</option>
                                    <option @if($marca->tipo == 'Tridimensional') selected @endif>Tridimensional </option>
                                    <option @if($marca->tipo == 'Innominada') selected @endif>Innominada </option>
                                </select>
                                <small id="tipoMarcaHelp" class="form-text text-muted">
                                 En caso de que sea tipo Mixta, Tridimensional o Innominada debe agregar una imagen. Nominativo no oncluye imagen
                                </small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imgTipoMarca" name="img_tipo_marca">
                                    <label class="custom-file-label" for="imgTipoMarca" data-browse="Buscar Archivo">Cargar imagen gif</label>
                                </div>
                                <div>
                                    <div>
                                        <div class="h4">Imagen de Marca</div>
                                    </div>
                                    @if($marca->img_tipo_marca  != 'Nominativo')
                                    <div>
                                        <img id="preview_imgTipoMarca" data-toggle="prev" class="img-thumbnail" width="200" height="200" src="/storage/{{$marca->img_tipo_marca}}">
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
                            <label for="img_logo">Logo</label>
                            <div class="custom-file mb-4">
                                    <input type="file" class="custom-file-input" id="imgLogo" name="logo">
                                    <label class="custom-file-label" for="logo" data-browse="Buscar Archivo">Cargar imagen gif</label>
                            </div>
                            <div>
                                <div>
                                    <div class="h4">Imagen Logo</div>
                                </div>
                                @if($marca->logo  != 'no image')
                                <div>
                                    <img id="preview_logo" data-toggle="prev" class="img-thumbnail" width="200" height="200" src="/storage/{{$marca->logo}}">
                                </div>
                                @else
                                <div class="alert alert-light text-center" role="alert">
                                    <h2>Sin Imagen</h2>
                                </div>
                                @endif
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
                                    <label for="tipo_marca">Tipo de Marca</label>
                                    <input name="tipo_marca" value="{{ $marca->tipo_marca }}" type="text" class="form-control" id="tipo_marca" placeholder="...tipo_marca">
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
                                    <input name="titular_marca" value="{{ $marca->titular_marca }}" type="text" class="form-control" id="titulo_marca">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="titular_telefono">Telefono</label>
                                    <input  name="titular_telefono" value="{{ $marca->titular_telefono }}" type="text" class="form-control" id="titular_telefono">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titular_correo">Correo</label>
                                    <input name="titular_correo" value="{{ $marca->titular_correo }}" type="text" class="form-control" id="titular_correo">
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
            console.log(file);
            alert(file.name);
        })
        let preview_logo = $('#preview_logo');
        $('#imgLogo').on('change', function(){
            let file = $('#imgLogo')[0].files[0];
            let url = URL.createObjectURL(file);
            preview_logo.attr('src', url);
            console.log(file);
            alert(file.name);
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