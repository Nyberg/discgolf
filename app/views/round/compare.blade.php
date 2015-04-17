@extends('master')
@section('content')

    <h2 class="text-center">Din rundpool</h2>
    <p class="text-center">I rundpoolen kan du lägga in rundor. Hur många du vill, vilken bana du vill och från vilken spelare du vill. Klicka bara på knappen <span class="btn btn-primary btn-xs">"Lägg till i rundpool"</span> när du besöker en runda så sparas den undan åt dig. Du hittar enkelt hit genom att klicka på ikonen i menyn.</p>
    <hr class="divider"/>

    @foreach($courses as $course)
    <h4 class="text-center">{{$course->course->name . ' - ' . $course->color}}</h4>
         <div class="panel panel-default">
           <!-- Default panel contents -->
           <div class="panel-heading">
           {{$course->course->name . ' - ' . $course->color}}
           </div>
    <table class="table table-hover text-center hidden-phone hidden-tablet">
    <thead>
        <tr>
            <td>Spelare</td>
            <td>Resultat</td>
            @foreach($course->hole as $hole)
                 <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery" data-parent="" data-footer="" data-title="{{'Hål '.$hole->number. ', '.$course->name.' - ' . $course->color . '.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
            @endforeach
            <td><i class="fa fa-trash"></i></td>
        </tr>
    </thead>
    <tbody>

            @foreach($compare->items as $item)
                @if($item->round->tee_id == $course->id)
            <tr>
            <td><a href="/user/{{$item->round->user_id}}/show">{{$item->round->username}}</a></td>
            <td><a href="/round/{{$item->round_id}}/course/{{$course->course_id}}">{{calcScore($item->round->total, $course->par)}}</a></td>
                @foreach($item->round->score as $score)
                    <td class="{{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
                @endforeach
                <td><a href="/account/user/{{Auth::id()}}/remove/{{$item->id}}/compare"><i class="fa fa-times"></i></a></td>

                @else
                @endif
            </tr>
            @endforeach

        <tr>
            <td>Längd</td>
            <td>-</td>
            @foreach($course->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
        </tr>
    </tbody>
    </table>
    </div>
    @endforeach

    <a href="/account/clear/pool" class="btn btn-sm btn-warning">Rensa rundpool</a>
@stop

@section('scripts')

@stop
