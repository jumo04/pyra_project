@extends('layouts.app', ['activePage' => 'edit', 'titlePage' => __('Editar Loteria')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Loteria: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 text-right">
                  <a class="btn btn-primary" href="{{ route('history.index') }}"> Atras</a>
                </div>
              </div>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Alerta!</strong> Hubo un problema con esto por favor revisar<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              {!! Form::model($history, ['method' => 'POST','route' => ['history.update', $history->id]]) !!}
              <div>
                 <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Nombre:</strong>
                          {!! Form::text('name', $history->name, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Ganador:</strong>
                          {!! Form::text('winner', $history->winner, array('placeholder' => 'Ganador','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Total:</strong>
                          {!! Form::text('total', $history->total, array('placeholder' => 'Total Ganado','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group" >
                        <strong>Cuando Gano:</strong>
                          {!! Form::text('day', $history->day, array('placeholder' => 'Fecha del día del ganador','class' => 'form-control datepicker')) !!}
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group" >
                        <strong>Loteria: </strong>
                         {!! Form::select('lottery_id', $lotteries, $lottery, array('class' => 'form-control')) !!}
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
