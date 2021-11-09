@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
      @if ($message = Session::get('success'))
          <div class="alert alert-success">
              <p>{{ $message }}</p>
          </div>
      @endif
      
      @can('eliminar-todo')
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="col-12 text-right">
            <a class="btn btn-sm btn-primary" href="{{ route('delete_all') }}">Eliminar Todo</a>
          </div>
        </div>
        
        @endcan
       
        <div class="container">
          <div class="row">
          @foreach($winners as $value)
            <div class="col-lg-3 ">
                  <div class="card card-margin">
                      <div class="card-body" style="padding: 0;">
                          <div class="widget-49">
                              <div class="widget-49-title-wrapper" style="display: flex;">
                                  <div class="widget-49-date-primary">
                                      <span class="widget-49-date-day">{{ explode('-', $value-> day)[2] }} </span>
                                      <span class="widget-49-date-month">{{ explode('-', $value-> day)[1]  }}</span>
                                  </div>
                                  <div class="widget-49SANTANDER-meeting-info">
                                      <span class="widget-49-pro-title">Ganador: {{$value-> winner }}</span>
                                      <br>  
                                      <span class="widget-49-meeting-time">Lotería: {{$value ->lottery->name  }}</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
        <div class="container">
          <div class="row>
            <div class="col-lg-12  col-md-12 col-sm-12">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Total Dinero Jugado</p>
                  <h3 class="card-title">{{ $total_value ?? '' }}</h3>
                </div>
              </div>
            </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Boletos jugados</p>
                  <h3 class="card-title">{{ $total_tickets ?? '' }} </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
      </div>
    </div>
  </div>
@endsection
