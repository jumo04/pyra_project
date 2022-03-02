@extends('layouts.app', ['activePage' => 'historyday', 'titlePage' => __('Mostrar Historial')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Numero Jugados:</h4>
            <p class="card-category"></p>
          </div>
          <div class="card-body">

            <div class="table-responsive">
            <table id="myTable"   data-toggle="table" data-search="true">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class='col-md-12 text-right' >
                    <h4 >
                    Total Facturado:
                    </h4>
                    <h5 class='text-primary'>
                    </h5>
                </div>
                <thead class=" text-primary">
                    <tr>
                        @php
                            $y = 0;
                        @endphp
                        <script>
                            var cols = [];
                        </script>
                        @foreach ($headers as $header)
                        <th  data-sortable="true" class="px-2 py-3 text-left d-none col-{{ $y }}">
                            {{ $header }}
                        </th>
                        @php
                            $y++;
                        @endphp
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                        $l = 1;
                    @endphp
                    @foreach($numlots as $value)
                        @if($i == 0)
                            @include('components.table.tr', ['value' => $value , 'date' =>  $date ])
                            @php
                                $i++;
                                $l++;
                            @endphp
                        @else
                            @if ($numlots[$i]->num-> num != $numlots[$i-1]->num-> num)
                                @include('components.table.tr', ['value' => $value , 'date' =>  $date ])
                            @php
                                $i++;
                                $l++;
                            @endphp
                            @else
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endif
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function hide_show_table(col_name)
        {
        var all_col=document.getElementsByClassName(col_name);
            for(var i=0;i<all_col.length;i++)
            {
            all_col[i].classList.add('d-none');
            }
        }
        for (let i = 1; i < 16; i++) {
            hide_show_table('col-' + i);
        }
    </script>
    <script type="text/javascript">
        for (var j = 0; j < cols.length; j++) {
            const element = cols[j];
            var all_col=document.getElementsByClassName(element);
            for(var i=0;i<all_col.length;i++)
                {
                all_col[i].classList.remove('d-none');
                }
        }
        var col=document.getElementsByClassName('col-14');
        for(var i=0;i<col.length;i++)
            {
                col[i].classList.remove('d-none');
            }
    </script>
@endsection


