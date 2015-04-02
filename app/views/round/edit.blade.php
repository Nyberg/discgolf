@extends('db')

@section('content')

	<div class="showback">

        <h2 class="text-center page-header-custom">Redigera runda</h2>
        <div class="divider-header"></div>
      <div class="form-horizontal style-form">


       {{Form::model($round, ['method'=>'PATCH', 'route'=> ['round.update', $round->id]])}}
       {{Form::hidden('tee_id', $tee->id)}}

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