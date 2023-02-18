@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => '403', 'title' => __('403 Error')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
      <div class="col-md-10">
         <img class="img-fluid" style=" margin-top: 15%;" src="{{ asset('material') }}/img/error-403-forbbiden.png" alt="">
      </div>
  </div>
</div>
@endsection
