<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    <style>
      th,
      td{font-size: 10px ;}
      .page-break {
          page-break-after: always;
      }
    </style>
</head>

<body>
<div class="content">
  <div class="container-fluid">
      <h2>Boletos Jugados: </h2>
    <div class="row">
      <div class="table-responsive">
      <table class="table">
            <thead>
                <tr class="table-danger">
                  <th>
                    Nombre
                  </th>
                  <th>
                    Numeros
                  </th>
                  <th>
                    Loteria
                  </th>
                  <th>
                    Lugar
                  </th>
                  <th>
                    Valor
                </tr>
            </thead>
            <tbody>
              @foreach($ticket as $value)
                    <tr>
                      <td style="width: 13%;" >
                        {{ $value ->name }}
                      </td>
                      <td style="width: 20%">
                        @foreach($value->num as $val)
                          <label class="badge badge-danger">{{ $val }}</label>
                        @endforeach
                      </td>
                      <td>
                        @foreach($value->lotteries as $val)
                          <label class="badge badge-success" style="background-color: #12a69e;">{{ $val->name }}</label>
                        @endforeach
                      </td>
                      <td style="width: 13%;">
                       {{ $value->user->place->name}}
                      </td>
                      <td class="text-primary" style="width: 13%;">
                      {{ $value->total }}
                      </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>

    </div>

    <div class="page-break"></div>
    <div class="row">
      <h2>Números Jugados: </h2>
      <div class="table-responsive">
      <table class="table">
           <div class='col-md-12 text-right' >
                  <h4 >
                  Total Facturado: 
                  </h4>
                  <h5 class='text-primary'>
                    {{ $valor_total }}
                  </h5>
                </div>
            <thead>
                <tr class="table-danger">
                <th>
                    Numero
                  </th>
                  <th>
                    Cuantos
                  </th>
                  <th>
                    Facturado
                  </th>
                </tr>
            </thead>
            <tbody>
            @foreach($numbers as $value)
                    <tr>
                      <td>
                      {{ $value-> num }}
                      </td>
                      <td>
                      {{ $value-> total_count }}
                      </td>
                      <td class="text-primary">
                      {{ $value-> total }}
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>


    
    </div>
    </div>
    </div>

    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>