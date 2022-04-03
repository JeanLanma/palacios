@extends('adminlte::page')

@section('title', 'Añadir')

@section('content_header')
<div>
    <h1>Palacios | <small>Añadir</small></h1>
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
                        <p class="h2">Seleccionar | Titular</p>

                        <form method="GET" action="{{ route('admin.marcas.create',['titular_id' => 1 ]) }}" enctype="multipart/form-data">
                        @csrf
                            {{-- Tipo de Marcas --}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tipo_de_marca">Seleccione un Titular: </label>
                                    <select class="custom-select mb-4" id="selectTitular" name="titular_id">
                                        <option disabled selected value="none">-- Elegir un Titular para continuar --</option>
                                        @foreach($titulares as $titular)
                                        <option value="{{$titular->id}}">{{$titular->titular_nombre}} - {{ $titular->rfc ? 'rfc: '.$titular->rfc : 'correo: '.$titular->correo  }}</option>
                                        @endforeach
                                    </select>

                                    @if (count($titulares) === 0)
                                        <div class="alert alert-light" role="alert">
                                            ¡Parece que no hay titulares! <a href="{{route('admin.titular.add')}}" class="alert-link">Agregar un titular</a>
                                        </div>
                                    @else
                                        <small class="form-text text-muted">Debe seleccionar una opcion para poder continuar<span class="text-danger">*</span></small>
                                    @endif
                                </div> 
                            </div>
                            <div class="form-group">
                                <button disabled class="btn btn-primary" type="submit" id="btnTitularSelection">Continuar</button>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection

@section('js')
<script>
const btnSubmitForm = document.querySelector('#btnTitularSelection');
const titular = document.querySelector('#selectTitular');

titular.addEventListener('change', (e) => {
    if(e.target.value && e.target.value == 'none'){
        btnSubmitForm.disabled = true;
        return;
    }
    btnSubmitForm.disabled = false;
});
</script>
@stop