@extends('master')

@section('content')

<h4 class="mb"><i class="fa fa-angle-right"></i> {{$course->name . ' - '}} <a href="/club/{{$club->id}}/show">{{$club->name}}</a></h4>
<div class="row">

@foreach($course->photos as $photo)

<img class="" src="{{$photo->url}}" width="100%"/>

@endforeach
<span class="span-h2 col-lg-3">{{$course->city . ', ' . $course->state}}</span><span class="span-h2 col-lg-2">{{'Baskets: '. $course->holes}}</span>
<span class="span-h2 col-lg-2">{{'Par: ' . $course->par}}</span><span class="span-h2 col-lg-3">{{'Course Record: '.calcRecord($rec, $course->par)}}</span>
<span class="span-h2 col-lg-2">{{checkFee($course->fee)}}</span>
</div>
<br/><br/>

<div class="row">
<div class="col-lg-6">
<h4><i class="fa fa-comments"></i> Information</h4><br/>


<p>{{$course->information}}</p>
<br/><br/>

<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
Bankarta
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Bankarta - {{$course->name}}</h4>
      </div>

      <div class="modal-body">
        <img src="{{$course->course_map}}" width="100%"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

      </div>
    </div>
  </div>
</div>
</div>
<div class="col-lg-6">
<h4><i class="fa fa-map-marker"></i> Location</h4><br/>
<div id="map-canvas"></div>
</div>
</div>

<p id="long">{{$course->long}}</p>
<p id="lat">{{$course->lat}}</p>
<br/>

<div class="row">
<div class="col-lg-12 main-chart">

</div>
</div>

<div class="row">
<div class="col-lg-12 main-chart">

<h4 id="hole-gallery"><i class="fa fa-tree"></i> Banöversikt</h4><hr>
    <table class="table table-hover">
        <thead>
            <tr>
            <th>Hål</th>
            @foreach($course->hole as $hole)
            <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery" data-parent="" data-footer="<a href='/hole/{{$hole->id}}/show'>Klicka här för att visa mer information</a>" data-title="{{'Basket '.$hole->number. ', '.$course->name.'.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
            @endforeach
            <td>Total</td>
            </tr>
        </thead>
    <tbody>
        <tr>
            <th>Par</th>
            @foreach($course->hole as $hole)
            <td>{{$hole->par}}</td>
            @endforeach
            <td>Par: {{$course->par}}</td>
        </tr>

        <tr>
            <th>Längd</th>
            @foreach($course->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
            <td>Längd: {{calcLength($sum)}}</td>
        </tr>
    </tbody>
    </table>

</div></div></div>

<div class="row">
<div class="col-lg-12 main-chart">
<div class="showback">

<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#sectionA"><i class="fa fa-star-o"></i> Rundor ({{count($rounds)}})</a></li>
<li class="active"><a data-toggle="tab" href="#sectionB"><i class="fa fa-bookmark-o"></i> Recensioner ({{count($reviews)}})</a></li>
<li><a data-toggle="tab" href="#sectionC"><i class="fa fa-comments-o"></i> Kommentarer ({{count($course->comments)}})</a></li>
</ul>
<div class="tab-content">

<div id="sectionA" class="tab-pane fade in active">
<br/>
<h4><i class="fa fa-angle-right"></i> Alla rundor spelade vid {{$course->name}}</h4><hr>
<table class="table table-hover">
<thead>
<tr>

<th>Datum</th>
<th>Användare</th>

<th>Bana</th>

<th>Resultat</th>

</tr>

</thead>
<tbody>
@foreach($rounds as $round)
<tr>
<td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
<td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
<td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>

<td>{{calcScore($round->total, $course->par)}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>


<div id="sectionB" class="tab-pane fade">

<div class="row">

    @foreach($reviews as $rev)

    <br/>

    <div class="col-lg-12">

     <div class="col-lg-12 well well-sm" data-toggle="collapse" href="#collapseExample{{$rev->id}}" aria-expanded="false" aria-controls="collapseExample">
        <div class="col-lg-1">
            <img src="{{getUserImage($rev->user_id)}}" class="img-circle pull-left" width="60px">
        </div>

        <div class="col-lg-11">
        <h4>{{$rev->head}} <small> skriven av <a href="/user/{{$rev->user_id}}/show">{{getUser($rev->user_id)}}</a> {{$rev->created_at->format('Y-m-d')}}</small></h4>
            <small> Betyg: {{$rev->rating}}</small>

            <div class="collapse" id="collapseExample{{$rev->id}}">
                <p>{{$rev->body}}</p>
            </div>
        </div>
    </div>
    </div>
    @endforeach

</div>

</div>



<div id="sectionC" class="tab-pane fade">
<br/>

     <h4 class="mb"> Join the discussion!
        @if(Auth::user())
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#comment">
        Kommentera
        </button>
        @endif
     </h4>

     <div class="row">
       <div class="col-lg-12">

@foreach($course->comments as $comment)
@include('layouts/include/comment')
@endforeach

</div></div>

            <!-- Modal window Comment -->
            <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Kommentera</h4>
                  </div>

                  <div class="modal-body">
                  {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
                    {{Form::hidden('type_id', $course->id)}}
                    {{Form::hidden('model', 'course')}}
                   <div class="form-group">
                         <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                         <div class="col-sm-10">

                             {{Form::text('body', '', ['class'=>'form-control'])}}
                         </div>
                     </div>

                  <div class="modal-footer">
                      {{Form::submit('Save Comment', ['class'=>'btn btn-primary'])}}
                          {{Form::close()}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

                 </div>
               </div>
            </div>
            <!-- Slut modal window Comment -->



</div></div><!-- --/content-panel ---->
</div><!-- --/content-panel ---->


@section('scripts')

    <script>

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

    </script>

@stop


@stop