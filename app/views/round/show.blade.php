    @extends('master')


    @section('content')

    <h4 class="rub"><i class="fa fa-angle-right"></i> <a href="/course/{{$course->id}}/show">{{$course->name . ' - ' . $tee->color}}</a>, {{$round->created_at->format('Y-m-d')}} av
                        @if($round->type == 'Par')
                       <td>{{showPar($round->par_id, $round->user_id)}}</td>
                        @else
                        <a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a>
                        @endif
     </h4>
    <div class="row">
    @foreach($course->photos as $photo)
         <img class="" src="{{$photo->url}}" width="100%"/>
    @endforeach
               <span class="text-center span-h2 col-lg-3">{{$course->city->city . ', ' . $course->state->state}}</span>
               <span class="text-center span-h2 col-lg-2">{{'Hål: '. $tee->holes}}</span>
               <span class="text-center span-h2 col-lg-2">{{'Par: ' . $tee->par}}</span>
               <span class="text-center span-h2 col-lg-3">
               Bästa resultat:
               @foreach($records as $record)

               {{calcRecord($record->total, $tee->par)}}
               @endforeach
               </span>
               <span class="text-center span-h2 col-lg-2">{{checkFee($course->fee)}}</span>
           </div>

    <h4 class="tab-rub" id="hole-gallery"><i class="fa fa-angle-right"></i> Resultat:</h4>
    <table class="table table-hover text-center">
    <thead>
        <tr>
            <th>Hål</td>
            @foreach($tee->hole as $hole)
                 <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery" data-parent="" data-footer="" data-title="{{'Basket '.$hole->number. ', '.$course->name.' - ' . $tee->color . '.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>
            @endforeach
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Resultat/Par</th>
            @foreach($round->score as $score)
            <td class="{{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
            @endforeach
        </tr>
        <tr>
            <th>Längd</th>
            @foreach($tee->hole as $hole)
            <td>{{convert($hole->length)}}</td>
            @endforeach
        </tr>
    </tbody>
    </table>
    </div>

    <div class="row">
    <div class="col-lg-12">
    <div class="showback">
     <h4 class="mb"><i class="fa fa-comments-o"></i> Kommentarer
        @if(Auth::user())
        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#comment">
         Kommentera
        </button>
        @endif
     </h4>
<div class="row">
  <div class="col-lg-12">
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
              {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
                {{Form::hidden('type_id', $round->id)}}
                {{Form::hidden('model', 'round')}}

               <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                     <div class="col-sm-10">

                         {{Form::text('body', '', ['class'=>'form-control'])}}
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

    <script>

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

    </script>

@stop

