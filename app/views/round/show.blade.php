@extends('master')
@section('content')

  <h2 class="text-center page-header-custom"><a href="/course/{{$course->id}}/show">{{$course->name . ' - ' . $tee->color}}</a>, {{$round->date}} av
      @if($round->type == 'Par')
        <td>{{showPar($round->type_id, $round->user_id)}}</td>
      @else
      <a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a>
      @endif
  </h2>

    <div class="row">
        @foreach($course->photos as $photo)
            <img class="" src="{{$photo->url}}" width="100%"/>
        @endforeach

        <div class="hidden-phone">
           <span class="text-center span-h2 col-lg-3">{{$course->city->city . ', ' . $course->state->state}}</span>
           <span class="text-center span-h2 col-lg-2">{{'Hål: '. $tee->holes}}</span>
           <span class="text-center span-h2 col-lg-2">{{'Par:'}} <span id="par">{{$tee->par}}</span></span>
           <span class="text-center span-h2 col-lg-3">
           Bästa resultat:
           @foreach($records as $record)

           {{calcRecord($record->total, $tee->par, $record->id, $record->course_id)}}
           @endforeach
           </span>
           <span class="text-center span-h2 col-lg-2">{{checkFee($course->fee)}}</span>
        </div>
    </div>

       <div class="row">
        <br/>
            <div class="col-sm-8">
              @if($round->comment == null)
                <blockquote>
                  <p class="">Ingen kommentar skriven.</p>
                </blockquote>

            @else
                <blockquote>
                  <p class="">{{$round->comment}}</p>
                </blockquote>
            @endif

            </div>
            <div class="col-sm-2 text-center weather-icon" data-toggle="tooltip" data-placement="top" title="Klicka på ikonen för att se andra rundor med samma väder.">
            <a href="/rounds/weather/{{$round->weather_id}}/show">
                <img src="{{$round->weather->image}}" class="" width="64px"/>
                <p class="">{{$round->weather->name}}</p>
            </a>
            </div>
            <div class="col-sm-2 text-center weather-icon">
                <img src="/img/weather/flag.png" class="" width="64px"/>
                <p>{{$round->wind->name}}</p>
            </div>
       </div>


         <div class="panel panel-default">
           <!-- Default panel contents -->
           <div class="panel-heading">

           <span id="compare_result">Resultat: {{calcScore($round->total, $round->tee->par)}}</span>
            <div class="fb-like pull-right" data-href="{{Route::current()->getName()}}" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>

           </div>
    <table class="table table-hover text-center hidden-phone hidden-tablet">
    <thead>
        <tr>
            <td>Hål</td>
            @foreach($tee->hole as $hole)
                 <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery" data-parent="" data-footer="" data-title="{{'Hål '.$hole->number. ', '.$course->name.' - ' . $tee->color . '.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
            @endforeach
        </tr>
    </thead>
    <tbody>
            <tr>
            <td>Resultat/Par</td>
            @foreach($round->score as $score)
            <td class="{{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
            @endforeach
            </tr>
        <tr id="compare_round_1"></tr>
        <tr id="compare_round_2"></tr>
        <tr id="compare_round_3"></tr>
        <tr id="compare_round_4"></tr>
        <tr id="compare_round_5"></tr>
        <tr id="compare_round_6"></tr>
        <tr id="compare_round_7"></tr>
        <tr id="compare_round_8"></tr>
        <tr id="compare_round_9"></tr>
        <tr id="compare_round_10"></tr>

         <tr id="group_round_1"></tr>
         <tr id="group_round_2"></tr>
         <tr id="group_round_3"></tr>
         <tr id="group_round_4"></tr>
         <tr id="group_round_5"></tr>
         <tr id="group_round_6"></tr>
         <tr id="group_round_7"></tr>
         <tr id="group_round_8"></tr>

        <tr>
            <td>Längd</td>
            @foreach($tee->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
        </tr>
    </tbody>
    </table>
    </div>

   <span class="input-group-sm hidden-phone">
       <div class="row">
       @if(Auth::check())
       <div class="col-sm-4">
            {{Form::open(['method' => 'POST','route' => ['add-to-compare'], 'id'=>'add_to_compare'])}}
            {{Form::hidden('round_id', $round->id, ['id'=>'round_id'])}}
            {{Form::submit('Lägg till i rundpool', ['class' => 'btn btn-primary btn-sm btn-block', 'id'=>'add_to_compare_btn'])}}
            {{Form::close()}}
       </div>
       @else
       @endif
       @if($round->type == 'Group')

           <div class="col-sm-4">
                {{Form::open(['method' => 'POST','route' => ['group.rounds'], 'id'=>'group_form'])}}
                {{Form::hidden('id', $round->group_id, ['id'=>'group_id'])}}
                {{Form::hidden('round_id', $round->id, ['id'=>'round_id'])}}
                {{Form::submit('Visa Grupprundor', ['class' => 'btn btn-primary btn-sm btn-block', 'id'=>'submit_gr'])}}
                {{Form::close()}}
           </div>
       @else
       @endif
       @if(Auth::check() && count($u_rounds) >= 1)
       <div class="col-sm-4">
          <button type="button" class="btn btn-sm btn-primary btn-block" id="submit_compare" data-toggle="modal" data-target="#compare">Jämför runda</button>
        </div>
       @else
       @endif
       </div>
   </span>

    </div>
     <div class="showback hidden-phone">

     @if(Auth::check())
            <div class="row">
              <div class="col-md-12">
                 <input hidden="id" id="id" value="{{$round->id}}"/>
                 <input hidden="model" id="model" value="round"/>
                 <div id="chart-two" style="min-width: 310px; height: 400px; width: 100%; margin: 0 auto"></div>
              </div>
              <hr/>
            </div>
     @else

        @include('layouts/include/membership')

     @endif

    </div>

    <div class="showback hidden-phone">
        <div class="row">
          <div class="col-md-6 col-xs-12">
             <input hidden="pie-id" id="pie_id" value="{{$round->id}}"/>
             <div id="chart-three" style="min-width: 310px; height: 400px; width: 100%; margin: 0 auto"></div>
          </div>
        </div>
    </div>

    <div class="row">

    <div class="col-lg-12">
    <div class="showback">

    <div class="panel panel-default">
        <div class="panel-heading">Kommentarer ({{count($round->comments)}})
         @if(Auth::user())
            <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#comment">Kommentera</a>
         @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @foreach($round->comments as $comment)

            @include('layouts/include/comment')

            @endforeach
        </div>
    </div>
        <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Lägg till kommentar</h4>
              </div>

              <div class="modal-body">
              {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form', 'id'=>'comment_form'])}}
                {{Form::hidden('type_id', $round->id)}}
                {{Form::hidden('model', 'round')}}

               <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                     <div class="col-sm-10">

                         {{Form::text('body', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                     </div>
                 </div>

              <div class="modal-footer">
                  {{Form::submit('Spara Kommentar', ['class'=>'btn btn-primary'])}}
                      {{Form::close()}}
                <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

             </div>
           </div>
        </div>
        </div></div><!-- --/content-panel ---->

            @if(Auth::check())
                <div class="modal fade" id="compare" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Jämför Runda</h4>
                      </div>

                      <div class="modal-body">
                      {{Form::open(['route'=>'round.compare', 'class'=>'form-horizontal style-form', 'id'=>'compare_form'])}}
                       <div class="form-group">

                             <div class="col-sm-12">
                             <p>Du kan jämföra upp till 10 rundor åt gången.</p>

                                        <select name="type_id" class="form-control type_id" id="type_id">
                                        <option value="0" selected="selected">Välj Runda</option>
                                        @foreach($u_rounds as $r)
                                        <option value="{{$r->id}}">{{$r->date . ' | ' . calcScore($r->total, $r->tee->par)}}</option>
                                        @endforeach
                                        </select>

                             </div>
                         </div>
                      </div>
                      <div class="modal-footer">
                          {{Form::submit('Jämför', ['class'=>'btn btn-primary'])}}
                              {{Form::close()}}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

                     </div>

                </div>

                </div></div><!-- --/content-panel ---->
                @else
                @endif

            </div>
        </div>
    </div>

@stop

@section('scripts')

{{HTML::script('admin_js/compare/compare.js')}}
{{HTML::script('admin_js/stats/stats.js')}}
{{HTML::script('admin_js/round/group.js')}}
<script src="http://code.highcharts.com/highcharts.js"></script>

<script>

    jQuery(document).ready(function($) {

        getRoundAvgScore();
        $('#group_form').submit(getGroupRounds);
        $('#compare_form').submit(getCompareRound);
        $('#add_to_compare').submit(addToCompare);

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
