@extends('master')

@section('content')

        <div class="row">
            <div class="col-lg-12">
              <img src="{{$club->image}}" width="100%"/>
                <div class="over-img-img">

                </div>
                <div class="over-img-club">
                     <img src="/img/logo-club.png" class="center-block"/>
                     <h2 class="text-center page-header-custom  hidden-tablet">{{$club->name}}</h2>
                </div>
            </div>
        </div>

<div class="row">
    <br/>
    <div class="col-lg-12">

    <div class="bs-example">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#sectionA">{{$club->name}}</a></li>
            <li><a data-toggle="tab" href="#sectionB">Nyheter ({{count($club->news)}})</a></li>
            <li><a data-toggle="tab" href="#sectionC">Medlemmar ({{count($club->users)}})</a></li>
            <li><a data-toggle="tab" href="#sectionE">Gästbok ({{count($club->comments)}})</a></li>
        </ul>
    </div>

    </div>

 <div class="tab-content">

             <div id="sectionA" class="tab-pane fade in active">
                <div class="col-md-8">
                    <div class="col-md-12">
                    <br/>
                    <h2 class="text-center page-header-custom">Information om {{$club->name}}</h2>
                    <div class="divider-header"></div>
                    <p>{{$club->information}}</p>
                    <br/>
                    <hr/>
                </div>

                <div class="col-md-12">
                    <br/>
                    <h2 class="text-center page-header-custom">Medlemskap</h2>
                    <div class="divider-header"></div>
                    <p>{{$club->membership}}</p>
                </div>

                </div>

        <!-- Sidocontent -->

         <div class="col-md-4">
        <br/>
           <div class="col-md-12 panel panel-sub">

                 <!-- Default panel contents -->
                 <div class="panel-heading text-center">Banor</div>
                  @foreach($club->course as $course)
                  <div class="col-md-12 margin-top-bottom">
                  @foreach($course->photos as $photo)

                          <a href="/course/{{$course->id}}/show"> <img class="thumbnail" src="{{$photo->url}}" width="100%"/></a>
                         <p class="text-center"><a href="/course/{{$course->id}}/show">{{$course->name}} | Tees: {{count($course->tee)}} | Rundor: {{count($course->round)}}</a></p>
                  <hr/>
                  @endforeach
                  </div>
                  @endforeach

           </div>

         <br/>
          <div class="col-md-12 panel panel-sub">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Mest lästa nyheter</div>

            @foreach($mosts as $new)
            <div class="col-md-12">
                <h2 class="text-center page-subheader-custom"> <a href="/club/news/{{$new->id}}/show" class="">{{$new->head}}</a></h2>
                 <p class="text-center">{{$new->created_at->format('Y-m-d') . ' av '}}  <a href="/club/{{$new->club_id}}/show">{{$new->club->name}}</a> | {{$new->views}} visningar</p>
            <hr/>
            </div>

            @endforeach

          </div>

              <div class="col-md-12 panel panel-sub">
                    <!-- Default panel contents -->
                    <div class="panel-heading panel-subheading text-center">Senaste nyheter</div>

                    <?php $i = 0; ?>
                    @foreach($club->news as $new)
                    @if($i == 3)<?php break; ?>@endif
                    <div class="col-md-12">
                        <h2 class="text-center page-subheader-custom"> <a href="/club/news/{{$new->id}}/show" class="">{{$new->head}}</a></h2>
                         <p class="text-center">{{$new->created_at->format('Y-m-d') . ' av '}}  <a href="/club/{{$new->club_id}}/show">{{$new->club->name}}</a> | {{$new->views}} visningar</p>
                    <hr/>
                    </div>
                    <?php $i++; ?>
                    @endforeach
                </div>

           </div>

           <!-- Slut sidocontent -->

            </div>

            <div id="sectionB" class="tab-pane fade">

                <div class="row">

                 <div class="col-md-12">

                    <h4 class="tab-rub text-center page-header-custom">Nyheter</h4>

                    @if(Auth::check() && Auth::user()->hasRole('ClubOwner') && Auth::user()->club_id == $club->id)
                    <p class="text-center"><a href="/admin/add/news">Lägg till nyhet</a></p>
                    @else
                    @endif

                    <div class="divider-header"></div>
                 </div>


                </div>

            </div>


            <div id="sectionC" class="tab-pane fade">
                <div class="col-lg-12 wrapper-parent mb">
                    <br/>
                    <div class="panel panel-default">

                    @if(count($users) <= 18)
                     <div class="panel-heading">Visar {{count($users)}} av {{count($club->users)}} medlemmar i {{$club->name}}
                     @if(Auth::check() && Auth::user()->club_id == 0 || Auth::check() && Auth::user()->club_id == 1000000)
                    <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#club_request_form">Ansök om medlemskap</a>
                     @else
                     @endif
                     </div>
                    @else
                     <div class="panel-heading">Visar 18 av {{count($club->users)}} medlemmar i {{$club->name}} </div>
                    @endif
                     <ul class="list-inline list-unstyled" id="Container">
                     <br/>
                         @foreach($users as $user)
                        <li class="col-sm-2 text-center thread mix mixup-content">
                           <a href="{{$user->id}}/show"><img src="{{$user->image}}" class="img-responsive img-circle center-block" width="40px"/></a>
                           <p><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></p>

                        </li>
                        @endforeach
                    </ul>



                @if(count($club->users) > 18)

                <div class="row">
                    <div class="col-md-12 text-center">
                     <a href="#" class="btn btn-primary btn-sm">Visa alla medlemmar</a>
                    </div>
                </div>
                @else
                @endif
                 </div>
             </div>
            </div>

    <div id="sectionE" class="tab-pane fade">
    <div class="col-lg-12">
    <br/>

              <div class="panel panel-default">
                <div class="panel-heading">Gästbok ({{count($club->comments)}})
                     @if(Auth::user())
                        <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#comment">Skriv inlägg</a>
                     @endif
                </div>
             </div>

         <div class="row">
           <div class="col-lg-12">

    @foreach($club->comments as $comment)
    @include('layouts/include/comment')
    @endforeach

    </div></div></div>

   </div>

    <div class="modal fade bs-example-modal-lg" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Lägg till Kommentar</h4>
              </div>

              <div class="modal-body">
              {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form', 'id'=>'comment_form'])}}
                {{Form::hidden('type_id', $club->id)}}
                {{Form::hidden('model', 'club')}}

               <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
                     <div class="col-sm-10">

                         {{Form::text('body', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
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


@stop

@section('scripts')
    <script>

    $(function(){

    // Instantiate MixItUp:

    $('#Container').mixItUp();

    });
    </script>
@stop