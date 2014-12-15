@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="form-panel">

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Round</h4>
                  	  <div class="form-horizontal style-form">



                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"> {{$course->name}}</label>
                              <div class="col-sm-10">

                              </div>
                          </div>

                          <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Comment</label>
                                  <div class="col-sm-10">

                                    </div>
                          </div>


                              <br/>
                              <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Score</h4>
                              <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Length</th>
                                  <th>Par</th>
                                  <th>Score</th>

                                  <th>Edit</th>

                              </tr>
                              </thead>
                              <tbody>
                            @foreach($round->score as $score)
                              <tr>
                                  <td>{{$score->hole->number}}</td>
                                  <td>{{convert($score->hole->length)}}</td>
                                  <td>{{$score->par}}</td>
                                  <td>{{$score->score}}</td>



                                  <td><a href="/admin/score/{{$score->id}}/edit"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
                                @endforeach
                              </tr>


                              </tbody>
                          </table>
</div>
                      </div>
            </div>



		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop