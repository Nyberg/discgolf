

@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">

          		<div class="col-lg-12">
            <div class="content-panel">
                                      <h4><i class="fa fa-angle-right"></i> Courses Admin</h4><hr><table class="table table-striped table-advance table-hover">


                                          <thead>
                                          <tr>
                                              <th><i class="fa fa-tree"></i> Course</th>
                                              <th class="hidden-phone"><i class="fa fa-globe"></i> Location</th>
                                              <th><i class="fa fa-bullseye"></i> Holes</th>
                                              <th><i class=" fa fa-star"></i> Par</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          <tbody>

                                          @foreach($courses as $course)

                                          <tr>
                                              <td><a href="/course/{{$course->id}}/show">{{$course->name}}</a></td>
                                              <td class="hidden-phone">{{$course->location}}</td>
                                              <td>{{$course->holes}}</td>
                                              <td><span class="label label-info label-mini">{{$course->par}}</span></td>

                                              <td>

                                              <a href="/admin/course/{{$course->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                              {{Form::open(['method'=>'DELETE', 'route'=>['course.destroy', $course->id]])}}
                                              {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
                                              {{Form::close()}}

                                              </td>
                                          </tr>

                                          @endforeach

                                          </tbody>
                                      </table>
                                  </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop