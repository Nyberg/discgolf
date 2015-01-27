    @extends('master')


    @section('content')

    <h4 class="rub"><i class="fa fa-angle-right"></i> <a href="/course/{{$course->id}}/show">{{$course->name . ' - ' . $tee->color}}</a>, {{$round->created_at->format('Y-m-d')}} by
                        @if($round->type == 'Par')
                       <td>{{showPar($round->par_id, $round->user_id)}}</td>
                        @else
                        <a href="/user/{{$round->user_id}}/show">{{$round->user}}</a>
                        @endif
     </h4>
    <div class="row">
    @foreach($course->photos as $photo)
         <img class="" src="{{$photo->url}}" width="100%"/>
    @endforeach
               <span class="span-h2 col-lg-3">{{$course->city . ', ' . $course->state}}</span>
               <span class="span-h2 col-lg-2">{{'Baskets: '. $tee->holes}}</span>
               <span class="span-h2 col-lg-2">{{'Par: ' . $tee->par}}</span>
               <span class="span-h2 col-lg-3">{{'Best Score: '.calcRecord($record->total, $tee->par)}}</span>
               <span class="span-h2 col-lg-2">{{checkFee($course->fee)}}</span>
           </div>

    <h4 class="tab-rub" id="hole-gallery"><i class="fa fa-angle-right"></i> Score:</h4>
    <table class="table table-hover text-center">
    <thead>
    <tr>
    <th>Hole</th>
    @foreach($tee->hole as $hole)
             <td><a href="{{$hole->image}}" data-toggle="lightbox" data-gallery="hole-gallery" data-parent="" data-footer="" data-title="{{'Basket '.$hole->number. ', '.$course->name.' - ' . $tee->color . '.<br/>Length ' . convert($hole->length). ', Par '. $hole->par}}">{{$hole->number}}</a></td>

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
     <h4 class="mb"><i class="fa fa-comments-o"></i> Comments
        @if(Auth::user())
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#comment">
         Add Comment
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
                                    <h4 class="modal-title" id="myModalLabel">Add Comment</h4>
                                  </div>

                                  <div class="modal-body">
                                  {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
                                    {{Form::hidden('type_id', $round->id)}}
                                    {{Form::hidden('model', 'round')}}
                                   <div class="form-group">
                                                     <label class="col-sm-2 col-sm-2 control-label">Comment</label>
                                                     <div class="col-sm-10">

                                                         {{Form::text('body', '', ['class'=>'form-control'])}}
                                                     </div>
                                                 </div>


                                  <div class="modal-footer">
                                      {{Form::submit('Save Comment', ['class'=>'btn btn-primary'])}}
                                          {{Form::close()}}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                 </div>
                               </div>
        </div>



        </div></div><!-- --/content-panel ---->

    </div>
    </div>



    </div>


@section('scripts')

    <script>

        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

    </script>

@stop

    @stop