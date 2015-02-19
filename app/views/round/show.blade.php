    @extends('master')


    @section('content')
              <h2 class="text-center page-header-custom"><a href="/course/{{$course->id}}/show">{{$course->name . ' - ' . $tee->color}}</a>, {{$round->date}} av
               @if($round->type == 'Par')
                 <td>{{showPar($round->par_id, $round->user_id)}}</td>
                  @else
                  <a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a>
                  @endif
              </h2>
              <div class="divider-header"></div>
     </h4>
    <div class="row">
    @foreach($course->photos as $photo)
         <img class="" src="{{$photo->url}}" width="100%"/>
    @endforeach
    <div class="hidden-phone">
               <span class="text-center span-h2 col-lg-3">{{$course->city->city . ', ' . $course->state->state}}</span>
               <span class="text-center span-h2 col-lg-2">{{'Hål: '. $tee->holes}}</span>
               <span class="text-center span-h2 col-lg-2">{{'Par: ' . $tee->par}}</span>
               <span class="text-center span-h2 col-lg-3">
               Bästa resultat:
               @foreach($records as $record)

               {{calcRecord($record->total, $tee->par, $record->id, $record->course_id)}}
               @endforeach
               </span>
               <span class="text-center span-h2 col-lg-2">{{checkFee($course->fee)}}</span>
               </div>
           </div>

        <br/>
         <div class="panel panel-default">
           <!-- Default panel contents -->
           <div class="panel-heading">  Resultat: {{calcScore($round->total, $round->tee->par)}}</div>
    <table class="table table-hover text-center hidden-phone">
    <thead>
        <tr>
            <td>Hål</td>
            @foreach($tee->hole as $hole)
                 <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery" data-parent="" data-footer="" data-title="{{'Basket '.$hole->number. ', '.$course->name.' - ' . $tee->color . '.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
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
        <tr>
            <td>Längd</td>
            @foreach($tee->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
        </tr>
    </tbody>
    </table>
    </div>
    </div>
     <div class="showback hidden-phone">

     @if(Auth::check() && Auth::user()->hasRole('Member') || Auth::check() && Auth::user()->hasRole('Premium') || Auth::check() && Auth::user()->hasRole('Admin'))

            <div class="row">

              <div class="col-md-12">
                 <input hidden="id" id="id" value="{{$round->id}}"/>
                 <input hidden="model" id="model" value="round"/>
                 <div id="chart-two" style="min-width: 310px; height: 400px; width: 100%; margin: 0 auto"></div>
              </div>

              <hr/>

            </div>

     @else

            <div class="row">

              <div class="col-md-12">
                <h2 class="text-center page-header-custom">Statistik</h2>
                 <p class="text-center">Som medlem eller licensierad spelare får du extra statistik. Här kan du bland annat se resultatet jämfört med banans snitt för varje hål. </p>
                 <p class="text-center"><a href="#">Läs mer om medlemskap här!</a></p>
                <div class="divider-header"></div>
              </div>

              <div class="col-md-12">

              </div>

              <hr/>

            </div>


     @endif

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

    </div>
    </div>



    </div>

@stop

@section('scripts')

{{HTML::script('admin_js/stats/stats.js')}}
{{HTML::script('http://code.highcharts.com/highcharts.js')}}

    <script>

    jQuery(document).ready(function($) {

        getRoundAvgScore();

        });
</script>

    <script>

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

    </script>

@stop
