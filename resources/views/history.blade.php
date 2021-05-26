@extends('layouts.app', ['activePage' => 'ticket', 'title' => __('Ticket')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="container mt-5">

   

    <form action="" method="post" action="{{ route('history.store') }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf


        <div class="form-group">
            <label>Ganador:</label>
            <input type="text" class="form-control" name="winner" >
        </div>


        <div class="form-group">
        <label>Lugar:</label>
        <select name="place_id" id="listselect">
            @foreach($place as $key => $value)
                <option value="{{ $value->id }}">{{ $value->place }}</option>
            @endforeach
        </select>

        </div>

        <div class="form-group">
             <label>Total:</label>
            <input type="text" class="form-control" name="total" id="total">
        </div>

        <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
    </form>
    </div>
  </div>
</div>
@endsection