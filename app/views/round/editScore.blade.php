@extends('db')

@section('content')

	<div class="showback">

      <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Kast</h4>
      <table class="table table-hover">
      <thead>
      <tr>
          <th>#</th>
          <th>Längd</th>
          <th>Par</th>
          <th>Resultat</th>
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
          <td><a href="/account/shots/{{$round->id}}/{{checkShot($score->score_added)}}/{{$score->hole_id}}"><span class="btn btn-primary btn-xs"><i class="fa fa-{{setIcon($score->score_added)}}"></i></span></a></td>
        @endforeach
      </tr>

      </tbody>
  </table>
     </div>

@stop