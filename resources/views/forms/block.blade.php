@extends('layouts.app', ['activePage' => 'block', 'title' => __('Bloquear')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="container mt-5">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Bloquear: </h4>
            <p class="card-category"> </p>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-12 text-right">
            <a class="btn btn-primary" href="{{ route('show_number') }}">Atras</a>
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
    <form action="" method="post" action="{{ route('block') }}">

        <!-- CROSS Site Request Forgery Protection -->
        @csrf

        <div class="form-group">
            <div class="field_wrapper">
                 <label>Numeros:</label>
                <input type="number" class="form-control" name="num[]" value="" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)"  />
                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="material-icons">add</i></a>
            </div>
        </div>


        <input type="submit" name="send" value="Bloquear" class="btn  btn-primary btn-block">
    </form>
    </div>
    </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div><input class="form-control" type="number" name="num[]" value=""  onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" /><a href="javascript:void(0);" class="remove_button"><i class="material-icons">remove</i></a></div>'; //New input field html 
        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    function maxLengthCheck(object) {
        if (object.value.length > 4)
        object.value = object.value.slice(0, 4)
    }

    function isNumeric (evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode (key);
        var regex = /[0-9]|\./;
        if ( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
    </script>
@endsection