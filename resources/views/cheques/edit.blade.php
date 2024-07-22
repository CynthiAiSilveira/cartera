@extends('adminlte::page')

@section('title','IM CHEQUES')

@section('content_header')
<h1 class="m-0 text-dark"></h1>
@stop
 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Editar Cheque</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cheques.update', $cheque->id_cheque) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="fecha_creacion">Fecha:</label>
                            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ $cheque->fecha_creacion }}" required>
                        </div>
                        <div class="form-group">
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $cheque->cantidad }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_beneficiario">Beneficiario:</label>
                            <select class="form-control" id="id_beneficiario" name="id_beneficiario" required>
                                <option value="">Selecciona un beneficiario</option>
                                @foreach ($beneficiarios as $beneficiario)
                                    <option value="{{ $beneficiario->id_beneficiario }}" {{ $cheque->id_beneficiario == $beneficiario->id_beneficiario ? 'selected' : '' }}>{{ $beneficiario->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cantidad_letra">Cantidad en Letra:</label>
                            <input type="text" class="form-control" id="cantidad_letra" name="cantidad_letra" value="{{ $cheque->cantidad_letra }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
