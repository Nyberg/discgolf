@extends('master')

@section('content')

         <h4><i class="fa fa-angle-right"></i> Banor</h4>
              <div class="row">
           <img class="" src="/img/header-page.jpg" width="100%" height="60%"/>
            </div>
         <table class="table table-hover">
         <thead>
         <th>Namn</th>
         <th>Location</th>
         <th>Tees</th>
         <th>Rundor</th>
         </thead>
         <tbody>
                @foreach($courses as $course)

                <tr>
                <td><a href="/course/{{$course->id}}/show">{{$course->name}}</a></td>
                <td>{{$course->city . ', '. $course->state . ', ' . $course->country}}</td>
                <td>
                @foreach($course->tee as $tee)
                {{$tee->color}}
                @endforeach
                </td>
                <td>{{count($course->round)}}</td>
                </tr>

                @endforeach
                      </tbody>
                                              </table>



@stop