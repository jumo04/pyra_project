@extends('layouts.app', ['activePage' => 'lotteries', 'titlePage' => __('Loterias')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Loterias: </h4>
              <p class="card-category"> </p>
            </div>
            <div class="card-body">
              <div class="row">
               <div class="col-12 text-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('lotteries.create') }}">Crear Loteria</a>
                </div> 
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Nombre
                    </th>
                    <th>
                      Bloqueado
                    </th>
                    <th class="text-right">
                      Action
                    </th>
                  </tr></thead>
                  <tbody>
                  @foreach($loterries as $key => $value)
                    <tr>
                      <td>
                        {{ ++$i}}
                      </td>
                      <td>
                      {{ $value-> name }}
                      </td>
                      <td>
                      {{ $value-> block }}
                      </td>
                      <td>
                        
                      </td>
                      <td>
                      <td>
                        <a class="btn btn-primary" href="{{ route('lotteries.edit',$value->id) }}">Editar</a>
                        
                        </td>
                      </td>
                    </tr>
                @endforeach 
                  </tbody>
                </table>
                {!! $loterries->render() !!}
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection

