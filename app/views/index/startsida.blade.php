
@extends('startpage')

@section('content')

<div class="row-fluid">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->

  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  </ol>
  <div class="carousel-inner">
    <div class="item active"> <img src="{{asset(Dg)}}" style="width:100%" alt="First slide">
      <div class="container">
        <div class="carousel-caption">
          <h1>Penguin Project</h1>
          <p>Aenean a rutrum nulla. Vestibulum a arcu at nisi tristique pretium.</p>
          <p><a class="btn btn-lg btn-primary" href="/registration" role="button">Bli medlem idag!</a></p>
        </div>
      </div>
    </div>

  </div>
  <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div>
</div>

<div class="col-md-12 mb"></div>

@stop