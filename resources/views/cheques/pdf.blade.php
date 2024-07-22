<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        @page {
            size: 165mm 70mm; /* Tamaño del papel en milímetros */
            margin: 5mm; /* Márgenes del papel */
        }
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .info {
            margin-bottom: 20px;
        }

        .info label {
            display: block;
            margin-bottom: 5px;
        }

        .info span {
            display: block;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
      
        <div class="info">
            &nbsp;
            
            <span>{{ $cheque->fecha_creacion }}</span>

         
            <span>{{ $cheque->cantidad }}</span>

            
            <span>{{ $cheque->beneficiario->nombre }}</span>

            
            <span>{{ $cheque->cantidad_letra }}</span>
        </div>
       
    </div>
</body>
</html>