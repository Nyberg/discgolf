@extends('db')

@section('content')

<div class="showback">

<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#sectionA">{{$course->name}}</a></li>
<li class=""><a data-toggle="tab" href="#sectionB">Tees</a></li>
</ul>
<div class="tab-content">
    <div id="sectionA" class="tab-pane fade in active">

                     <h2 class="text-center page-header-custom"> Redigera Bana - {{$course->name}}</h2>
                      <div class="divider-header"></div>
                    <div class="form-horizontal style-form">
                    {{Form::model($course, ['method'=>'PATCH', 'route'=> ['course.update', $course->id], 'files'=>true])}}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                        <div class="col-sm-10">

                            {{Form::text('name', null, ['class'=>'form-control'])}}
                            {{errors_for('name', $errors)}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Land</label>
                        <div class="col-sm-10">
                            <select name="country" class="form-control teepads" id="teepads">
                                 <option value="{{$course->country->id}}">{{$course->country->country}}</option>
                                 @foreach($countries as $country)
                                 <option id="{{$country->id}}" value="{{$country->id}}">{{$country->country}}</option>
                                 @endforeach
                                 </select>
                            {{errors_for('country', $errors)}}

                        </div>
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                             <div class="col-sm-10">
                             <span class="help-block"></span>
                             </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Landskap</label>
                        <div class="col-sm-10">
                            <select name="state" class="form-control teepads" id="teepads">
                                  <option value="{{$course->state->id}}">{{$course->state->state}}</option>
                                  @foreach($states as $state)
                                  <option id="{{$state->id}}" value="{{$state->id}}">{{$state->state}}</option>
                                  @endforeach
                                  </select>
                            {{errors_for('state', $errors)}}

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                         <div class="col-sm-10">
                         <span class="help-block"></span>
                         </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Stad</label>
                        <div class="col-sm-10">
                            <select name="city" class="form-control teepads" id="teepads">
                               <option value="{{$course->city->id}}">{{$course->city->city}}</option>
                               @foreach($cities as $city)
                               <option id="{{$city->id}}" value="{{$city->id}}">{{$city->city}}</option>
                               @endforeach
                               </select>
                            {{errors_for('city', $errors)}}

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                             <div class="col-sm-10">
                             <span class="help-block"></span>
                             </div>
                    </div>

                <div class="form-group">
                       <label class="col-sm-12 col-sm-12 control-label">Google Maps Location</label>
                       <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                       <div class="col-sm-4">
                           {{Form::text('long', null, ['class'=>'form-control'])}}
                           {{errors_for('long', $errors)}}</div>
                            <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                                                         <div class="col-sm-4">
                                                             {{Form::text('lat', null, ['class'=>'form-control'])}}
                                                             {{errors_for('lat', $errors)}}</div>

                       <label class="col-sm-2 col-sm-2 control-label"></label>
                       <div class="col-sm-10">
                           <span class="help-block">Gå till <a href="http://maps.google.com" target="_blank">Google Maps</a> och hämta longitude och latitude koordinaterna (ex 59.371892, 13.392974).</span>
                       </div>
                   </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Information</label>
                        <div class="col-sm-10">
                            {{Form::textarea('information', null, ['class'=>'form-control'])}}
                             </div>

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block"></span>
                        </div>
                    </div>
                         <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Klubb</label>
                           <div class="col-sm-10">
                               {{Form::select('club',$clubs ,$course->club->name,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                               {{errors_for('club', $errors)}}</div>

                           <label class="col-sm-2 col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                               <span class="help-block">Klubben/Orginisationen som underhåller banan.</span>
                           </div>
                       </div>

                         <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Status</label>
                          <div class="col-sm-10">
                              {{Form::select('status', [0=>'Inactive', 1=>'Active'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                            </div>
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                              <span class="help-block">Om banan är inaktiv kan ingen lägga till rundor.</span>
                          </div>
                      </div>



                      <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Avigft</label>
                        <div class="col-sm-10">
                            {{Form::text('fee', null, ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>
                            {{errors_for('fee', $errors)}}

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block">Om det är gratis, lämna fältet blankt</span>
                        </div>
                    </div>

                      <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Bankarta</label>
                           <div class="col-sm-10">
                               {{Form::file('file-2', null, ['class'=>'form-control'])}} </div>


                           <label class="col-sm-2 col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                               <span class="help-block">Bild för översikten över banan</span>
                           </div>
                       </div>

                       <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Header</label>
                                              <div class="col-sm-10">
                                                  {{Form::file('file', null, ['class'=>'form-control'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block">Bild som ska visas när man besöker banans sida</span>
                                              </div>
                                    </div>


                     <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Options</label>
                    <div class="col-sm-3">
                    {{Form::submit('Uppdatera', ['class'=>'btn btn-primary'])}}
                    {{Form::close()}}
                    </div>

</div>
</div>
</div>


    <div id="sectionB" class="tab-pane fade">
    <div class="row">
         <div class="col-lg-12">

           <h2 class="text-center page-header-custom"> Redigera Tees - {{$course->name}}</h2>
            <div class="divider-header"></div>

  <table class="table table-striped table-advance table-hover">


      <thead>
      <tr>

          <th>Color</th>
          <th>Status</th>
          <th>Antal hål</th>
          <th>Lägg till hål</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
      </thead>
      <tbody>

        @foreach($course->tee as $tee)

            <tr>
            <td>{{$tee->color}}</td>
            <td>{{$tee->status}}</td>
            <td>{{$tee->holes}}</td>
            <td><a href="/admin/holes/{{$course->id}}/tee/{{$tee->id}}/add" class="btn btn-theme btn-xs"><i class=" fa fa-plus"></i></a></td>

            <td> <a href="/admin/tee/{{$tee->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
            <td>
              {{Form::open(['method'=>'DELETE', 'route'=>['tee.destroy', $tee->id]])}}
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
        </div>

</div>


@stop