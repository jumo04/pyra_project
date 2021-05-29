@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Manejo de Usuarios')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Usuarios: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
              <div class="pull-right">
                  @can('rol-create')
                      <a class="btn btn-success" href="{{ route('roles.create') }}"> Crear Rol</a>
                  @endcan
                 </div>
              </div>
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
              @endif

            <table class="table table-bordered">
                <tr>
                <th>No</th>
                <th>Name</th>
                <th width="280px">Configuracion</th>
                </tr>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                          <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Mostrar</a>
                        @can('rol-edit')
                          <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                        @endcan
                        @can('rol-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
                </table>

                {!! $roles->render() !!}
          </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

