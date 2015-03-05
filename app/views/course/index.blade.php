@extends('master')

@section('content')

         <h2 class="text-center page-header-custom">Discgolfbanor</h2>
         <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12">
    <div class="col-md-4 mb">

            <select name="" class="form-control form-1" id="form-control">
                <option class="filter" data-filter=".category-none">Välj Land</option>
                @foreach($countries as $country)
                <option class="filter" data-filter=".category-{{$country->country}}">{{$country->country}}</option>
                @endforeach
            </select>
    </div>
    <div class="col-md-4 mb">
            <select name="" class="form-control form-2" id="form-control-1">
                <option class="filter" data-filter=".category-none">Välj Landskap</option>
                @foreach($states as $state)
                <option class="filter" data-filter=".category-{{$state->state}}">{{$state->state}}</option>
                @endforeach
                </select>
    </div>
    <div class="col-md-4 mb">
            <select name="" class="form-control form-3" id="form-control-2">
                <option class="filter" data-filter=".category-none">Välj Stad</option>
                @foreach($cities as $city)
                <option class="filter" data-filter=".category-{{$city->city}}">{{$city->city}}</option>
                @endforeach
            </select>
    </div>

    </div>

    <div class="col-md-12">
        <div class="col-md-12">

    <ul class="list-inline list-unstyled" id="Container">
        @foreach($courses as $course)
        <li class="col-sm-2 text-center thread mix category-{{$course->country->country}} category-{{$course->state->state}} category-{{$course->city->city}}" data-myorder="2">

        @foreach($course->photos as $photo)
           <a href="/course/{{$course->id}}/show"><img src="{{$photo->url}}" class="img-responsive thumbnail center-block" width="100%;" min-height="60px;"/></a>
        @endforeach
           <p><a href="/course/{{$course->id}}/show">{{$course->name .', ' . $course->city->city}}</a></p>
           <small>Klubb: {{$course->club->name}}</small>
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

        $('#Container').mixItUp();

      });

      $('.form-1').on('change', function() {
          $('.form-1 option:selected').trigger('click');
      });

      $('.form-2').on('change', function() {
          $('.form-2 option:selected').trigger('click');
      });

      $('.form-3').on('change', function() {
          $('.form-3 option:selected').trigger('click');
      });

      </script>
      @stop
