<tr>
    <td class="p-2 text-left"> {{ $value->num-> num }}</td>
    <td class="p-2 text-left col-1"  >0</td>
    <td class="p-2 text-left col-2"  >0</td>
    <td class="p-2 text-left col-3"  >0</td>
    <td class="p-2 text-left col-4"  >0</td>
    <td class="p-2 text-left col-5"  >0</td>
    <td class="p-2 text-left col-6"  >0</td>
    <td class="p-2 text-left col-7"  >0</td>
    <td class="p-2 text-left col-8"  >0</td>
    <td class="p-2 text-left col-9"  >0</td>
    <td class="p-2 text-left col-10" >0</td>
    <td class="p-2 text-left col-11" >0</td>
    <td class="p-2 text-left col-12" >0</td>
    <td class="p-2 text-left col-13" >0</td>

    @foreach($value->num->numlotteries()->whereDate('created_at', '=', $date)->get() as $numlot)
        @if($numlot -> lottery -> name == 'MEDELLIN')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' => $l, 'col' => 1 , 'count' => $numlot -> total_count])
        @endif
        @if($numlot -> lottery -> name == 'BOGOTA')
            @include('components.table.scri', ['total' => $numlot -> total, 'row' => $l , 'col' => 2 , 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'CRUZ ROJA')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' => $l, 'col' => 3 , 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'SINUANO')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' =>  $l, 'col' => 4 , 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'HUILA')
            @include('components.table.scri', ['total' =>  $numlot -> total, 'row' => $l, 'col' => 5, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'CARIBEÑA')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' => $l , 'col' => 6, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'RISARALDA')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' => $l , 'col' => 7, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'QUINDIO')
            @include('components.table.scri', ['total' => $numlot -> total, 'row' => $l , 'col' => 8, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'TOLIMA')
            @include('components.table.scri', ['total' => $numlot -> total, 'row' => $l, 'col' => 9, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'CUNDINAMARCA')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' => $l, 'col' => 10, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'SANTANDER')
            @include('components.table.scri', ['total' => $numlot -> total , 'row' => $l, 'col' => 11, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'BOYACA')
            @include('components.table.scri', ['total' => $numlot -> total, 'row' => $l, 'col' => 12, 'count' => $numlot -> total_count ])
        @endif
        @if($numlot -> lottery -> name == 'CAUCA')
            @include('components.table.scri', ['total' => $numlot -> total, 'row' =>  $l, 'col' => 13, 'count' => $numlot -> total_count ])
        @endif
    @endforeach
    @php
        $sumArray = 0;
        foreach($value->num->numlotteries()->whereDate('created_at', '=', $date)->get() as $numlot)
        {
            $sumArray = $sumArray + $numlot -> total;
        }
    @endphp
    <td class="p-2 text-right" >$ {{ number_format($sumArray, 0, '', '.')}}</td>
</tr>
