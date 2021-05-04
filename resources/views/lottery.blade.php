@extends('layouts.app', ['activePage' => 'lottery', 'title' => __('Lottery')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title "> Agregar Loteria: </h4>
            <p class="card-category"> </p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                <a class="btn btn-primary" href="#">Atras</a>
                </div>
            </div>
   
          <form action="" method="post" action="{{ route('lottery.store') }}">

              <!-- CROSS Site Request Forgery Protection -->
              @csrf

              <div class="form-group">
                  <label>Nombre: </label>
                  <input type="text" class="form-control" name="name" id="name">
              </div>

              <input type="submit" name="send" value="Crear" class="btn btn-primary btn-block">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection