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
                      Total
                    </th>
                    <th>
                      Día
                    </th>
                    <th class="text-right">
                      Acciones
                    </th>
                  </tr></thead>
                  <tbody>
                  @foreach($histories as $value)
                    <tr>
                      <td>
                      {{ $value-> winner }}
                      </td>
                      <td>
                      {{ $value-> total }}
                      </td>
                      <td>
                      {{ $value-> day }}
                      </td>
                      <td>
                        @can('editar-historial')
                          <a class="btn btn-primary" href="{{ route('history.edit',$value->id) }}">Editar</a>
                        @endcan
                        @can('eliminar-historial')
                            {!! Form::open(['method' => 'POST','route' => ['history.destroy', $value->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                      </td>
                    </tr>
                  @endforeach 
                  </tbody>
                </table>
              </div>

              {!! $histories->render() !!}
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

