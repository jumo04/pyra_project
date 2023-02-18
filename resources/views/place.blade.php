@extends('layouts.app', ['activePage' => 'place', 'title' => __('Lugar')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="container mt-5">

   
    <form action="" method="post" action="{{ route('place.store') }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf

        <div class="form-group">
            <label>Lugar:</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>


        <input type="submit" name="send" value="Enviar" class="btn btn-dark btn-block">
    </form>
    </div>
  </div>
</div>
@endsection