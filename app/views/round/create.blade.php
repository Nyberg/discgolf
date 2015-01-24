@extends('db')

@section('content')

	<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa runda</h4>
   {{Form::open(['method'=>'POST', 'route'=>['account-round-add-score'], 'class'=>'form-horizontal style-form'])}}


      <div class="form-group">
          <label class="col-sm-1 col-sm-1 control-label">Välj Bana</label>
          <div class="col-sm-5">
                      {{Form::select('id', $courses,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                       <span class="help-block">Din runda kommer att sparas som Dold, dvs att den inte kommer visas för andra eller i statistiken förren du lagt till ditt resultat.</span>

          </div>

    <label class="col-sm-1 col-sm-1 control-label">Välj typ</label>
          <div class="col-sm-5">

     {{Form::select('type', ['Singel'=>'Singel', 'Par'=>'Par'],'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
             <span class="help-block"></span>


                    </div>
      </div>

        {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

     </div>

@stop