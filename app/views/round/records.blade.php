@extends('master')
@section('content')

    <div class="row">
        <div class="col-md-12">
              <h1 class="text-center">Rekordrundor</h1>
                <br/>

                @foreach($records as $round)
                @if($round->status == 1)
                <a href="/round/{{$round->round_id}}/course/{{$round->course_id}}">
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
                @else
                @endif

                @endforeach

        </div>
    </div>

        <div class="row">
            <div class="col-md-12">
                  <h1 class="text-center">Gamla Rekordrundor</h1>
                    <br/>

                    @foreach($records as $round)
                    @if($round->status == 0)
                    <a href="/round/{{$round->round_id}}/course/{{$round->course_id}}">
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
                    @else
                    @endif

                    @endforeach

            </div>
        </div>

@stop