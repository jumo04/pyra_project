@extends('layouts.app', ['activePage' => 'lottery', 'titlePage' => __('Crear Loteria')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Crear Historial: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="col-12 text-right">
                    <a class="btn btn-primary" href="{{ route('history.index') }}">Atras</a>
                  </div>
              </div>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <strong>Revisa!</strong> Algo salio mal con el formulario.<br><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
              {!! Form::open(array('route' => 'history.store','method'=>'POST')) !!}
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Ganador:</strong>
                          {!! Form::text('winner', null, array('placeholder' => 'Ganador','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                          <strong>Total:</strong>
                          {!! Form::text('total', null, array('placeholder' => 'Total Ganado','class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group" >
                        <strong>Cuando Gano:</strong>
                          {!! Form::text('day', null, array('placeholder' => 'Fecha del día del ganador','class' => 'form-control datepicker', 'id'=> 'date')) !!}
                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group" >
                        <strong>Loteria: </strong>
                         {!! Form::select('lottery_id', $lotteries, [], array('class' => 'form-control')) !!}
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Crear</button>
                  </div>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
  $("#date").datetimepicker({
    format: 'Y-MM-D',
  });
});
    
</script>
@endsection


