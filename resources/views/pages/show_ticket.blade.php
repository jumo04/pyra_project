@extends('layouts.app', ['activePage' => 'show_ticket', 'titlePage' => __('Mostrar Boleto')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Boletos Jugados:</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
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
                  </th>
                </thead>
                <tbody>
                
                @foreach($ticket as $key => $value)
                    <tr>
                      <td>
                      {{ $value->name }}
                      </td>
                      <td>
                      {{ $value->num }}
                      </td>
                      <td>
                      {{ $value-> lottery_id }}
                      </td>
                      <td>
                      {{ $value->place_id }}
                      </td>
                      <td class="text-primary">
                      {{ $value->total }}
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
  </div>
</div>
@endsection