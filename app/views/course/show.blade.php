@extends('master')

@section('content')

<h4 class="tab-rub text-center page-header-custom">{{$course->name . ' - '}} <a href="/club/{{$club->id}}/show">{{$club->name}}</a></h4>
     <div class="divider-header"></div>

<div class="row">

@foreach($course->photos as $photo)

<img class="" src="{{$photo->url}}" width="100%"/>

@endforeach

    <span class="hidden-phone">
        <span class="text-center span-h2 col-md-4">{{$course->city->city . ', ' . $course->state->state}}</span>
        <span class="text-center span-h2 col-md-4">{{'Tees: '. count($course->tee)}}</span>
        <span class="text-center span-h2 col-md-4">{{checkFee($course->fee)}}</span>
    </span>

</div>
<div class="row">
<br/>
<div class="col-md-6">
<h4 class="tab-rub text-center page-header-custom">Information</h4>

    <div class="divider-header"></div>

    <div class="col-sm-12">

    <p class="margin-left">{{$course->information}}</p>
    <hr class="divider"/>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
      Visa väder i {{$course->city->city}}
    </button>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bankarta">
      Visa bankarta
    </button>

    </div>

</div>
<div class="col-md-6">
<div class="col-md-12">
<h4 class="tab-rub text-center page-header-custom">Hitta hit</h4>
     <div class="divider-header"></div>
<div id="map-canvas"></div>
</div>

</div>
</div>

<p id="long">{{$course->long}}</p>
<p id="lat">{{$course->lat}}</p>

<div class="row">
<div class="col-lg-12 main-chart">

    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#sectionA">Översikt</a></li>
            @foreach($course->tee as $tee)
        <li class="hidden-phone"><a data-toggle="tab" href="#section{{$tee->id}}">{{$tee->color}} Tee</a></li>
            @endforeach
        <li class="hidden-phone"><a data-toggle="tab" href="#sectionX">Rekordrundor</a></li>
        <li class="hidden-phone"><a data-toggle="tab" href="#sectionY">Aces</a></li>
    </ul>

<div class="tab-content">

     <div id="sectionA" class="tab-pane fade in active">
        <br/><br/>
          <div class="row">

          @foreach($course->tee as $tee)

            @if(count($course->tee) == 1)
            <div class="col-sm-6 col-md-6">
            @elseif(count($course->tee) == 2)
            <div class="col-sm-6 col-md-6">
            @elseif(count($course->tee) == 3)
            <div class="col-sm-4 col-md-4">
            @else
            <div class="col-sm-3 col-md-3">
            @endif
                <div class="thumbnail">
                 <div class="caption text-center">
                     <i class="fa fa-tree fa-4x"></i>
                    <h4 class="">{{$tee->color}}</h4>
                    <p class="">Par: {{$tee->par}} | Antal hål: {{$tee->holes}}</p>
                  <p class="">Längst hål: {{convert($data[$tee->id]['longest'])}} | Kortaste hål: {{convert($data[$tee->id]['shortest'])}} | Medellängd: {{convert($data[$tee->id]['avg'])}} | Totallängd: {{convert($data[$tee->id]['total'])}}</p>

                  </div>
                </div>
              </div>
          @endforeach
          </div>

     </div>

    @foreach($course->tee as $tee)

    <div id="section{{$tee->id}}" class="tab-pane fade">

