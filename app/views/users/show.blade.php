@extends('master')

@section('content')

<div class="row hidden-phone">
<div class="col-lg-12">
<img class="image" src="{{$user->profile->image}}" width="100%"/>
<div class="over-img-img">

</div>
    <div class="over-img">
    <img src="{{$user->image}}" class="img-circle center-block"/>
     <h2 class="text-center page-header-custom  hidden-tablet">{{$user->first_name .' ' .$user->last_name}} - <a href="/club/{{$user->club_id}}/show">{{$user->club->name}}</a></h2>
    </div>
    </div>
</div>



<div class="row">
<br/>
    <div class="col-lg-12">
    <div class="bs-example">
        <ul class="nav nav-tabs nav-justified" id="nav-just">
            <li class="active" id="menu_item"><a data-toggle="tab" href="#sectionA">Information</a></li>
            <li id="menu_item_2"><a data-toggle="tab" href="#sectionB">Rundor ({{count($rounds)}})</a></li>
            <li id="menu_item_3"><a data-toggle="tab" href="#sectionC">Bag</a></li>
            <li id="stats_li"><a data-toggle="tab" href="#sectionE">Statistik</a></li>
            <li id="menu_item_4"><a data-toggle="tab" href="#sectionF">Gästbok ({{count($user->comments)}})</a></li>

        </ul>
