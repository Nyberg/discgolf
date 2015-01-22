@extends('master')

@section('content')

  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Round</h4>
   {{Form::open(['method'=>'POST', 'route'=>['account-round-add-score'], 'class'=>'form-horizontal style-form'])}}

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Pick Course</label>
          <div class="col-sm-10">

            {{Form::select('id', $courses,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
             <span class="help-block">Din runda kommer att sparas som Dold, dvs att den inte kommer visas för andra eller i statistiken förren du lagt till ditt resultat.</span>

          </div>
      </div>

        {{Form::submit('Next', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

@stop