@extends('master')


@section('content')

              <h2 class="text-center page-header-custom">Rundor</h2>
              <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12">

    <div class="col-md-12" id="Container">
        @foreach($rounds as $round)
        <div class="col-sm-2 text-center thread mix">
           <a href="/round/{{$round->id}}/course/{{$round->course_id}}/">
           @foreach($round->course->photos as $photo)
           <img src="{{$photo->url}}" class="img-responsive thumbnail center-block" width="100%"/>
           @endforeach</a>
           <p><a href="/round/{{$round->id}}/course/{{$round->course_id}}/">{{$round->course->name .' - '. $round->tee->color . ' av ' . $round->user->first_name . ' ' . $round->user->last_name}}</a></p>
        <p><a href="/round/{{$round->id}}/course/{{$round->course_id}}">Score: {{calcScore($round->total, $round->tee->par)}}</a></p>

        </div>
        @endforeach
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