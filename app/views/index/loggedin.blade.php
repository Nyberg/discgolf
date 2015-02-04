@extends('master')

@section('content')

<div class="row">
  <div class="col-lg-12">
  {{Form::open(['route' => 'searchresult', 'method' => 'GET', 'class' => ''])}}
    <div class="input-group">
      <input type="text" class="form-control"  name="auto" id="auto" placeholder="Sök banor efter namn..">
            <span class="input-group-btn">
              {{Form::button('<i class="fa fa-search"></i>', ['type'=>'submit', 'class' => 'btn btn-default'])}}
            </span>
    </div><!-- /input-group -->
       {{Form::close()}}
  </div><!-- /.col-lg-6 -->
  </div>

<br/>
  <div class="row">


    </div>

@stop