@extends('master')

@section('content')

                 <h4 class="mb"><i class="fa fa-angle-right"></i> All Courses</h4>
         <table class="table table-hover">
         <thead>
         <th>Name</th>
         <th>Location</th>
         <th>Holes</th>
         <th>Par</th>
         </thead>
         <tbody>
                @foreach($courses as $course)

                <tr>
                <td><a href="/course/{{$course->id}}/show">{{$course->name}}</a></td>
                <td>{{$course->city . ', '. $course->state . ', ' . $course->country}}</td>
                <td>{{$course->holes}}</td>
                <td>{{$course->par}}</td>
                </tr>

                @endforeach
                      </tbody>
                                              </table>



@stop