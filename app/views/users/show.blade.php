@extends('master')

@section('content')

<div class="row hidden-phone">
<div class="col-lg-12">
<img class="image" src="{{$user->profile->image}}" width="100%"/>
<div class="over-img-img">

</div>
    <div class="over-img">
    <img src="{{$user->image}}" class="img-circle center-block"/>
     <h2 class="text-center page-header-custom  hidden-tablet">{{$user->first_name .' ' .$user->last_name}} - {{$user->club->name}}</h2>
    </div>
    </div>
</div>



<div class="row">
<br/>
    <div class="col-lg-12">
    <div class="bs-example">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#sectionA">Information</a></li>
            <li><a data-toggle="tab" href="#sectionB">Rundor ({{count($rounds)}})</a></li>
            <li><a data-toggle="tab" href="#sectionC">Bag</a></li>
            @if(count($sponsors) == 0)
            @else
            <li><a data-toggle="tab" href="#sectionD">Sponsorer</a></li>
            @endif
            <li><a data-toggle="tab" href="#sectionE">Statistik</a></li>
            <li><a data-toggle="tab" href="#sectionF">Kommentarer ({{count($user->comments)}})</a></li>

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
            <h4><i class="fa fa-spinner"></i> {{$bag->type}}</h4>

            </div>
          <div class="col-lg-3">
            <h5>Putters</h5>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Putter')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
          <div class="col-lg-3">
            <h5>Midranges</h5>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Midrange')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
          <div class="col-lg-3">
            <h5>Fairway Drivers</h5>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Fairway Driver')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
          </div>
          <div class="col-lg-3">
            <h5>Drivers</h5>
                @foreach($bag->disc as $disc)
                @if($disc->type == 'Driver')
                <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                @endif
                @endforeach
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
    <div id="sectionE" class="tab-pane fade in">


               @if($cp <= 4)
               <p>{{$user->first_name . ' ' . $user->last_name}} har inte spelat tillräckligt med rundor (5) för att kunna generera statistik. </p>
                @else

                  @endif
