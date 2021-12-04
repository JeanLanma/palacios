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
                        <p class="h2">Seleccionar | Provedor/Titular</p>

                        <form method="GET" action="{{ route('admin',['titular_id' => 1 ]) }}" enctype="multipart/form-data">
                        @csrf
                            {{-- Tipo de Marcas --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tipo_de_marca">Tipo de Marcas: </label>
                                    <select class="custom-select mb-4" id="tipo_de_marca" name="tipo_de_marca">
                                        <option disabled selected>-- Elegir un Titular para continuar --</option>
                                        {{--
                                        <option @if($marca->tipo_de_marca == 'NOMINATIVO') selected @endif>NOMINATIVO</option>
                                        <option @if($marca->tipo_de_marca == 'Mixta') selected @endif>Mixta</option>
                                        <option @if($marca->tipo_de_marca == 'Tridimensional') selected @endif>Tridimensional </option>
                                        <option @if($marca->tipo_de_marca == 'Innominada') selected @endif>Innominada </option>
                                        --}}
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Continuar</button>
                            </div> 
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection