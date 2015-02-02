@extends('master')

@section('content')

<h4 class="rub"><i class="fa fa-angle-right"></i> {{$course->name . ' - '}} <a href="/club/{{$club->id}}/show">{{$club->name}}</a></h4>
<div class="row">

@foreach($course->photos as $photo)

<img class="" src="{{$photo->url}}" width="100%"/>

@endforeach

          <span class="text-center span-h2 col-lg-4">{{$course->city->city . ', ' . $course->state->state}}</span>
               <span class="text-center span-h2 col-lg-4">{{'Tees: '. count($course->tee)}}</span>
               <span class="text-center span-h2 col-lg-4">{{checkFee($course->fee)}}</span>

</div>
<div class="row">
<div class="col-lg-6">
<h4 class="tab-rub"><i class="fa fa-comments"></i> Information</h4>


<p>{{$course->information}}</p>

</div>
<div class="col-lg-6">
<div class="col-lg-12">
<h4 class="tab-rub"><i class="fa fa-map-marker"></i> Location</h4>
<div id="map-canvas"></div>
</div>



</div>
</div>


<p id="long">{{$course->long}}</p>
<p id="lat">{{$course->lat}}</p>

<div class="row">
<div class="col-lg-12 main-chart">

<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#sectionA"><i class="fa fa-star-o"></i> Översikt</a></li>
    @foreach($course->tee as $tee)
<li class=""><a data-toggle="tab" href="#section{{$tee->id}}"><i class="fa fa-star-o"></i> {{$tee->color}}</a></li>
    @endforeach

</ul>
<div class="tab-content">

     <div id="sectionA" class="tab-pane fade in active">
        <br/><br/>
          <div class="row">

          <div class="col-lg-12">

          @foreach($course->tee as $tee)

                <div class="col-sm-3 col-md-3">
                    <div class="thumbnail text-center stat">
                         <i class="fa fa-tree fa-4x"></i>
                      <div class="caption text-center">

                        <h4>{{$tee->color}}</h4>

                        <p>Par: {{$tee->par}} | Antal hål: {{$tee->holes}}</p>

                      </div>
                    </div>
                  </div>
          @endforeach
                        <div class="col-sm-6 col-md-6">
                              <div class="thumbnail stat">

                                <div class="caption text-center stat">
                                    <i class="fa fa-exclamation fa-4x"></i>
                                  <h4> Banöversikt</h4>


                                  <p>Längst hål: {{convert($data['longest'])}} | Kortaste hål: {{convert($data['shortest'])}} | Medellängd: {{convert($data['avg'])}} | <span data-toggle="tooltip" data-placement="bottom" title="Visar medellängd av alla tees">Totallängd: {{convert($data['total'])}}</span></p>
                                </div>
                              </div>
                            </div>

          </div>
        </div>
     </div>

    @foreach($course->tee as $tee)

    <div id="section{{$tee->id}}" class="tab-pane fade">

<h4 class="tab-rub" id="hole-gallery-{{$tee->id}}"><i class="fa fa-tree"></i> {{$tee->color . ' tee - ' .$course->name}}</h4>
    <table class="table table-hover">
        <thead>
            <tr>
            <td>Hål</td>
            @foreach($tee->hole as $hole)
            <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery-{{$tee->id}}" data-parent="" data-footer="<a href='/hole/{{$hole->id}}/show'>Klicka här för att visa mer information</a>" data-title="{{'Basket '.$hole->number. ', '.$course->name.' - '.$tee->color.'.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
            @endforeach
            <td>Total</td>
            </tr>
        </thead>
    <tbody>
        <tr>
            <th>Par</th>
            @foreach($tee->hole as $hole)
            <td>{{$hole->par}}</td>
            @endforeach
            <td>Par: {{$course->par}}</td>
        </tr>

        <tr>
            <th>Längd</th>
            @foreach($tee->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
            <td>Längd:</td>
        </tr>
    </tbody>
    </table>
    </div>
    @endforeach
    </div>

</div></div></div>

<div class="row">
<div class="col-lg-12 main-chart">
<div class="showback">

<ul class="nav nav-tabs">
<li class="active"><a data-toggle="tab" href="#sectionD"><i class="fa fa-star-o"></i> Rundor ({{count($rounds)}})</a></li>
<li class="active"><a data-toggle="tab" href="#sectionE"><i class="fa fa-bookmark-o"></i> Recensioner ({{count($reviews)}})</a></li>
<li><a data-toggle="tab" href="#sectionF"><i class="fa fa-comments-o"></i> Kommentarer ({{count($course->comments)}})</a></li>
</ul>
<div class="tab-content">

<div id="sectionD" class="tab-pane fade in active">
<h4 class="tab-rub"><i class="fa fa-angle-right"></i> De 10 senaste rundorna spelade vid {{$course->name}}</h4>
<table class="table table-hover">
<thead>
<tr>

<th>Datum</th>
<th>Användare</th>
<th>Tee</th>
<th>Typ</th>
<th>Resultat</th>

</tr>

</thead>
<tbody>
@foreach($rounds as $round)
<tr>
<td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
@if($round->type == 'Singel')
<td><a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a></td>
@else
<td>{{showPar($round->par_id, $round->user_id)}}</td>
@endif
<td>{{$round->tee['color']}}</td>
<td>{{$round->type}}</td>
<td>{{calcScore($round->total, $tee->par)}}</td>
</tr>
@endforeach
</tbody>
</table>

<a href="/course/{{$course->id}}/rounds" class="btn btn-primary btn-sm">Visa alla rundor</a>

</div>


<div id="sectionE" class="tab-pane fade">

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



<div id="sectionF" class="tab-pane fade">
     <h4 class="tab-rub"><i class="fa fa-angle-right"></i> Join the discussion!
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

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

@stop


@stop