<h4 class="tab-rub text-center page-header-custom" id="hole-gallery-{{$tee->id}}">{{$tee->color . ' tee - ' .$course->name}}</h4>
<p class="text-center">Klicka på varje korgs nummer för att se en bild på banan. Hoovra över banans par för att se snittresultat för varje hål.</p>
     <div class="divider-header"></div>

    <table class="table table-hover">
        <thead>
            <tr>
            <td>Hål</td>
            @foreach($tee->hole as $hole)
            <td><a href="{{$hole->image}}" class="item" data-toggle="lightbox" data-gallery="hole-gallery-{{$tee->id}}" data-parent="" data-footer="<a href='/hole/{{$hole->id}}/show'>Klicka här för att visa mer information</a>" data-title="{{'Korg '.$hole->number. '. Längd ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
            @endforeach
            <td>Total</td>
            </tr>
        </thead>
    <tbody>
        <tr>
            <td>Par</td>
            @foreach($tee->hole as $hole)
            <td><span data-toggle="tooltip" data-placement="top" title="Snittresultat: {{$avg[$tee->id][$hole->number]}}"> {{$hole->par}}</span></td>
            @endforeach
            <td>Par: {{$tee->par}}</td>
        </tr>

        <tr>
            <td>Längd</td>
            @foreach($tee->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
            <td></td>
        </tr>
    </tbody>
    </table>
    </div>
    @endforeach


      <div id="sectionX" class="tab-pane fade">


<h4 class="tab-rub text-center page-header-custom">Rekordrundor {{$course->name}}</h4>
     <div class="divider-header"></div>
     @if(count($records) == 0 || count($records) == null)
     @else
       @foreach($records as $rec)
           <div class="panel panel-default">
               <div class="panel-heading"><a href="/round/{{$rec->round_id}}/course/{{$rec->course_id}}">{{$rec->round->type}} | Resultat: {{calcScore($rec->round->total, $rec->tee->par)}}</a>

                          @if($rec->type == 'Singel' || $rec->type == 'Group')
                              av <a href="/user/{{$rec->user_id}}/show">{{$rec->user->first_name . ' ' . $rec->user->last_name}}</a>
                          @else
                              av {{showPar($rec->type_id, $rec->user_id)}}
                          @endif</div>

          <table class="table table-hover">
              <thead>
                <tr>
                    <td>{{$rec->tee->color}} | Hål</td>
                    @foreach($rec->tee->hole as $hole)
                 <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery-{{$tee->id}}" data-parent="" data-footer="<a href='/hole/{{$hole->id}}/show'>Klicka här för att visa mer information</a>" data-title="{{'Basket '.$hole->number. '<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>

                    @endforeach
                </tr>

            </thead>
        <tbody>

                <tr>
                    <td>Resultat/Par</td>
                    @foreach($rec->round->score as $score)
                    <td class="text-center {{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
                    @endforeach
                </tr>

                <tr>
                    <td>Längd</td>
                    @foreach($rec->tee->hole as $hole)
                    <td class="text-center">{{convert($hole->length)}}</td>
                    @endforeach
                </tr>
      </tbody>
      </table>
    </div>
       @endforeach
       @endif

      </div>

<div id="sectionY" class="tab-pane fade">

     <h4 class="tab-rub text-center page-header-custom">Aces {{$course->name}}</h4>
     <div class="divider-header"></div>
    <div class="col-md-12">

    @if(count($aces) == 0)
    <p class="text-center">Inga aces ännu!</p>
    @else

     @foreach($aces as $ace)
                <div class="col-sm-3 col-md-3">
                      <div class="thumbnail">
                        <div class="caption text-center">
                            <i class="fa fa-trophy fa-4x red"></i>
                            <h5 class="">
                                {{$ace->user->first_name . ' ' . $ace->user->last_name}}
                            </h5>
                           <p>{{$ace->round->tee->color . ' - hål ' . $ace->hole->number}}</p>
                           <p>{{$ace->round->date}}</p>
                       </div>
                      </div>
                </div>
     @endforeach
     @endif
          </div>

</div>

    </div>

</div></div></div>


<!-- Nav-pills -->
<div class="showback hidden-phone">
<div class="row">

    <div class="col-md-12">
        <div class="row">

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <ul class="nav nav-pills nav-justified">
              <li class="active" id="menu_item"><a data-toggle="tab" href="#sectionA">Statistik</a></li>
              <li id="menu_item_2"></li>
            </ul>
        </div>
    </div>

</div>

<div id="sectionA" class="tab-pane fade in active">

    <div class="row">
       <div id="chart-round-avg" style="min-width: 310px; height: 400px; width: 100%; margin: 0 auto"></div>
        <input hidden="id" id="id" value="{{$course->id}}"/>
        <input hidden="model" id="model" value="course"/>
    </div>
    <div class="row">
    <!-- Sidomeny -->
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-4">
            <div class="row">
            {{Form::open(['method' => 'POST','route' => ['course.rounds'],'class' => 'form-inline', 'id' => 'month'])}}
            {{Form::hidden('id', $course->id, ['id'=>'id'])}}
            {{Form::hidden('model', 'course', ['id'=>'model'])}}
            {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
            {{Form::submit('Rundor', ['class' => 'btn btn-red btn-sm btn-block'])}}
            {{Form::close()}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
            {{Form::open(['method' => 'POST','route' => ['course.stats'],'class' => 'form-inline', 'id' => 'round_avg'])}}
            {{Form::hidden('id', $course->id, ['id'=>'id'])}}
            {{Form::hidden('model', 'course', ['id'=>'model'])}}
            {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
            {{Form::submit('Senaste resultaten', ['class' => 'btn btn-red btn-sm btn-block'])}}
            {{Form::close()}}
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                {{Form::open(['method' => 'POST','route' => ['hole.stats'],'class' => 'form-inline', 'id' => 'user_stat'])}}
                {{Form::hidden('id', $course->id, ['id'=>'id'])}}
                {{Form::hidden('model', 'course', ['id'=>'model'])}}
                {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
                {{Form::submit('Visa hålresultat', ['class' => 'btn btn-red btn-sm btn-block'])}}
                {{Form::close()}}
            </div>
        </div>

        </div>
    </div>
    <!-- Slut sidomeny -->
    </div>


</div>
</div>

<div class="row">
<div class="col-lg-12 main-chart">
<div class="showback">

<ul class="nav nav-tabs nav-justified">
<li class="active"><a data-toggle="tab" href="#sectionD">Rundor ({{count($rounds)}})</a></li>
<li class="active"><a data-toggle="tab" href="#sectionE">Recensioner ({{count($reviews)}})</a></li>
<li><a data-toggle="tab" href="#sectionF">Kommentarer ({{count($course->comments)}})</a></li>
</ul>
<div class="tab-content">

<div id="sectionD" class="tab-pane fade in active">
    <br/>
    <div class="panel panel-default">
                    <div class="panel-heading">De 10 senaste rundorna spelade vid {{$course->name}}</div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Användare</th>
                    <th class="hidden-phone">Tee</th>
                    <th class="hidden-phone">Typ</th>
                    <th>Resultat</th>
                </tr>

            </thead>
            <tbody>
                @foreach($rounds as $round)
                <tr>
                    <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
                    @if($round->type == 'Singel' || $round->type == 'Group')
                    <td><a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a></td>
                    @else
                    <td>{{showPar($round->type_id, $round->user_id)}}</td>
                    @endif
                    <td class="hidden-phone">{{$round->tee['color']}}</td>
                    <td class="hidden-phone">{{$round->type}}</td>
                    <td>{{calcScore($round->total, $round->tee->par)}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <a href="/course/{{$course->id}}/rounds" class="btn btn-primary btn-sm">Visa alla rundor</a>

</div>


<div id="sectionE" class="tab-pane fade">

<div class="row">

    <br/>
        <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Recensioner ({{count($reviews)}})</div>
        </div>

    @if(count($reviews) == 0)
    <div class="col-lg-12">
    <p>Inga skrivna recensioner.</p>
    </div>
    @else
    @foreach($reviews as $rev)

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
    @endif
    </div>

</div>

</div>



<div id="sectionF" class="tab-pane fade">
            <br/>
              <div class="panel panel-default">
                <div class="panel-heading">Kommentarer ({{count($course->comments)}})
                     @if(Auth::user())
                        <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#comment">Kommentera</a>
                     @endif
                </div>
             </div>
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
                  {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form','id'=>'comment_form'])}}
                    {{Form::hidden('type_id', $course->id)}}
                    {{Form::hidden('model', 'course')}}
                   <div class="form-group">
                         <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                         <div class="col-sm-10">

                             {{Form::text('body', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Väder i {{$course->city->city}}</h4>
      </div>
      <div class="modal-body text-center">
      <script src="http://www.yr.no/sted/{{$course->country->country}}/{{$course->state->state}}/{{$course->city->city}}/ekstern_boks_tre_dager.js"></script><noscript><a href="http://www.yr.no/sted/{{$course->country->country}}/{{$course->state->state}}/{{$course->city->city}}/">yr.no: Værvarsel for Örebro</a></noscript>
        <span class=""><script src="http://www.yr.no/sted/{{$course->country->country}}/{{$course->state->state}}/{{$course->city->city}}/ekstern_boks_time_for_time.js"></script><noscript><a href="http://www.yr.no/sted/{{$course->country->country}}/{{$course->state->state}}/{{$course->city->city}}/">yr.no: Værvarsel for Örebro</a></noscript>
        </span>
     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bankarta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bankarta {{$course->name}}</h4>
      </div>
      <div class="modal-body text-center">
      @if($course->course_map == null)
      <p>Ingen bankarta finns tillgänglig</p>
      @else
     <img src="{{$course->course_map}}" width="100%"/>
      @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>
      </div>
    </div>
  </div>
</div>


@section('scripts')

{{HTML::script('admin_js/stats/stats.js')}}
<script src="http://code.highcharts.com/highcharts.js"></script>

    <script>

    jQuery(document).ready(function($) {


        getUserRounds();

            $('#round_avg').submit(getRoundAvg);
            $('#month').submit(getUserRoundsReload);
            $('#user_stat').submit(getUserPie);

        });
</script>
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