@extends('layouts.app', ['activePage' => 'histories', 'titlePage' => __('Historial')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Loterias: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
               <div class="col-12 text-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('history.create') }}">Crear historial</a>
                </div>
                <div class="col-12 text-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('history.number') }}">Crear Historial de Número</a>
                </div>
              </div>
              <div class="table-responsive">
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
              @endif
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                    <th>
                      Ganador
                    </th>
                    <th>
                      Total Jugado
                    </th>
                    <th>
                      Total Boletos Jugado
                    </th>
                    <th>
                      Fecha de Inicio
                    </th>
                    <th>
                      Fecha Final
                    </th>
                    <th>
                      Loterias
                    </th>
                  </tr></thead>
                  <tbody>
                  @foreach ($results as $result)
                    <tr>
                      <td>
                      {{ $result['number'] }}
                      </td>
                      <td>
                      {{ $result ['total_playing'] }}
                      </td>
                      <td>
                      {{ $result ['total_plays'] }}
                      </td>
                      <td>
                      {{ $sdate}}
                      </td>
                      <td>
                      {{ $edate}}
                      </td>
                      <td>
                       @foreach($result['lot'] as $val)
                          <label class="badge badge-success" style="background-color: #12a69e;">{{ $val}}</label>
                        @endforeach
                      </td>
                      <td>
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
