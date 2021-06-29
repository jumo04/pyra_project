@extends('layouts.app', ['activePage' => 'show_number', 'titlePage' => __('Mostrar Numero')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Numero Jugados:</h4>
            <a class="nav-link btn btn-success" href="{{ route('block') }}"> Bloquear </a>
            <a class="nav-link btn btn-success " href="{{ route('deblock') }}"> Desbloquear</a>
            <p class="card-category"></p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
              @endif
                <div class='col-md-12 text-right' >
                  <h4 >
                  Total Facturado: 
                  </h4>
                  <h5 class='text-primary'>
                    {{ $valor_total }}
                  </h5>
                </div>
                <thead class=" text-primary">
                  <th>
                    Numero
                  </th>
                  <th>
                    Cuantos
                  </th>
                  <th>
                    Facturado
                  </th>
                  <th>
                    Bloqueado
                  </th>
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
                      <td>
                      @if( $value-> block == false)
                        No
                      @elseif ( $value-> block == true)
                        Si
                      @endif
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              {!! $numbers->render() !!}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection