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
      </div>
    <div class="row ">
       <div class="col-lg-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body cleartfix">
                <div class=" align-items-stretch">
                  @foreach($lotteries as $val)
                    <label class="badge badge-success" style="background-color: #B8B8B8;margin-right: 20px;font-size: 14px;">{{ $val->name }}</label>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class=" col-lg-12">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Boletos Jugados</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                              {{ $total_tickets }}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>10% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Dinero Jugado</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                ${{ $total_value }}
                            </h2>
                        </div>
                        <div class="col-4 text-right">
                            <span>2.5% <i class="fa fa-arrow-up"></i></span>
                        </div>
                    </div>
                    <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
