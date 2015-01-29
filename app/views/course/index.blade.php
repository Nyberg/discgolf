@extends('master')

@section('content')

         <h4><i class="fa fa-angle-right"></i> Banor</h4>

<div class="row">

    <div class="col-md-12">
    <div class="btn-group mb" role="group" aria-label="...">
               <select name="" class="form-control" id="">
                    <option class="filter" data-filter=".category-none">Välj Land</option>
                    @foreach($countries as $country)
                    <option class="filter" data-filter=".category-{{$country->country}}">{{$country->country}}</option>
                    @endforeach

                    </select>
            <select name="" class="form-control" id="">
                                <option class="filter" data-filter=".category-none">Välj Landskap</option>
                                @foreach($states as $state)
                                <option class="filter" data-filter=".category-{{$state->state}}">{{$state->state}}</option>
                                @endforeach

                                </select>

                                <select name="" class="form-control" id="">
                                                        <option class="filter" data-filter=".category-none">Välj Stad</option>
                                                        @foreach($cities as $city)
                                                        <option class="filter" data-filter=".category-{{$city->city}}">{{$city->city}}</option>
                                                        @endforeach

                                                        </select>
                </div>

    </div>

    <div class="col-md-12">

    <ul class="list-inline list-unstyled" id="Container">
        @foreach($courses as $course)
        <li class="col-sm-2 text-center thread mix category-{{$course->country->country}} category-{{$course->state->state}} category-{{$course->city->city}}" data-myorder="2">

        @foreach($course->photos as $photo)
           <a href="/club/{{$course->id}}/show"><img src="{{$photo->url}}"  class="img-responsive thumbnail center-block"/></a>
        @endforeach
           <p><a href="/club/{{$course->id}}/show">{{$course->name}}</a></p>
           <small>Klubb: <a href="/club/{{$course->club->id}}/show">{{$course->club->name}}</a></small>
        </li>
        @endforeach
    </ul>

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
