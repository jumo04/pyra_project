@extends('layouts.app', ['activePage' => 'edit', 'titlePage' => __('Editar Loteria')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Hora de cierre: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a class="btn btn-primary" href="{{ route('unique.index') }}"> Atras</a>
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
              {!! Form::model($unique, ['method' => 'POST','route' => ['unique.update', $unique->id]]) !!}
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group" >
                        <strong>Hora de Cierre:</strong>
                          {!! Form::text('time', $unique->time, array('placeholder' => 'Hora de cierre','class' => 'form-control datepicker')) !!}
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
