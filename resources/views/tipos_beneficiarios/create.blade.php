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
                    <h3 class="card-title">Crear Tipo Beneficiario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tipos_beneficiarios.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tipo">Nombre:</label>
                            <input type="text" class="form-control" id="tipo" name="tipo" required>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection