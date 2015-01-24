@extends('db')

@section('content')

	<div class="showback">

      <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Runda</h4>
      <div class="form-horizontal style-form">


       {{Form::model($round, ['method'=>'PATCH', 'route'=> ['round.update', $round->id]])}}
       {{Form::hidden('course_id', $course->id)}}

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label"> Bana</label>
              <div class="col-sm-10">
              {{Form::text('course', $course->name, ['class'=>'form-control', 'readonly'])}}
              </div>
          </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label"> Status</label>
                <div class="col-sm-10">
                {{Form::select('status', ['0'=>'Dold', '1'=>'Aktiv'],$round->status, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                 <span class="help-block">Välj om rundan ska visas för andra eller inte. Vid dold döljs den även i statistiken.</span>
                </div>

            </div>

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Kommentar</label><br/>
              <div class="col-sm-12">
               {{Form::textarea('comment', null, ['class'=>'form-control'])}}
              </div>
          </div>

       {{Form::submit('Update Round', ['class'=>'btn btn-primary'])}}
       {{Form::close()}}

      <br/>
      <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Resultat</h4>
      <table class="table table-hover">
      <thead>
      <tr>
          <th>#</th>
          <th>Längd</th>
          <th>Par</th>
          <th>Resultat</th>

          <th>Redigera</th>
          <th>Kast</th>

      </tr>
      </thead>
      <tbody>
    @foreach($round->score as $score)

    <tr>
          <td>{{$score->hole->number}}</td>
          <td>{{convert($score->hole->length)}}</td>
          <td>{{$score->par}}</td>
          <td>{{$score->score}}</td>

          <td><a href="/account/score/{{$score->id}}/edit"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>


          <td><a href="/account/shots/{{$round->id}}/{{checkShot($score->score_added)}}/{{$score->hole_id}}"><span class="btn btn-primary btn-xs"><i class="fa fa-{{setIcon($score->score_added)}}"></i></span></a></td>
        @endforeach
      </tr>

      </tbody>
  </table>
     </div>

@stop