<div class="row">
            <div class="col-sm-2 col-md-2 col-md-offset-1">
                <div class="thumbnail text-center stat">
                     <i class="fa fa-database fa-4x"></i>
                  <div class="caption text-center">
                  <p>Totalt antal kast</p>
                    <h4>{{$shots}}</h4>
                    <p>Siffran visar totala antalet kast för alla rundor</p>


                  </div>
                </div>
              </div>
               <div class="col-sm-2 col-md-2">
                <div class="thumbnail text-center">
                       <i class="fa fa-tree fa-4x"></i>
                    <div class="caption text-center">
                    <p>Spelade banor</p>
                    @if($cp <= 4)
                    <h4>0</h4>
                    @else
                      <h4>{{count($cp)}}</h4>
                      @endif
                      <p>Siffran visar antalet unika banor som spelats</p>


                    </div>
                  </div>
                </div>

               <div class="col-sm-2 col-md-2">
                <div class="thumbnail text-center">
                       <i class="fa fa-thumbs-o-up fa-4x"></i>
                    <div class="caption text-center">
                    <p>Bogeyfria rundor</p>
                      <h4>{{$bfr}}</h4>
                      <p>Siffran visar antalet bogeyfria rundor</p>


                    </div>
                  </div>
                </div>

               <div class="col-sm-2 col-md-2">
                <div class="thumbnail text-center">
                       <i class="fa fa-trophy fa-4x"></i>
                    <div class="caption text-center">
                    <p>Genomsnittligt resultat</p>
                      <h4>{{round($avg, 1)}}</h4>
                      <p>Siffran visar snittresultat per runda</p>


                    </div>
                  </div>
                </div>

               <div class="col-sm-2 col-md-2">
                <div class="thumbnail text-center">
                       <i class="fa fa-child fa-4x"></i>
                    <div class="caption text-center">
                    <p>Flest birdies på en runda</p>
                      <h4>{{$birdies}}</h4>
                      <p>Siffran visar rundan med flest birdies</p>


                    </div>
                  </div>
                </div>
    </div>

    <!-- Statistik -->
    <div class="row">
                <div class="col-sm-2 col-md-2 col-md-offset-1">
                    <div class="thumbnail text-center">
                         <i class="fa fa-star-o fa-4x"></i>
                      <div class="caption text-center">
                      <p>Aces</p>
                        <h4>{{$data['ace']}}</h4>
                        <p>Siffran visar totala antalet kast för alla rundor</p>


                      </div>
                    </div>
                  </div>

                    <div class="col-sm-2 col-md-2">
                      <div class="thumbnail text-center">
                             <i class="fa fa-bomb fa-4x"></i>
                          <div class="caption text-center">
                          <p>Albatross</p>
                            <h4>{{$data['albatross']}}</h4>
                            <p>Siffran visar rundan med flest birdies</p>
                          </div>
                        </div>
                      </div>


                  <div class="col-sm-2 col-md-2">
                      <div class="thumbnail text-center">
                           <i class="fa fa-bullseye fa-4x"></i>
                        <div class="caption text-center">
                        <p>Eagles</p>
                          <h4>{{$data['eagle']}}</h4>
                          <p>Siffran visar totala antalet kast för alla rundor</p>


                        </div>
                      </div>
                    </div>

                   <div class="col-sm-2 col-md-2">
                    <div class="thumbnail text-center">
                           <i class="fa fa-smile-o fa-4x"></i>
                        <div class="caption text-center">
                        <p>Birdies</p>
                          <h4>{{$data['birdie']}}</h4>
                          <p>Siffran visar antalet bogeyfria rundor</p>


                        </div>
                      </div>
                    </div>

                       <div class="col-sm-2 col-md-2">
                        <div class="thumbnail text-center">
                               <i class="fa fa-check fa-4x"></i>
                            <div class="caption text-center">
                            <p>Par</p>

                              <h4>{{$data['par']}}</h4>

                              <p>Siffran visar antalet unika banor som spelats</p>


                            </div>
                          </div>
                        </div>


        </div>
        <div class="row">

          <div class="col-sm-2 col-md-2 col-md-offset-1">
                            <div class="thumbnail text-center">
                                   <i class="fa fa-meh-o fa-4x"></i>
                                <div class="caption text-center">
                                <p>Bogeys</p>
                                  <h4>{{$data['bogey']}}</h4>
                                  <p>Siffran visar snittresultat per runda</p>
                                </div>
                              </div>
                            </div>

                  <div class="col-sm-2 col-md-2">
                    <div class="thumbnail text-center">
                           <i class="fa fa-frown-o fa-4x"></i>
                        <div class="caption text-center">
                        <p>Dubbel Bogeys</p>
                          <h4>{{$data['dblbogey']}}</h4>
                          <p>Siffran visar rundan med flest birdies</p>
                        </div>
                      </div>
                    </div>

                  <div class="col-sm-2 col-md-2">
                    <div class="thumbnail text-center">
                           <i class="fa fa-times fa-4x"></i>
                        <div class="caption text-center">
                        <p>Trippel Bogeys</p>
                          <h4>{{$data['trpbogey']}}</h4>
                          <p>Siffran visar rundan med flest birdies</p>
                        </div>
                      </div>
                    </div>

                  <div class="col-sm-2 col-md-2">
                    <div class="thumbnail text-center">
                           <i class="fa fa-trash-o fa-4x"></i>
                        <div class="caption text-center">
                        <p>Quad Bogeys</p>
                          <h4>{{$data['quad']}}</h4>
                          <p>Siffran visar rundan med flest birdies</p>
                        </div>
                      </div>
                    </div>


        </div>
        <!-- End Statistics -->
    </div>
    <div id="sectionF" class="tab-pane fade in">
     <br/>

      <div class="row">
                     <div class="col-lg-12">

        <h4 class=""><i class="fa fa-comments-o"></i> Kommentarer
        @if(Auth::user())
        <button class="btn btn-primary pull-right mb" data-toggle="modal" data-target="#comment">
        Kommentera
        </button>
        @endif
        </h4>

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

    <div class="modal fade bs-example-modal-lg" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myModalLabel">Kommentera</h4>
    </div>

    <div class="modal-body">
    {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
    {{Form::hidden('type_id', $user->id)}}
    {{Form::hidden('model', 'user')}}
    <div class="form-group">
    <label class="col-sm-2 col-sm-2 control-label">Kommentar</label>
    <div class="col-sm-10">

    {{Form::text('body', '', ['class'=>'form-control'])}}
    </div>
    </div>


    <div class="modal-footer">
    {{Form::submit('Save Comment', ['class'=>'btn btn-primary'])}}
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
</div></div>

@if(count($sponsors) == 0)

@else
<div class="showback">
<div class="row">

<div class="col-lg-12">

    <h4>Sponsorer</h4>

     @foreach($sponsors as $sponsor)

    <div class="col-lg-3">
     <a href="/sponsor/{{$sponsor->id}}/redirect/" target="_blank"><img src="{{$sponsor->image}}" class="img-thumbnail" width="100%"/></a>
     </div>

     @endforeach


<div class="col-lg-12"></div>

@endif


@stop
