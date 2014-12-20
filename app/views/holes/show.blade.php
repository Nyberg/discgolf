@extends('master')

@section('content')

  <div class="row">
    <div class="col-lg-8">
    <h4><i class="fa fa-angle-right"></i> Hole {{$hole->number}}</h4><br/>
    <h5>Length: {{convert($hole->length)}}</h5>
    <h5>Par: {{$hole->par}}</h5>
    <h6 id="score">3</h6>

    <br/><br/>

     <h5><i class="fa fa-angle-right"></i> Ob Rules</h5><br/>


    </div>
    <div class="col-lg-4">
    <a href="/img/dg/test.gif" data-lightbox="image-1" data-title="Basket {{$hole->number}}">
    <img src="/img/dg/test.gif" class="" width="100%">
    </a>
    </div>
  </div>

@stop