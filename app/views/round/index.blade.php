@extends('master')


@section('content')


                          <h4><i class="fa fa-angle-right"></i> All Rounds</h4><hr>
                          <table class="table table-hover">
                              <thead>
                              <tr>

                               <th>Date</th>
                                <th>Player</th>

                                <th>Course</th>
                                <th>Score</th>

                              </tr>

                              </thead>
                              <tbody>
                              @foreach($rounds as $round)
                               <tr>
                                <td>{{$round->created_at->format('Y-m-d')}}</td>
                                <td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
                                <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
                                <td>{{$round->total}}</td>

                               </tr>
                               @endforeach
                              </tbody>
                          </table>



@stop