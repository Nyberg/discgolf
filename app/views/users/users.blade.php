@extends('master')


@section('content')

      <h4 class="mb"><i class="fa fa-angle-right"></i> Användare</h4>

<div class="row">

    <div class="col-md-12">

    <div class="col-md-12" id="Container">
        @foreach($users as $user)
        <div class="col-sm-2 text-center thread mix">
           <img src="{{$user->image}}" class="img-responsive thumbnail center-block" width="100px"/>
           <p><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></p>
           <small>Klubb: <a href="/club/{{$user->club_id}}/show">{{$user->club->name}}</a></small>
        </div>
        @endforeach
    </div>

</div>

      @section('scripts')
      <script>
      $(function(){

      	// Instantiate MixItUp:

      	$('#Container').mixItUp();

      });
      </script>
      @stop

@stop