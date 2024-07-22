@extends('adminlte::page')

@section('title', 'IM CHEQUES')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Crear Cheque</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('cheques.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="fecha_creacion">Fecha:</label>
                            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" required>
                        </div>
                        <div class="form-group">
                        <div class="form-group">
  <label for="cantidad">Cantidad:</label>
  <input type="number" class="form-control" id="cantidad" name="cantidad" required oninput="actualizarCantidadEnLetras()">
</div>
                        <div class="form-group">
                            <label for="id_beneficiario">Beneficiario:</label>
                            <select class="form-control" id="id_beneficiario" name="id_beneficiario" required>
                                <option value="">Selecciona un beneficiario</option>
                                @foreach ($beneficiarios as $beneficiario)
                                    <option value="{{ $beneficiario->id_beneficiario }}">{{ $beneficiario->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
  <label for="cantidad_letra">Cantidad en Letra:</label>
  <input type="text" class="form-control" id="cantidad_letra" name="cantidad_letra" > 
</div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

<script>
  function convertirNumeroALetras(numero) {
    // Función para convertir un número a letras en español (hasta billones)
    const unidades = ["", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve"];
    const decenas = ["", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta", "setenta", "ochenta", "noventa"];
    const centenas = ["", "ciento", "doscientos", "trescientos", "cuatrocientos", "quinientos", "seiscientos", "setecientos", "ochocientos", "novecientos"];

    if (numero === 0) {
      return "cero";
    }

    if (numero < 10) {
      return unidades[numero];
    }

    if (numero < 20) {
      return decenas[numero - 10];
    }

    if (numero < 100) {
      return decenas[Math.floor(numero / 10)] + (numero % 10 !== 0 ? " y " + unidades[numero % 10] : "");
    }

    if (numero < 1000) {
      return centenas[Math.floor(numero / 100)] + (numero % 100 !== 0 ? " " + convertirNumeroALetras(numero % 100) : "");
    }

    if (numero < 1000000) {
      return convertirNumeroALetras(Math.floor(numero / 1000)) + " mil" + (numero % 1000 !== 0 ? " " + convertirNumeroALetras(numero % 1000) : "");
    }

    if (numero < 1000000000) {
      return convertirNumeroALetras(Math.floor(numero / 1000000)) + " millones" + (numero % 1000000 !== 0 ? " " + convertirNumeroALetras(numero % 1000000) : "");
    }

    if (numero < 1000000000000) {
      return convertirNumeroALetras(Math.floor(numero / 1000000000)) + " mil millones" + (numero % 1000000000 !== 0 ? " " + convertirNumeroALetras(numero % 1000000000) : "");
    }

    return "Número demasiado grande";
  }

  function actualizarCantidadEnLetras() {
    const cantidad = parseInt(document.getElementById("cantidad").value);
    if (!isNaN(cantidad)) {
      const cantidadEnLetras = convertirNumeroALetras(cantidad);
      document.getElementById("cantidad_letra").value = cantidadEnLetras;
    } else {
      document.getElementById("cantidad_letra").value = '';
    }
  }

  document.getElementById("cantidad").addEventListener("input", actualizarCantidadEnLetras);
</script>
@stop