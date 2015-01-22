

@extends('master')

@section('content')



  <h4><i class="fa fa-angle-right"></i> Courses Admin</h4>

     <div class="row">
          <div class="col-lg-12">
             <a href="/admin/course/add"><span class="btn btn-primary">Lägg till Bana</span></a>
          </div>
       </div>

  <table class="table table-striped table-advance table-hover">


      <thead>
      <tr>
          <th><i class="fa fa-tree"></i> Course</th>
          <th class="hidden-phone"><i class="fa fa-globe"></i> Location</th>
          <th><i class="fa fa-bullseye"></i> Holes</th>
          <th><i class=" fa fa-star"></i> Par</th>
          <th>Status</th>
          <th>Edit</th>
          <th>Delete</th>
      </tr>
      </thead>
      <tbody>

      @foreach($courses as $course)

      <tr>
          <td><a href="/course/{{$course->id}}/show">{{$course->name}}</a></td>
          <td>{{$course->city . ', '. $course->state . ', ' . $course->country}}</td>
          <td>{{$course->holes}}</td>
          <td>{{$course->par}}</td>
          <td>{{getStatus($course->status)}}</td>
          <td>

          <a href="/admin/course/{{$course->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
         </td>
         <td>
          {{Form::open(['method'=>'DELETE', 'route'=>['course.destroy', $course->id]])}}
          {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
          {{Form::close()}}

          </td>
      </tr>

      @endforeach

      </tbody>
  </table>

@stop