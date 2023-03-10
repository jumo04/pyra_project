@extends('layouts.app', ['activePage' => 'lotteries', 'titlePage' => __('Loterias')])

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
                @can('loteria-crear')
               <div class="col-12 text-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('lotteries.create') }}">Crear Loteria</a>
                </div>
                @endcan
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
                      Nombre
                    </th>
                    <th>
                      Bloqueado
                    </th>
                    <th class="text-right">
                      Acciones
                    </th>
                  </tr></thead>
                  <tbody>
                  @foreach($loterries as $key => $value)
                    <tr>
                      <td>
                        {{ ++$i}}
                      </td>
                      <td>
                      {{ $value-> name }}
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
                        @can('loteria-editar')
                        <td>
                          <a class="btn btn-primary" href="{{ route('lotteries.edit',$value->id) }}">Editar</a>
                        </td>
                        @endcan
                      </td>
                    </tr>
                @endforeach 
                  </tbody>
                </table>
                {!! $loterries->render() !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