</div>

    <div class="tab-content">

  <br/>
         <div id="sectionA" class="tab-pane fade in active">

                <div class="col-lg-12">

                </div>
         </div>

         <div id="sectionC" class="tab-pane fade in">
         @foreach($bags as $bag)
            <div class="col-lg-12">
            <div class="panel panel-default">
                      <!-- Default panel contents -->
                      <div class="panel-heading">{{$bag->type}}</div>

            </div>
          <div class="col-lg-3">
            <p>Putters</p>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Putter')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
          <div class="col-lg-3">
            <p>Midranges</p>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Midrange')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
          <div class="col-lg-3">
            <p>Fairway Drivers</p>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Fairway Driver')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
          <div class="col-lg-3">
            <p>Drivers</p>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Driver')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
        </div>
           @endforeach
         </div>



    <div id="sectionB" class="tab-pane fade in">

         <div class="panel panel-default">
           <!-- Default panel contents -->
           <div class="panel-heading">  De 5 senaste rundorna av {{$user->first_name .' '. $user->last_name}}</div>
        <table class="table table-hover">
            <thead>
            <tr>
            <td>Datum</td>
            <td>Bana</td>
            <td>Typ</td>
            <td>Resultat</td>
            </tr>
            </thead>
            <tbody>
      @foreach($rounds as $round)
            <tr>
                <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
                <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']. ' - ' .$round->tee['color']}}</a></td>
                <td>{{$round->type}}

                    @if($round->type == 'Par')
                    {{' | '. getParPlayer($round->par_id, $user->id, $round->user_id)}}
                    @else
                    @endif

                </td>
                <td>{{calcScore($round->total, $round->tee['par'])}}</td>
            </tr>
       @endforeach
            </tbody>
        </table>


    </div>
         <a href="/round/{{$user->id}}/user/show" class="btn btn-primary btn-sm">Se alla rundor av {{$user->first_name}}</a>
  </div>

     <div id="sectionD" class="tab-pane fade in">



    </div>

    <!-- Section E -->
    <div id="sectionE" class="tab-pane fade in">

               @if($cp >= 1)
               <div class="row">

                           <div class="col-md-12">
                           <h4 class="text-center page-header-custom">Statistik</h4>
               <p class="text-center">{{$user->first_name . ' ' . $user->last_name}} har inte spelat tillräckligt med rundor (5) för att kunna generera statistik. </p>
                   <div class="divider-header"></div>
                           </div>
                           </div>
               @else


        <div class="row">







            </div>
      @endif

    </div>
    <!-- Slut Section E -->

    <!-- Section F -->
    <div id="sectionF" class="tab-pane fade in">
     <br/>

      <div class="row">
        <div class="col-lg-12">

           <div class="panel panel-default">
             <div class="panel-heading">Inlägg ({{count($user->comments)}})
                  @if(Auth::user())
                     <a class="pull-right btn btn-primary btn-xs" data-toggle="modal" data-target="#comment">Skriv inlägg</a>
                  @endif
             </div>
          </div>

        </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @foreach($user->comments as $comment)
                @include('layouts/include/comment')
                @endforeach
            </div>
        </div>

    </div>
    <!-- Slut Section F -->

    <div class="modal fade bs-example-modal-lg" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Skriv inlägg</h4>
    </div>

    <div class="modal-body">
    {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form', 'id'=>'comment_form'])}}
    {{Form::hidden('type_id', $user->id)}}
    {{Form::hidden('model', 'user')}}
    <div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Inlägg</label>
    <div class="col-sm-10">

    {{Form::text('body', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
    </div>
    </div>


    <div class="modal-footer">
    {{Form::submit('Spara inlägg', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
    <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

    </div>
    </div>

    </div>
    </div>


    </div>
</div>
</div>
</div>
</div>

<div class="showback" id="stats">
    <div class="row">

        <div class="col-md-12">

                <h4 class="tab-rub text-center page-header-custom">Statistik</h4>

                    <p class="text-center">Statistiken baserar sig på minst 5 aktiva rundor.</p>
                    <div class="divider-header"></div>
        </div>

         <div class="col-sm-3 col-md-3 col-md-offset-1">
                        <div class="thumbnail text-center stat" data-toggle="tooltip" data-placement="top" title="Siffran visar totala antalet rundor.">
                          <div class="caption text-center">
                          <i class="fa fa-star fa-4x"></i>
                          <p class="white">Antal rundor</p>
                            <h4 class="red">{{count($user->round)}}</h4>
                          </div>
                        </div>
                      </div>

                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail text-center stat" data-toggle="tooltip" data-placement="top" title="Siffran visar totala antalet kast för alla rundor.">
                          <div class="caption text-center white">
                          <i class="fa fa-database fa-4x"></i>
                          <p class="white">Totalt antal kast</p>
                            <h4 class="red">{{$shots}}</h4>
                          </div>
                        </div>
                      </div>

                       <div class="col-sm-3 col-md-3 col-lg-offset-right-1">
                        <div class="thumbnail text-center stat" data-toggle="tooltip" data-placement="top" title="Siffran visar antalet unika banor som spelats.">
                            <div class="caption text-center">
                               <i class="fa fa-tree fa-4x"></i>
                            <p class="white">Spelade banor</p>
                            @if($cp <= 0)
                            <h4 class="red">0</h4>
                            @else
                              <h4 class="red">{{count($cp)}}</h4>
                              @endif

                            </div>
                          </div>
                        </div>

                       <div class="col-sm-3 col-md-3 col-md-offset-1">
                        <div class="thumbnail text-center stat"  data-toggle="tooltip" data-placement="top" title="Siffran visar antalet bogeyfria rundor.">
                            <div class="caption text-center">
                            <i class="fa fa-thumbs-o-up fa-4x"></i>
                            <p class="white">Bogeyfria rundor</p>
                              <h4 class="red">{{$bfr}}</h4>
                            </div>
                          </div>
                        </div>

                       <div class="col-sm-4 col-md-4">
                        <div class="thumbnail text-center stat"  data-toggle="tooltip" data-placement="top" title="Siffran visar snittresultat per runda.">
                            <div class="caption text-center">
                             <i class="fa fa-trophy fa-4x"></i>
                            <p class="white">Genomsnittligt resultat</p>
                              <h4 class="red">{{round($avg, 1)}}</h4>
                            </div>
                          </div>
                        </div>

                       <div class="col-sm-3 col-md-3 col-md-offset-right-1">
                        <div class="thumbnail text-center stat"  data-toggle="tooltip" data-placement="top" title="Siffran visar rundan med flest birdies.">
                            <div class="caption text-center">
                            <i class="fa fa-child fa-4x"></i>
                            <p class="white">Flest birdies på en runda</p>
                              <h4 class="red">{{$birdies}}</h4>
                            </div>
                          </div>
                        </div>

        <div class="col-md-12 hidden-phone">
                <h4 class="text-center page-header-custom">Diagram & Sånt</h4>
        <div class="row">
         <div class="col-md-12 text-center">
                <div id="chart-one" style="min-width: 100%; height: 400px; width: 100%; margin: 0 auto"></div>

                <input hidden="id" id="id" value="{{$user->id}}"/>
                <input hidden="model" id="model" value="user"/>
                <hr/>
         </div>
        </div>
        </div>

        <div class="col-md-12 text-center">
        <br>
            <div id="chart-two" style="min-width: 100%; height: 400px; width: 100%; margin: 0 auto"></div>
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

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })

    </script>

    {{HTML::script('admin_js/stats/stats.js')}}
    <script src="http://code.highcharts.com/highcharts.js"></script>


    <script>

    jQuery(document).ready(function($) {

    $('#stats').hide();

    $("#stats_li").click(function(){

        $( "#stats" ).show( 500 );
        getFirstPie();
        getSecondPie();
    });

    $('#menu_item').click(function(){
          $('#stats').hide(500);
    });

    $('#menu_item_2').click(function(){
          $('#stats').hide(500);
    });

    $('#menu_item_3').click(function(){
          $('#stats').hide(500);
    });

    $('#menu_item_4').click(function(){
          $('#stats').hide(500);
    });

});

    </script>

@stop