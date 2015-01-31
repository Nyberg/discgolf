@extends('master')

@section('content')

  <h4><i class="fa fa-angle-right"></i> {{$club->name}}
  @if(Auth::check() && Auth::user()->club_id == 0)
  <a href="#" data-toggle="modal" data-target="#club_request_form" class="btn btn-primary btn-sm pull-right">Ansök om medlemskap</a>
  @endif
  </h4>
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
            <!-- <li><a data-toggle="tab" href="#sectionE"><i class="fa fa-money"></i> Sponsorer</a></li> -->
            <li><a data-toggle="tab" href="#sectionG"><i class="fa fa-comments"></i> Kommentarer ({{count($club->comments)}})</a></li>
            @if(Auth::check())
            @if(Auth::user() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $club->id || Auth::user()->hasRole('Admin'))
            <li class="pull-right"><a href="/admin/add/news"><i class="fa fa-plus"></i> Lägg till nyhet</a></li>
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

                        @foreach($news as $new)
                        <div class="row divider">
                            <div class="col-lg-12">

                                <h4><small class="btn btn-sm btn-theme">{{$new->created_at->format('d/n')}}</small> {{$new->head}}</h4>

                                <p>{{str_limit($new->body, $limit = 200, $end = '...')}}</p>
                            <div class="news-btn">
                                <small>Kommentarer ({{count($new->comments)}}) | </small>
                                <a href="/club/news/{{$new->id}}/show" class=""><small>Läs mer..</small></a>
                            </div>

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
                <div class="col-lg-12 wrapper-parent mb">



                    @if(count($users) < 18)
                    <h4 class="tab-rub">Visar {{count($users)}} av {{count($users)}} medlemmar i {{$club->name}}</h4>
                    @else
                    <h4 class="tab-rub">Visar 18 av {{count($club->users)}} medlemmar - {{$club->name}}</h4>
                    @endif
                     <ul class="list-inline list-unstyled" id="Container">
                         @foreach($users as $user)
                        <li class="col-sm-2 text-center thread mix mixup-content">
                           <img src="{{$user->image}}" class="img-responsive img-circle center-block" width="40px"/>
                           <p><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></p>
                           <small>Klubb: <a href="/club/{{$user->club_id}}/show">{{$user->club->name}}</a></small>
                        </li>
                        @endforeach
                    </ul>

                </div>

                @if(count($club->users) > 18)

                <div class="row">
                    <div class="col-md-12 text-center">
                     <a href="#" class="btn btn-primary btn-sm">Visa alla medlemmar</a>
                    </div>
                </div>
                @else
                @endif

            </div>

    <div id="sectionG" class="tab-pane fade">
    <div class="col-lg-12">
    <br/>

         <h4 class=""> Kommentarer ({{count($club->comments)}})
            @if(Auth::user())
            <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#comment">
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

                @if(Auth::check())
                    <div class="modal fade" id="club_request_form" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                    </button>
                                    <h4 class="modal-title">Ansök om medlemskap</h4>
                                </div>
                                <div class="modal-body">
                                    {{Form::open(['method' => 'post', 'route' => ['club-request', $club->id], 'id' => 'request_form'])}}
                                <p>När du gör en ansökan behandlas det av respektives klubbs ledning. Är du medlem i klubben kommer dom acceptera dig. Detta är för att forumen ska fungera korrekt, samt att klubben ska kunna hantera sina medlemmar.</p>
                                </div>
                                <div class="modal-footer">
                                   {{Form::submit('Ansök', ['class'=>'btn btn-primary'])}}
                                                                   {{Form::close()}}
                                   <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
    </div>
</div>



@stop

@section('scripts')
    <script>

    $(function(){

    // Instantiate MixItUp:

    $('#Container').mixItUp();

    });
    </script>
@stop