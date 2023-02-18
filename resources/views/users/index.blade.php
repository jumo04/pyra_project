@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Manejo de Usuarios')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Usuarios: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
              <div class="col-12 text-right">
                  <a  class="btn btn-sm btn-primary" href="{{ route('users.create') }}">Crear Usuario</a>
                </div> 
              </div>
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
              @endif
              <div class="table-responsive">
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
                      Cedula
                    </th>
                    <th>
                      Roles
                    </th>
                    <th class="text-right">
                      Accion
                    </th>
                  </tr></thead>
                  <tbody>
                  @foreach($users as $key => $value)
                    <tr>
                      <td>
                        {{ ++$i}}
                      </td>
                      <td>
                      {{ $value-> name }}
                      </td>
                      <td>
                      {{ $value-> total_count }}
                      </td>
                      <td>
                        @if(!empty($value->getRoleNames()))
                          @foreach($value->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                          @endforeach
                        @endif
                      </td>
                      <td>
                      <td>
                        <a class="btn btn-primary" href="{{ route('users.edit',$value->id) }}">Editar</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $value->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        </td>
                      </td>
                    </tr>
                @endforeach
                  </tbody>
                </table>
                {!! $users->render() !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

