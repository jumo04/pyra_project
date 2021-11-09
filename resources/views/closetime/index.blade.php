@extends('layouts.app', ['activePage' => 'uniques', 'titlePage' => __('Uniques')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Registro: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
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
                      No
                    </th>
                    <th>
                      Hora de bloqueo
                    </th>
                    <th>
                      Bloqueado
                    </th>
                    <th class="text-right">
                      Acciones
                    </th>
                  </tr></thead>
                  <tbody>
                  @foreach($unique as $key => $value)
                    <tr>
                      <td>
                        1
                      </td>
                      <td>
                      {{ $value-> time }}
                      </td>
                      <td>
                      @if( $value-> block == false)
                        No
                      @elseif ( $value-> block == true)
                        Si
                      @endif
                      </td>
                      <td>

                      </td>
                      <td>
                      <td>
                        <a class="btn btn-primary" href="{{ route('unique.edit',$value->id) }}">Editar</a>

                        </td>
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

