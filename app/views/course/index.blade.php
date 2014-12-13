@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                        <div class="showback">
                            <h4><i class="fa fa-angle-right"></i> Courses</h4>

                            @foreach($courses as $course)
                            <a href="/course/{{$course->id}}/show">
                            <div class="col-md-4 col-sm-4 mb">
                            							<div class="weather pn">
                            								<i class="fa fa-tree fa-4x"></i>
                            								<h2>{{$course->name}}</h2>
                            								<h4>{{$course->location}}</h4>
                            								<h4>Holes: {{$course->holes}} | Par: {{$course->par}}</h4>
                            				            </div>
                            </div>
                            </a>


                            @endforeach


                  	<div class="row mtbox">

                  	</div><!-- /row mt -->
                    </div>
                  </div>
              </div>
          </section>
 </section>

@stop