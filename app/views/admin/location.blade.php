@extends('db')

@section('content')

    <div class="showback">

     <h4 class="mb"><i class="fa fa-angle-right"></i> Alla Städer, Landskap & Länder</h4>
     <div class="row">
        <div class="col-lg-12">
           <a class="btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#group_form">Lägg till</a>
        </div>
     </div>
         <table class="table table-hover">
             <thead>
                 <th>Stad</th>
                 <th>Ta bort</th>
             </thead>
         <tbody>
            @foreach($cities as $city)
            <tr>
                <td>{{$city->city}}</td>
                <td>
                {{Form::open(['method'=>'DELETE', 'route'=>['country.destroy', $city->id]])}}
                {{Form::hidden('type', 'city')}}
                {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      <div class="row">

       <div class="col-md-12">

               <table class="table table-hover">
                    <thead>
                        <th>Landskap</th>
                        <th>Ta bort</th>
                    </thead>
                <tbody>
                   @foreach($states as $state)
                   <tr>
                       <td>{{$state->state}}</td>
                       <td>
                       {{Form::open(['method'=>'DELETE', 'route'=>['country.destroy', $state->id]])}}
                       {{Form::hidden('type', 'state')}}
                       {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                       {{Form::close()}}
                       </td>
                   </tr>
                   @endforeach
                 </tbody>
             </table>

       </div>

      </div>

      <div class="row">

       <div class="col-md-12">

               <table class="table table-hover">
                    <thead>
                        <th>Länder</th>
                        <th>Ta bort</th>
                    </thead>
                <tbody>
                   @foreach($countries as $country)
                   <tr>
                       <td>{{$country->country}}</td>
                       <td>
                       {{Form::open(['method'=>'DELETE', 'route'=>['country.destroy', $country->id]])}}
                       {{Form::hidden('type', 'country')}}
                       {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                       {{Form::close()}}
                       </td>
                   </tr>
                   @endforeach
                 </tbody>
             </table>

       </div>

      </div>

      </div>

          @if(Auth::check() && Auth::user()->hasRole('Admin'))
              <div class="modal fade" id="group_form" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">
                              <span aria-hidden="true">&times;</span>
                              <span class="sr-only">Close</span>
                              </button>
                              <h4 class="modal-title">Lägg till</h4>
                          </div>
                          <div class="modal-body">
                              {{Form::open(['method' => 'post', 'route'=>'country.store'])}}
                              <div class="form-group">
                              {{Form::label('namn','Namn')}}
                              {{Form::text('name', '', ['class' => 'form-control'])}}
                              </div>
                              <div class="form-group">
                                {{Form::label('type','Typ')}}
                                 {{Form::select('type', ['Country'=>'Land', 'State'=>'Landskap', 'City'=>'Stad'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                                </div>

                          </div>
                          <div class="modal-footer">
                                {{Form::submit('Lägg till', ['class'=>'btn btn-success'])}}
                              {{Form::close()}}
                             <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                          </div>
                      </div>
                  </div>
              </div>
          @endif

@stop