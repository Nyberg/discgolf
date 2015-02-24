@extends('master')

@section('content')


<!-- Profilheader -->
<div class="row profile-back">
    <div class="col-md-12">
    <div class="col-md-5"><a href="/user/{{$user->id}}/show"><h4 class="text-right">{{$user->first_name . ' ' . $user->last_name}}</h4></a></div>
    <div class="col-md-2"><img src="{{$user->image}}" class="img-circle center-block over-img"/></div>
    <div class="col-md-5"><a href="/club/{{$user->club_id}}/show"><h4 class="text-left">{{$user->club->name}}</h4></a></div>

    </div>
    <div class="col-md-12 margin-top-bottom">
        <div class="col-md-12">
            <small class="text-center margin-top">{{$user->profile->info}}</small>
        </div>
        <div class="col-md-12 text-center">
            <p><i class="fa fa-map-marker fa-1-5x red"></i>{{$user->profile->city->city . ', ' . $user->profile->state->state}} <i class="fa fa-envelope fa-1-5x red"></i>{{$user->email}} <i class="fa fa-desktop fa-1-5x red"></i>{{$user->profile->website}}
                @if(Auth::check() && Auth::id() != $user->id)

                @if(getFriend(Auth::id(), $user->id) == false)
                <a href="/account/friend/{{$user->id}}/add" name="user_id" type="user_id"><i class="fa fa-user-plus fa-1-5x red"></i>Lägg till som vän!</a>
                @else
                 <a href="/account/friend/{{$user->id}}/remove" name="user_id" type="user_id"><i class="fa fa-heartbeat fa-1-5x red"></i>Vänner</a>
                @endif

                @else
                @endif
            </p>
        </div>

    </div>

        <div class="col-md-12">
        </div>

</div>
<!-- Slut Profileheader -->

<div class="row">


</div>

<!-- Nav-pills -->
<div class="row">

    <div class="col-md-12">
        <div class="row">

        </div>
    </div>

    <div class="col-md-12">
        <div class="row">
            <ul class="nav nav-pills nav-justified">
              <li class="active" id="menu_item"><a data-toggle="tab" href="#sectionA">Översikt</a></li>
              <li id="menu_item_2"></li>
            </ul>
        </div>
    </div>

