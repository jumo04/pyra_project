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
        <div class="col-lg-3 col-md-6 col-sm-6">
        
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">store</i>
              </div>
              <p class="card-category">Total Dinero Jugado</p>
              <h3 class="card-title">{{ $total_value ?? '' }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last 24 Hours
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info_outline</i>
              </div>
              <p class="card-category">Boletos jugados</p>
              <h3 class="card-title">{{ $total_tickets ?? '' }} </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i> {{ auth()->user()->place['name']}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Ventas de una semana</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> Venta </span></p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> actualizado hace un dia
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Tareas Completadas</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <div class="row">
        <div class="col-lg-3 col-sm-none">
        </div>
        <div class="col-lg-3 col-sm-none">
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
/*       md.initDashboardPageCharts();
 */      
      if ($('#dailySalesChart').length != 0 ) {
        /* ----------==========     Daily Sales Chart initialization For Documentation    ==========---------- */

        dataDailySalesChart = {
          labels: ['L', 'M', 'M', 'J', 'V', 'S', 'D'],
          series: [
            [12, 17, 7, 17, 23, 18, 38]
          ]
        };

        optionsDailySalesChart = {
          lineSmooth: Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          },
        }

        var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

        var animationHeaderChart = new Chartist.Line('#websiteViewsChart', dataDailySalesChart, optionsDailySalesChart);
      }
    });
  </script>
@endpush