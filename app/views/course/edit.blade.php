@extends('admin/admin')

@section('content')

<section id="main-content">
    <section class="wrapper">

        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Course {{$course->name}}</h4>
                    <div class="form-horizontal style-form">
                    {{Form::model($course, ['method'=>'PATCH', 'route'=> ['course.update', $course->id]])}}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">

                            {{Form::text('name', null, ['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            {{Form::text('country', null, ['class'=>'form-control'])}}
                            <span class="help-block">Please add city and location, example:  Stockholm, Sweden</span>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            {{Form::text('state', null, ['class'=>'form-control'])}}
                            <span class="help-block">Please add city and location, example:  Stockholm, Sweden</span>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            {{Form::text('city', null, ['class'=>'form-control'])}}
                            <span class="help-block">Please add city and location, example:  Stockholm, Sweden</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Holes</label>
                        <div class="col-sm-10">
                            {{Form::number('holes', null, ['class'=>'form-control'])}} </div>

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block">Insert number of holes, example: 18</span>
                        </div>
                    </div>




                     <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Options</label>
                    <div class="col-sm-3">
                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                    {{Form::close()}}
                    </div>
                    <div class="col-sm-3">
                    <a href="/admin/holes/{{$course->id}}/add"><span class="btn btn-primary">Add holes</span></a>
                    </div>
                    </div>
	                          <h4><i class="fa fa-angle-right"></i>  Edit Holes</h4><hr><table class="table table-hover">
                    	                              <thead>
                    	                              <tr>
                    	                                  <th>#</th>
                    	                                  <th>Length</th>
                    	                                  <th>Par</th>

                    	                                  <th>Edit</th>
                    	                                  <th>Delete</th>
                    	                              </tr>
                    	                              </thead>
                    	                              <tbody>
                    	                              @foreach($course->hole as $hole)
                    	                              <tr>
                    	                                  <td>{{$hole->number}}</td>
                    	                                  <td>{{$hole->length}}m</td>
                    	                                  <td>{{$hole->par}}</td>

                    	                                  <td><a href="/admin/holes/{{$hole->id}}/edit"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
                    	                                  <td>{{Form::open(['method'=>'DELETE', 'route'=>['hole.destroy', $hole->id]])}}
                                                        {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
                                                        {{Form::close()}}</td>
                    	                              </tr>
                    	                              @endforeach

                    	                              </tbody>
                    	                          </table>
                    	                  	  </div>



                    </div>

                </div>
                </div>



            </div><!-- col-lg-12-->
        </div><!-- /row -->

    </section><! --/wrapper -->
</section><!-- /MAIN CONTENT -->
@stop