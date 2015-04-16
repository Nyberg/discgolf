@extends('master')

@section('content')

<div class="row">
  <div class="col-lg-12">
  {{Form::open(['route' => 'searchresult', 'method' => 'GET', 'class' => ''])}}
    <div class="input-group">
      <input type="text" class="form-control"  name="auto" id="auto" placeholder="Sök banor efter namn..">
            <span class="input-group-btn">
              {{Form::button('<i class="fa fa-search"></i>', ['type'=>'submit', 'class' => 'btn btn-default'])}}
            </span>
    </div><!-- /input-group -->
       {{Form::close()}}
  </div><!-- /.col-lg-6 -->

</div>

<!--
<div class="row-fluid">
-->
<!-- Place somewhere in the <body> of your page -->
<!--
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="img/slide/forshaga.jpg" />
      <p class="flex-caption">Allt du behöver veta om banor!</p>
    </li>
        <li>
          <img src="img/slide/stat_1.png" />
          <p class="flex-caption">Statistik för varje bana!</p>
        </li>
    <li>
      <img src="img/slide/stat_2.png" />
      <p class="flex-caption">Jämför upp till 10 rundor samtidigt!</p>
    </li>
  </ul>
</div>
</div>

-->

<div class="row hidden-phone">
<hr class="divider"/>
    <h1 class="text-center">Välkommen {{Auth::user()->first_name}}!</h1>
    <h4 class="text-center">Vad vill du göra?</h4>
    <div class="col-sm-10 col-md-offset-1 col-md-offset-right-1 text-center">
                     <a href="/forum">
                        <div class="col-sm-3 col-md-3">
                              <div class="thumbnail dark">
                                <div class="caption text-center">
                                    <i class="fa fa-comments fa-4x white"></i>
                                    <h3 class="white">
                                        Forum
                                    </h3>
                                    <h5 class="white">Besök Forumet</h5>
                               </div>
                              </div>
                        </div>
                    </a>

                    <a href="/rounds">
                    <div class="col-sm-3 col-md-3">
                          <div class="thumbnail theme-green">
                            <div class="caption text-center">
                                <i class="fa fa-trophy fa-4x white"></i>
                                <h3 class="white">
                                    Rundor
                                </h3>
                                <h5 class="white">Se rundor</h5>

                           </div>
                          </div>
                    </div>
                    </a>
                    <a href="/courses">
                    <div class="col-sm-3 col-md-3">
                          <div class="thumbnail theme-green">
                            <div class="caption text-center">
                                <i class="fa fa-tree fa-4x white"></i>
                                <h3 class="white">
                                    Banor
                                </h3>
                                <h5 class="white">Se banor</h5>

                           </div>
                          </div>
                    </div>
                    </a>

                    <a href="/statistics">
                        <div class="col-sm-3 col-md-3">
                              <div class="thumbnail dark">
                                <div class="caption text-center">
                                    <i class="fa fa-area-chart fa-4x white"></i>
                                    <h3 class="white">
                                        Statistik
                                    </h3>
                                     <h5 class="white">Studera lite siffror</h5>

                               </div>
                              </div>
                        </div>
                    </a>

    </div>
</div>

<div class="row">
    <hr class="divider"/>


    <div class="col-md-12" id="#sectionA">
    <h1 class="text-center">Senaste nyheterna</h1>

            <br/>
        @foreach($news as $new)

            <div class="col-sm-4">
                <img src="{{$new->image}}" alt="" width="100%"/>
            <span class="news-header-front">
                <h5 class="news-head grey"><a href="/news/{{$new->id}}/show">{{$new->head}}</a></h5>
            </span>
            <p class="margin-top-bottom">{{Str::limit(strip_tags($new->body), 140)}}</p>
            <p class="news-link margin-top-bottom"><i class="fa fa-chevron-circle-right green"></i> <a href="/news/{{$new->id}}/show"> Läs mer | <i class="fa fa-calendar"></i> {{$new->created_at->format('Y-m-d')}} | <i class="fa fa-comments-o"></i> {{count($new->comments)}}</a></p>
            </div>

        @endforeach

    </div>
    </div>

    <div class="row">
        <hr class="divider"/>
        <div class="col-md-12">

              <h1 class="text-center">Senast spelade rundorna</h1>

                <br/>

                @foreach($rounds as $round)

                <a href="/round/{{$round->id}}/course/{{$round->course_id}}">
                    <div class="col-sm-3 col-md-3">
                          <div class="thumbnail">
                            <div class="caption text-center">
                                <h1 class="green">{{calcScore($round->total, $round->tee->par)}}</h1>
                                <h4 class="">
                                    {{$round->course->name . ' - ' . $round->tee->color}}
                                </h4>
                                <p>{{$round->date . ' av ' . $round->user->first_name . ' ' . $round->user->last_name}}</p>
                           </div>
                          </div>
                    </div>
                </a>

                @endforeach

            </div>

        </div>

@stop