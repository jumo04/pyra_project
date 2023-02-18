@extends('layouts.app', ['activePage' => 'show_ticket', 'titlePage' => __('Mostrar Boleto')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Boletos Jugados:</h4>
          </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
          @endif
          <div class="card-body">
          <div class="row">
            <div class="col-12 text-right">
             <a class="btn btn-primary btn-btn-per" href="{{ route('ticket.form') }}">Crear Boleto</a>
            </div>
            
            <div class="table-responsive">
              <table class="table" data-toggle="table" data-pagination="true"
                 data-search="true">
                <thead class="text-primary">
                  <th>
                    Nombre
                  </th>
                  <th>
                    Numeros
                  </th>
                  <th data-sortable="true">
                    Loteria
                  </th>
                  <th data-sortable="true">
                    Lugar
                  </th>
                  <th data-sortable="true">
                    Día Jugado
                  </th>
                  <th>
                    Valor
                  </th>
                  <th width="280px">Configuracion</th>
                </thead>
                <tbody>
                @foreach($ticket as $value)
                    <tr>
                      <td>
                        {{ $value->name }}
                      </td>
                      <td>
                        @foreach($value->num as $val)
                          <label class="badge badge-danger">{{ $val }}</label>
                        @endforeach
                      </td>
                      <td>
                        @foreach($value->lotteries as $val)
                          <label class="badge badge-success" style="background-color: #12a69e;">{{ $val->name }}</label>
                        @endforeach
                      </td>

                      <td>
                       
                      </td>
                      <td>
                        {{ $value->created_at ->format('Y-m-d') }}
                      </td>
                      <td class="text-primary">
                      {{ $value->total }}
                      </td>
                      <td>
                      @can('eliminar-boleto')
                        {!! Form::open(['method' => 'POST','route' => ['ticket.destroy', $value->id],'style'=>'display:inline']) !!}
                              {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      @endcan
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