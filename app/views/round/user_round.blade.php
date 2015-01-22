@extends('master')


@section('content')

      <h4><i class="fa fa-angle-right"></i> Dina rundor</h4><hr>
      <table class="table table-hover">
          <thead>
          <tr>

           <th>Datum</th>
            <th>Användare</th>
            <th>Bana</th>
            <th>Resultat</th>
            <th>Redigera</th>
            <th>Ta bort</th>

          </tr>

          </thead>
          <tbody>
          @foreach($rounds as $round)
           <tr>
            <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
            <td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
            <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
            <td>{{calcScore($round->total, $round->course['par'])}}</td>
           <td><a href="/account/round/{{$round->id}}/edit/{{$round->course_id}}"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>

            <td>

             {{Form::open(['method'=>'DELETE', 'route'=>['round.destroy', $round->id]])}}
             {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
             {{Form::close()}}

            </td>
           </tr>
           @endforeach
          </tbody>
      </table>


@stop