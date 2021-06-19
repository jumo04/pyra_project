@extends('layouts.app', ['activePage' => 'edit', 'titlePage' => __('Editar Loteria')])

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
                  <a class="btn btn-primary" href="{{ route('users.index') }}"> Atras</a>
                </div>
              </div>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              {!! Form::model($user, ['method' => 'POST','route' => ['lotteries.update', $user->id]]) !!}              
              <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nombre:</strong>
                          {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group" >
                        <strong>Fecha de Cierre:</strong>
                          {!! Form::text('close', null, array('placeholder' => 'Fecha de cierre','class' => 'form-control datepicker')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Bloquear:</strong>
                          <label>{{ Form::checkbox('block', null, false ) }}</label>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection