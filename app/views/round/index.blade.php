@extends('master')

@section('content')

  <h4 class="mb"><i class="fa fa-angle-right"></i> Rundor</h4>
      <div class="row">
        <img class="" src="/img/header-page.jpg" width="100%" height="60%"/>
      </div>
  <table class="table table-hover">
      <thead>
      <tr>

       <th>Datum</th>
        <th>Användare</th>

        <th>Bana</th>
        <th>Resultat</th>

      </tr>

      </thead>
      <tbody>
      @foreach($rounds as $round)
       <tr>
        <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
        <td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
        <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
        <td>{{calcScore($round->total, $round->course['par'])}}</td>
       </tr>
       @endforeach
      </tbody>
  </table>

@stop