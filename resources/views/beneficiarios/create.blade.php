@extends('adminlte::page')

@section('title', 'IM CHEQUES')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Crear Beneficiario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('beneficiarios.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="id_tipo">Tipo de Beneficiario:</label>
                            <select class="form-control" id="id_tipo2" name="id_tipo" required>
                                <option value="">Selecciona un tipo de beneficiario</option>
                                @foreach ($tipos_beneficiarios as $tipo)
                                    <option value="{{ $tipo->id_tipo }}">{{ $tipo->tipo }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection