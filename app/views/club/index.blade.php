@extends('master')

@section('content')

                 <h4 class="mb"><i class="fa fa-angle-right"></i> All Courses</h4>
         <table class="table table-hover">
         <thead>
         <th>Name</th>
         <th>Location</th>
          <th>Website</th>
          <th>Members</th>
         </thead>
         <tbody>
                @foreach($clubs as $club)

                <tr>
                <td><a href="/club/{{$club->id}}/show">{{$club->name}}</a></td>
                <td>{{$club->city . ', '. $club->state . ', ' . $club->country}}</td>
                <td>{{$club->website}}</td>
                <td></td>
                <td></td>
                </tr>

                @endforeach
                      </tbody>
                                              </table>



@stop