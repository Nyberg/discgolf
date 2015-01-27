@extends('db')

@section('content')

	<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa runda</h4>
   {{Form::open(['method'=>'POST', 'route'=>['account-round-add-score'], 'class'=>'form-horizontal style-form'])}}


      <div class="form-group">
          <label class="col-sm-1 col-sm-1 control-label">Välj Bana</label>
          <div class="col-sm-5">

         <select name="course" class="form-control teepads" id="teepads">
                              <option value="0">Välj Bana</option>
                              @foreach($courses as $course)
                              <option id="{{$course->id}}" value="{{$course->id}}">{{$course->name}}</option>
                              @endforeach
                              </select>
          </div>

          <div class="tee">

          <label class="col-sm-1 col-sm-1 control-label">Tee</label>
               <div class="col-sm-5">

                    <select name="teepad" class="form-control" id="target">
                    <option value="0" selected="selected">Välj teepad</option>
                    </select>

                  </div>

                  </div>

        </div>



        <div class="form-group">

         <label class="col-sm-1 col-sm-1 control-label">Välj typ</label>
                  <div class="col-sm-5">

                                <select name="type" class="form-control type" id="type">
                                        <option id="1" value="Singel">Singel</option>
                                        <option id="2" value="Par">Par</option>
                                </select>
                    </div>



        <div class="user">

           <label class="col-sm-1 col-sm-1 control-label">Medspelare</label>
           <div class="col-sm-5">
           <select name="players" class="form-control players" id="players">
           <option value="0" selected="selected">Välj spelare</option>
           </select></div>
           </div>
        </div>



        {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}


        </div>

@stop