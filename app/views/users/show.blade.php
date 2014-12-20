@extends('master')


@section('content')

  <h4><i class="fa fa-angle-right"></i> {{$user->first_name .' '.Auth::user()->last_name}}</h4>
        <div class="row">
     <img class="" src="/img/dg/bulltofta1.jpg" width="100%"/>
      </div>
  </div>
    </div>
        </div>

    <div class="row">

    <div class="col-lg-8 main-chart">
    <div class="showback">
       <h4><i class="fa fa-angle-right"></i> All Rounds by {{$user->first_name .' '. $user->last_name}}</h4><hr>
          <table class="table table-hover">
              <thead>
              <tr>

               <th>Date</th>
                <th>Course</th>
                <th>Score</th>

              </tr>

              </thead>
              <tbody>
              @foreach($rounds as $round)
               <tr>
                <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
                <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
                <td>{{calcScore($round->total, $round->course['par'])}}</td>

               </tr>
               @endforeach
              </tbody>
          </table>
    </div>
</div>

    <div class="col-lg-4 main-chart">
    <div class="showback">
       <h4><i class="fa fa-angle-right"></i> Favorite Courses</h4><hr>
          <table class="table table-hover">
              <thead>
              <tr>

               <th>Date</th>
                <th>Course</th>
                <th>Score</th>

              </tr>

              </thead>
              <tbody>
              @foreach($rounds as $round)
               <tr>
                <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
                <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
                <td>{{calcScore($round->total, $round->course['par'])}}</td>

               </tr>
               @endforeach
              </tbody>
          </table>
    </div>
</div>

@stop