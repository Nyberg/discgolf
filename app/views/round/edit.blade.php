@extends('master')

@section('content')

      <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Round</h4>
      <div class="form-horizontal style-form">

       {{Form::model($round, ['method'=>'PATCH', 'route'=> ['round.update', $round->id]])}}
       {{Form::hidden('course_id', $course->id)}}

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"> Course</label>
              <div class="col-sm-10">
              {{Form::text('course', $course->name, ['class'=>'form-control', 'readonly'])}}
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Comment</label><br/>
              <div class="col-sm-12">
               {{Form::textarea('comment', null, ['class'=>'form-control'])}}
              </div>
          </div>

       {{Form::submit('Update Round', ['class'=>'btn btn-primary'])}}
       {{Form::close()}}

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
          <th>Add Shots</th>

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
          <td><a href="/shots/{{$round->id}}/add/{{$score->hole_id}}"><span class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></span></a></td>
        @endforeach
      </tr>

      </tbody>
  </table>
     </div>

@stop