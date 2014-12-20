    @extends('master')


    @section('content')


    <h4 class="mb"><i class="fa fa-angle-right"></i> {{$course->name}}, {{$round->created_at->format('Y-m-d')}} by {{$round->user}} </h4>
    <div class="row">
                     <img class="" src="{{$course->image}}" width="100%"/>
                           <span class="span-h2 col-lg-3">{{$course->city . ', ' . $course->state}}</span><span class="span-h2 col-lg-2">{{'Baskets: '. $course->holes}}</span>
                           <span class="span-h2 col-lg-2">{{'Par: ' . $course->par}}</span><span class="span-h2 col-lg-3">{{'Course Record: '.$record->total}}</span>
                           <span class="span-h2 col-lg-2">{{checkFee($course->fee)}}</span>
                       </div>

                       <br/><br/>

    <h4><i class="fa fa-angle-right"></i> Score:</h4><hr>
    <table class="table table-hover text-center">
    <thead>
    <tr>
    <th>Hole</th>
    @foreach($course->hole as $hole)
    <td><a href="/hole/{{$hole->id}}/score/{{$round->id}}">{{$hole->number}}</a></td>
    @endforeach
    </tr>

    </thead>
    <tbody>
    <tr>
    <th>Score/Par</th>

    @foreach($round->score as $score)

    <td class="{{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
    @endforeach


    </tr>
    <tr>
    <th>Length</th>
    @foreach($course->hole as $hole)
    <td>{{convert($hole->length)}}</td>
    @endforeach
    <td></td>


    </tr>
    </tbody>
    </table>

    @stop