@extends('master')

@section('content')

        <div class="row">
        <div class="col-lg-12">
          <img src="{{$club->image}}" width="100%"/>
        <div class="over-img-img">

        </div>
            <div class="over-img">

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
            <li><a data-toggle="tab" href="#sectionE">Banor</a></li>
            <li><a data-toggle="tab" href="#sectionG">Kommentarer ({{count($club->comments)}})</a></li>
        </ul>
    </div>

    </div>

 <div class="tab-content">
     <div class="col-lg-12"><br/></div>
        <br/>
             <div id="sectionA" class="tab-pane fade in active">

            </div>

            <div id="sectionB" class="tab-pane fade">
               <div class="col-lg-12">
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

            <div id="sectionC" class="tab-pane fade in">
                <div class="col-lg-12 wrapper-parent mb">

    <div class="panel panel-default">

                    @if(count($users) <= 18)
                     <div class="panel-heading">Visar {{count($users)}} av {{count($club->users)}} medlemmar i {{$club->name}}</div>
                    @else
                     <div class="panel-heading">Visar 18 av {{count($club->users)}} medlemmar i {{$club->name}}</div>
                    @endif
                     <ul class="list-inline list-unstyled" id="Container">
                     <br/>
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
            </div>

       <div id="sectionE" class="tab-pane fade">
            <div class="col-lg-12 ">
                 <div class="panel panel-default">
                   <!-- Default panel contents -->
                   <div class="panel-heading">Banor</div>
            </div>
                @foreach($club->course as $course)
                <div class="row">
                @foreach($course->photos as $photo)
                    <div class="col-lg-6">

                        <a href="/course/{{$course->id}}/show"> <img class="" src="{{$photo->url}}" width="100%"/></a>
                    </div>
                    <div class="col-lg-6">
                       <h2 class="text-center page-header-custom">{{$course->name}}</h2>
                    </div>
                </div>
                @endforeach
                </div>
                @endforeach
             </div>


    <div id="sectionG" class="tab-pane fade">
    <div class="col-lg-12">
    <br/>

              <div class="panel panel-default">
                <div class="panel-heading">Kommentarer ({{count($club->comments)}})
                     @if(Auth::user())
                        <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#comment">Kommentera</a>
                     @endif
                </div>
             </div>

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