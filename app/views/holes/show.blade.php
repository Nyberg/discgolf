@extends('master')

@section('content')

  <div class="row">
  <div class="col-md-12">
        <h4 class="text-center page-header-custom">Hål {{$hole->number . ' - '}} <a href="/course/{{$hole->tee->course->id}}/show">{{$hole->tee->course->name}}</a></h4>
            <p class="text-center">Längd: {{convert($hole->length)}} | Par: {{$hole->par}} | Snittresultat: {{round($avg['avg'], 1)}} | Antal kast: {{round($avg['shots'])}}</p>
          <div class="divider-header"></div>
  </div>

    <div class="col-md-12">

    <div class="col-lg-5">
    <div class="panel panel-default">
           <!-- Default panel contents -->
           <div class="panel-heading">Bankarta</div>
            <br/>
            <img src="{{$hole->image}}" class="img-responsive center-block" width="80%;" min-height="60px;"/>
            <br/>
    </div>
    </div>

    <div class="col-lg-7">
        <div class="panel panel-default hidden-phone">
           <!-- Default panel contents -->
           <div class="panel-heading">Senaste resultaten</div>

            <table class="table table-hover">
                  <thead>
                    <tr>
                        <td>Användare</td>
                        <td>Datum</td>
                        <td class="text-center">Resultat</td>
                    </tr>
                </thead>
                <tbody>
                   @foreach($scores as $score)
                   <tr class="">
                   <td><a href="/user/{{$score->user->id}}/show">{{$score->user->first_name . ' ' . $score->user->last_name}}</a></td>
                   <td><a href="/round/{{$score->round->id}}/course/{{$score->round->course_id}}">{{$score->created_at->format('Y-d-m')}}</td>
                   <td class="{{checkScore($score->score, $score->par)}} text-center">{{$score->score}} ({{$score->par}})</td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>
    <!-- Nav-pills -->

    @if(Auth::check())

    <div class="row">

        <div class="col-md-12">
            <div class="row">

            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <ul class="nav nav-pills nav-justified">
                  <li class="active" id="menu_item"><a data-toggle="tab" href="#sectionA">Statistik</a></li>
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
            <input hidden="id" id="id" value="{{$hole->id}}"/>
            <input hidden="model" id="model" value="hole"/>
        </div>
        <div class="row">
        <!-- Sidomeny -->
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-6">
                <div class="row">
                {{Form::open(['method' => 'POST','route' => ['course.stats'],'class' => 'form-inline', 'id' => 'round_avg'])}}
                {{Form::hidden('id', $hole->id, ['id'=>'id'])}}
                {{Form::hidden('model', 'hole', ['id'=>'model'])}}
                {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
                {{Form::submit('Senaste resultaten', ['class' => 'btn btn-red btn-sm btn-block'])}}
                {{Form::close()}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    {{Form::open(['method' => 'POST','route' => ['hole.stats'],'class' => 'form-inline', 'id' => 'user_stat'])}}
                    {{Form::hidden('id', $hole->id, ['id'=>'id'])}}
                    {{Form::hidden('model', 'hole', ['id'=>'model'])}}
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

        @else
        @endif


@stop


@section('scripts')

{{HTML::script('admin_js/stats/stats.js')}}
<script src="http://code.highcharts.com/highcharts.js"></script>

    <script>

    jQuery(document).ready(function($) {

            $('#round_avg').submit(getRoundAvg);
            $('#user_stat').submit(getUserPie);

        });
</script>


@stop