</div>
<!-- Slut navpills -->

    <div class="tab-section">

    <div id="sectionA" class="tab-pane fade in active">

    <div class="row">
       <div id="chart-round-avg" style="min-width: 300px; height: 400px; width: 100%; margin: 0 auto"></div>
        <input hidden="id" id="id" value="{{$user->id}}"/>
        <input hidden="model" id="model" value="user"/>
    </div>
    <div class="row">
    <!-- Sidomeny -->
    <div class="col-md-12">
        <div class="row">
        <div class="col-md-3">
            <div class="row">
            {{Form::open(['method' => 'POST','route' => ['user.data'],'class' => 'form-inline', 'id' => 'stats'])}}
            {{Form::hidden('id', $user->id, ['id'=>'id'])}}
            {{Form::hidden('model', 'user', ['id'=>'model'])}}
            {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
            {{Form::submit('Översikt', ['class' => 'btn btn-red btn-sm btn-block'])}}
            {{Form::close()}}
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
            {{Form::open(['method' => 'POST','route' => ['user.rounds'],'class' => 'form-inline', 'id' => 'month'])}}
            {{Form::hidden('id', $user->id, ['id'=>'id'])}}
            {{Form::hidden('model', 'user', ['id'=>'model'])}}
            {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
            {{Form::submit('Rundor', ['class' => 'btn btn-red btn-sm btn-block'])}}
            {{Form::close()}}
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
            {{Form::open(['method' => 'POST','route' => ['course.stats'],'class' => 'form-inline', 'id' => 'round_avg'])}}
            {{Form::hidden('id', $user->id, ['id'=>'id'])}}
            {{Form::hidden('model', 'user', ['id'=>'model'])}}
            {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
            {{Form::submit('Senaste resultaten', ['class' => 'btn btn-red btn-sm btn-block'])}}
            {{Form::close()}}
            </div>
        </div>
        <div class="col-md-3">
            <div class="row">
                {{Form::open(['method' => 'POST','route' => ['hole.stats'],'class' => 'form-inline', 'id' => 'user_stat'])}}
                {{Form::hidden('id', $user->id, ['id'=>'id'])}}
                {{Form::hidden('model', 'user', ['id'=>'model'])}}
                {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
                {{Form::submit('Visa hålresultat', ['class' => 'btn btn-red btn-sm btn-block'])}}
                {{Form::close()}}
            </div>
        </div>

        <div class="col-md-12">
            <br/>

        </div>

        </div>
    </div>
    <!-- Slut sidomeny -->
    </div>

    <div class="row">
    <br/>
           <div class="col-md-12">

           </div>

        <div class="col-md-6">
             <h4 class="tab-rub text-center page-header-custom">Senaste rundorna</h4>
            @foreach($rounds as $round)
                <div class="well well-sm">
                <p>
                    <a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('d M') . ' - ' . $round->course->name . ' ' . $round->tee->color . ''}}
                    <span class="pull-right">{{$round->type}} | {{calcScore($round->total, $round->tee['par'])}}</span>
                    </a>
                </p>
                </div>
            @endforeach
        </div>

        <div class="col-md-6">
             <h4 class="tab-rub text-center page-header-custom">Senaste aktiviteterna</h4>
             @foreach($notifications as $notification)

             @if(strpos($notification->type, 'Updated'))
              <div class="well well-sm">
                <p>
                <a href="{{$notification->url}}">
                <i class="fa fa-trophy red"></i> {{$notification->subject}} <span class="pull-right">{{$notification->sent_at->format('d M')}}</span>
                </a>
                </p>
              </div>
              @elseif($notification->type ==  'FriendWasPosted')
              <div class="well well-sm">
                <p>
                <a href="{{$notification->url}}">
                <i class="fa fa-user"></i> {{$notification->subject}} <span class="pull-right">{{$notification->sent_at->format('d M')}}</span>
                </a>
                </p>
              </div>
              @elseif($notification->type ==  'CommentWasPosted')
                <div class="well well-sm">
                   <p>
                   <a href="{{$notification->url}}">
                   <i class="fa fa-comment-o"></i> {{$notification->subject}} <span class="pull-right">{{$notification->sent_at->format('d M')}}</span>
                   </a>
                   </p>
                </div>
              @elseif($notification->type == 'RoundWasActivated')
                <div class="well well-sm">
                <p>
                <a href="{{$notification->url}}">
                <i class="fa fa-trophy red"></i> {{$notification->subject}} <span class="pull-right">{{$notification->sent_at->format('d M')}}</span>
                </a>
                </p>
                </div>
              @elseif($notification->type == 'ReviewWasPosted')
                <div class="well well-sm">
                <p>
                <a href="{{$notification->url}}">
                <i class="fa fa-align-left"></i> {{$notification->subject}} <span class="pull-right">{{$notification->sent_at->format('d M')}}</span>
                </a>
                </p>
                </div>
              @else
              @endif

            @endforeach
        </div>



        </div>

            <div class="row">
            <br/>
                   <div class="col-md-12">

                   </div>

                           <div class="col-md-6">
                                <h4 class="tab-rub text-center page-header-custom">Bags</h4>
                               @foreach($user->bags as $bag)
                                   <div class="well well-sm" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">

                                       <a>{{$bag->type}}</a>

                                   </div>

                               <div class="col-md-12 collapse well well-sm"  id="collapseExample">
                                         <div class="col-lg-3">
                                           <p>Putters</p>
                                               @foreach($bag->disc as $disc)
                                               @if($disc->type == 'Putter')
                                               <p><span data-toggle="tooltip" data-placement="top" title="{{$disc->author.', '.$disc->weight . 'g'}}">{{$disc->plastic.' '. $disc->name}}</span></p>
                                               @endif
                                               @endforeach
                                         </div>
                                         <div class="col-lg-3">
                                           <p>Midranges</p>
                                               @foreach($bag->disc as $disc)
                                               @if($disc->type == 'Midrange')
                                                <p><span data-toggle="tooltip" data-placement="top" title="{{$disc->author.', '.$disc->weight . 'g'}}">{{$disc->plastic.' '. $disc->name}}</span></p>
                                               @endif
                                               @endforeach
                                         </div>
                                         <div class="col-lg-3">
                                           <p>Fairway Drivers</p>
                                               @foreach($bag->disc as $disc)
                                               @if($disc->type == 'Fairway Driver')
                                                <p><span data-toggle="tooltip" data-placement="top" title="{{$disc->author.', '.$disc->weight . 'g'}}">{{$disc->plastic.' '. $disc->name}}</span></p>
                                               @endif
                                               @endforeach
                                         </div>
                                         <div class="col-lg-3">
                                           <p>Drivers</p>
                                               @foreach($bag->disc as $disc)
                                               @if($disc->type == 'Driver')
                                                <p><span data-toggle="tooltip" data-placement="top" title="{{$disc->author.', '.$disc->weight . 'g'}}">{{$disc->plastic.' '. $disc->name}}</span></p>
                                               @endif
                                               @endforeach
                                         </div>
                               </div>
                                   @endforeach
                                   </div>

                <div class="col-md-6">
                     <h4 class="tab-rub text-center page-header-custom">Vänner</h4>
                    @foreach($user->friends as $user)
                        <div class="well well-sm">
                            <a href="/user/{{$user->user->id}}/show/">{{$user->user->first_name}}
                            <span class="pull-right"></span>
                            </a>
                        </div>
                    @endforeach
                </div>



                </div>

    </div>

    </div>

    <div id="sectionB" class="tab-pane fade">

    </div>

    </div>



@stop

@section('scripts')

    {{HTML::script('admin_js/stats/stats.js')}}
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/heatmap.js"></script>
    <script src="http://code.highcharts.com/modules/treemap.js"></script>


    <script>

    jQuery(document).ready(function($) {

    getData();

    $('#round_avg').submit(getRoundAvg);
    $('#month').submit(getRoundsPerMonth);
    $('#user_stat').submit(getUserPie);
    $('#stats').submit(getDataReload);

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