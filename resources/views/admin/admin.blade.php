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
                        <p class="h2">Agregar Nuevo Registro</p>

                        <form method="POST">
                        @csrf
                            {{-- Tipo de Marcas --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="denom_nombre_marca">Denominación Nombre de Marca</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="denom_nombre_marca">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="descripcion_clase">Descripción de la Clase</label>
                                    <input type="text" class="form-control" id="descripcion_clase" name="descripcion_clase">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="tipo_normativo">Tipo de Marcas: </label>
                                <select class="custom-select mb-4" id="tipo_normativo" name="select_tipo_marca">
                                    <option disabled selected>-- Elegir un tipo --</option>
                                    <option>NOMINATIVO</option>
                                    <option>Mixta</option>
                                    <option>Tridimensional </option>
                                    <option>Innominada </option>
                                </select>
                                <small id="tipoMarcaHelp" class="form-text text-muted">
                                 En caso de que sea tipo Mixta, Tridimensional o Innominada debe agregar una imagen. Nominativo no oncluye imagen
                                </small>
                                <div class="custom-file">
                                    <input disabled type="file" class="custom-file-input" id="imgTipoMarca" name="img_tipo_marca">
                                    <label class="custom-file-label" for="imgTipoMarca" data-browse="Buscar Archivo">Cargar imagen gif</label>
                                </div>
                            </div>

                            {{-- Datos Generales --}}
                            
                            <div class="form-group">
                                <label for="expediente">Expediente</label>
                                <input type="text" class="form-control" id="expediente" placeholder="exp..." name="expediente">
                            </div>
                            <label for="img_logo">Logo</label>
                            <div class="custom-file mb-4">
                                    <input type="file" class="custom-file-input" id="imgLogo" name="img_logo">
                                    <label class="custom-file-label" for="imgLogo" data-browse="Buscar Archivo">Cargar imagen gif</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for="fecha_legal_ingreso">Fecha Legal | Ingreso al IMPI:</label>
                                    <input type="date" id="start"  name="fecha_legal_ingreso">
                                </div>
                                <div class="col-6">
                                    <label for="fecha_concesion" class="mr-3">Fecha de Concesion:</label>
                                    <input type="date" id="start"  name="fecha_concesion">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-4">
                                    <label for="no_marca_registro">No. Marca o Registro</label>
                                    <input name="no_marca_registro" type="text" class="form-control" id="no_marca_registro" placeholder="Numero de marca o regisro..">
                                </div>
                                <div class="form-group col-4">
                                    <label for="clase">Clase</label>
                                    <input name="clase" type="text" class="form-control" id="clase" placeholder="Clase">
                                </div>
                                <div class="form-group col-4">
                                    <label for="tipo_marca">Tipo de Marca</label>
                                    <input name="tipo_marca" type="text" class="form-control" id="tipo_marca" placeholder="...tipo_marca">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="fecha_primer_uso">Fecha primer uso</label>
                                        <input  name="fecha_primer_uso" type="date" id="fecha_primer_uso">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-6">
                                        <label for="fecha_renovacion">Fecha renovación</label>
                                        <input  name="fecha_renovacion" type="date" id="fecha_renovacion">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-4">
                                    <label for="n_oficna">Numero de Oficina</label>
                                    <input name="n_oficna" type="number" id="n_oficna" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="comentarios">comentarios</label>
                                <textarea class="form-control" id="comentarios"placeholder="...comentarios"></textarea>
                            </div>
                            <div class="form-group">
                                    <label for="fecha_comprobacion">Fecha de Comprobación </label>
                                    <input  name="fecha_comprobacion" type="date" id="fecha_comprobacion">
                            </div>
                            {{--Datos Dueño--}}
                            <div class="h3"><p> Dueño de la marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="titulo_marca">Titular o Dueño de la marca</label>
                                    <input name="titulo_marca" type="text" class="form-control" id="titulo_marca">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="telefono_dueño">Telefono</label>
                                    <input  name="telefono_dueño" type="text" class="form-control" id="telefono_dueño">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="correo_dueño">Correo</label>
                                    <input name="correo_dueño" type="text" class="form-control" id="correo_dueño">
                                </div>
                            </div>
                            {{--Datos responsable--}}
                            <div class="h3"><p> Responsable de la marca</p></div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="responsable_marca">Responsable de la marca</label>
                                <input name="responsable_marca" type="text" class="form-control" id="responsable_marca">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="puesto_responsable">Puesto</label>
                                <input name="puesto_responsable" type="text" class="form-control" id="puesto_responsable">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <label for="responsable_tel">Telefono</label>
                                    <input name="responsable_tel" type="text" class="form-control" id="inputAddress">
                                </div>
                                <div class="form-group col-6">
                                    <label for="responsable_correo">Correo</label>
                                    <input  name="responsable_correo" type="email" class="form-control" id="responsable_correo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="colonia">Colonia</label>
                                    <input name="colonia" type="text" class="form-control" id="colonia">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="codigo_postal">Codigo Postal</label>
                                    <input name="codigo_postal" type="text" class="form-control" id="codigo_postal">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="municipio">Municipio | Alcalia</label>
                                    <input name="municipio" type="text" class="form-control" id="codigo_postal">
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
@stop

@section('js')

    <script>
        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0,10);
        });

        $("#tipo_normativo").on('change',function(event){
        event.preventDefault();
        if(this.value != 'NOMINATIVO'){
            $('#imgTipoMarca').prop("disabled", false);
        } else{
            $('#imgTipoMarca').prop("disabled", true);
        }
        });

        $('input[type="date"]').val(new Date().toDateInputValue());
    </script>
@stop