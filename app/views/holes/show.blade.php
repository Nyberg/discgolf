@extends('master')

@section('content')

  <div class="row">
    <div class="col-lg-8">
    <h4><i class="fa fa-angle-right"></i> Hole {{$hole->number}}</h4><br/>
    <h5>Length: {{convert($hole->length)}}</h5>
    <h5>Par: {{$hole->par}}</h5>
    <br/><br/>

     <h5><i class="fa fa-angle-right"></i> Ob Rules</h5><br/>


    </div>
    <div class="col-lg-4">

    <img src="{{$hole->image}}" class="" width="100%">
    </div>
  </div>

@stop