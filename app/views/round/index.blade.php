@extends('master')
@section('content')

    <div class="row">
        <div class="col-md-12">
              <h1 class="text-center">Rundor</h1>
                <br/>

                @foreach($rounds as $round)

                <a href="/round/{{$round->id}}/course/{{$round->course_id}}">
                    <div class="col-sm-3 col-md-3">
                          <div class="thumbnail">
                            <div class="caption text-center">
                                <h1 class="green">{{calcScore($round->total, $round->tee->par)}}</h1>
                                <h4 class="">
                                    {{$round->course->name . ' - ' . $round->tee->color}}
                                </h4>
                                <p>{{$round->created_at->format('Y-m-d') . ' av ' . $round->user->first_name . ' ' . $round->user->last_name}}</p>
                           </div>
                          </div>
                    </div>
                </a>

                @endforeach

            </div>

        </div>

<div class="row">
    <div class="col-sm-12 text-center">
    {{$rounds->links()}}
    </div>
</div>

@stop