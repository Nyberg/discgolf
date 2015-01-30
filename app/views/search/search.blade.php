@extends('master')


@section('content')

<div class="row">
  <div class="col-lg-12 mb">
    {{Form::open(['route' => 'searchresult', 'method' => 'GET', 'class' => ''])}}
    <div class="input-group">
            <input type="text" class="form-control"  name="auto" id="auto" placeholder="Sök banor..">
            <span class="input-group-btn">
              {{Form::button('<i class="fa fa-search"></i>', ['type'=>'submit', 'class' => 'btn btn-default'])}}
            </span>
    </div><!-- /input-group -->
    {{Form::close()}}
    </div><!-- /.col-lg-6 -->
  </div>


<div class="row">

      <div class="col-md-12 ">

               <h2 class="text-center page-header-custom">Ditt sökresultat gav {{$num}} träffar</h2>
               <div class="divider-header"></div>

          <div class="col-md-12">

      <ul class="list-inline list-unstyled" id="Container">
          @foreach($courses as $course)
          <li class="col-sm-2 text-center thread mix category-{{$course->country->country}} category-{{$course->state->state}} category-{{$course->city->city}}" data-myorder="2">

          @foreach($course->photos as $photo)
             <a href="/club/{{$course->id}}/show"><img src="{{$photo->url}}" class="img-responsive thumbnail center-block" width="100%;" min-height="60px;"/></a>
          @endforeach
             <p><a href="/club/{{$course->id}}/show">{{$course->name .', ' . $course->city->city}}</a></p>
             <small>Klubb: <a href="/club/{{$course->club->id}}/show">{{$course->club->name}}</a></small>
          </li>
          @endforeach
      </ul>
      </div>
  </div>
</div>
@stop


      @section('scripts')
      <script>
      $(function(){

      	// Instantiate MixItUp:

      	$('#Container').mixItUp();

      });
      </script>
      @stop
