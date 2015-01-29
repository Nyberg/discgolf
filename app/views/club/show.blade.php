@extends('master')

@section('content')

  <h4><i class="fa fa-angle-right"></i> {{$club->name}}</h4>
        <div class="row">
     <img class="" src="{{$club->image}}" width="100%"/>
      </div>

<div class="row">
    <br/>
    <div class="col-lg-12">


    <div class="bs-example">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#sectionA"><i class="fa fa-info"></i> {{$club->name}}</a></li>
            <li><a data-toggle="tab" href="#sectionB"><i class="fa fa-microphone"></i> Om {{$club->name}}</a></li>
            <li><a data-toggle="tab" href="#sectionC"><i class="fa fa-user"></i> Medlemmar ({{count($club->users)}})</a></li>
            <li><a data-toggle="tab" href="#sectionE"><i class="fa fa-money"></i> Sponsorer</a></li>
            <li><a data-toggle="tab" href="#sectionG"><i class="fa fa-comments"></i> Kommentarer ({{count($club->comments)}})</a></li>
            @if(Auth::check())
            @if(Auth::user() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $club->id || Auth::user()->hasRole('Admin'))
            <li class="pull-right"><a data-toggle="modal" data-target="#news"><i class="fa fa-plus"></i> Lägg till nyhet</a></li>
            @endif
            @endif
        </ul>
    </div>

    </div>

 <div class="tab-content">
     <div class="col-lg-12"><br/></div>
        <br/>
             <div id="sectionA" class="tab-pane fade in active">
                <div class="col-lg-7">
                    <div class="col-lg-12">
                        <h4><i class="fa fa-info"></i> Nyheter</h4>

                        @foreach($club->news as $new)
                        <div class="row">
                            <div class="col-lg-12">

                                <h4>{{$new->head}}<small class="pull-right"> Skapad {{$new->created_at->format('Y-m-d')}}</small></h4>

                                <p>{{$new->body}}</p>

                                @if(Auth::check())
                                @if(Auth::user() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $club->id || Auth::user()->hasRole('Admin'))

                                {{Form::open(['method'=>'DELETE', 'route'=>['news.destroy', $new->id]])}}
                                {{Form::submit('Delete Entry', ['class'=>'btn btn-danger btn-xs'])}}
                                {{Form::close()}}
                                @endif
                                @endif

                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
         <div class="col-lg-5">
            <h4><i class="fa fa-tree"></i> Banor</h4>

                @foreach($club->course as $course)

                @foreach($course->photos as $photo)
                <h5>  {{$course->name}}</h5>

                <div class="row">
                    <div class="col-lg-12">
                        <a href="/course/{{$course->id}}/show"> <img class="img-thumbnail" src="{{$photo->url}}" width="100%"/></a>
                    </div>
                </div>
                @endforeach

                @endforeach

        </div>

            </div>

            <div id="sectionB" class="tab-pane fade">
                <div class="col-lg-12">
                 <div class="col-lg-10">
                        <h4><i class="fa fa-microphone"></i> Om {{$club->name}}</h4>
                        <p>{{$club->information}}</p>
                    </div>
                </div>
            </div>

            <div id="sectionC" class="tab-pane fade in">
            <div class="col-lg-12 wrapper-parent">

            @foreach($club->users as $member)

            <div class="col-lg-2 center">

            <a href="/user/{{$member->id}}/show"  data-toggle="lightbox" data-parent=".wrapper-parent"><img src="{{$member->image}}" class="img-thumbnail" width="100%" height="80%"/></a>
            <h5 class="center">{{$member->first_name . ' ' . $member->last_name}}</h5>
            </div>

            @endforeach

            </div>
            </div>

    <div id="sectionG" class="tab-pane fade">
    <div class="col-lg-12">
    <br/>

         <h4 class="mb"> Join the discussion!
            @if(Auth::user())
            <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#comment">
             Kommentera
            </button>
            @else
            @endif
         </h4>

         <div class="row">
           <div class="col-lg-12">

    @foreach($club->comments as $comment)
    @include('layouts/include/comment')
    @endforeach

    </div></div></div>

    <div class="modal fade bs-example-modal-lg" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Lägg till Kommentar</h4>
              </div>

              <div class="modal-body">
              {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
                {{Form::hidden('type_id', $club->id)}}
                {{Form::hidden('model', 'club')}}

               <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                     <div class="col-sm-10">

                         {{Form::text('body', '', ['class'=>'form-control'])}}
                     </div>
                 </div>

              <div class="modal-footer">
                  {{Form::submit('Spara Kommentar', ['class'=>'btn btn-primary'])}}
                      {{Form::close()}}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

             </div>
           </div>
    </div>

    </div>
    </div><!-- --/Modal-panel ---->

    </div>

    </div>

          <div class="modal fade bs-example-modal-lg" id="news" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                      <div class="modal-dialog">
                        <div class="modal-content modal-lg">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Lägg till nyhet</h4>
                          </div>

                          <div class="modal-body">
                          {{Form::open(['route'=>'news.store', 'class'=>'form-horizontal style-form'])}}
                             {{Form::hidden('id', $club->id)}}
                            <div class="form-group">
                             <label class="col-sm-12 col-sm-12 control-label">Rubrik</label>
                             <div class="col-sm-12">

                                 {{Form::text('head', '', ['class'=>'form-control'])}}
                             </div>
                            </div>

                           <div class="form-group">
                                 <label class="col-sm-12 col-sm-12 control-label">Inlägg</label>
                                 <div class="col-sm-12">

                                     {{Form::textarea('body', '', ['class'=>'form-control'])}}
                                 </div>
                             </div>

                          <div class="modal-footer">
                              {{Form::submit('Spara nyhet', ['class'=>'btn btn-primary'])}}
                                  {{Form::close()}}
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                         </div>
                       </div>
                    </div>
                </div>
            </div><!-- --/Modal-panel ---->
    </div>
</div>



@stop