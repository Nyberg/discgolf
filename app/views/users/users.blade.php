@extends('master')


@section('content')

  <h2 class="text-center page-header-custom">Användare</h2>
  <div class="divider-header"></div>

  <table class="table table-striped table-advance table-hover">

      <thead>
      <tr>
          <th>Användare</th>
          <th>Medlem sedan</th>
          <th>Klubb</th>
          <th>Rundor</th>
      </tr>
      </thead>
      <tbody>

      @foreach($users as $user)

      <tr>
          <td><a href="/user/{{$user->id}}/show">{{$user->first_name .' '. $user->last_name}}</a></td>
          <td>{{$user->created_at->format('Y-m-d')}}</td>
          <td><a href="/club/{{$user->club_id}}/show">{{$user->club->name}}</a></td>
          <td> <a href="/round/{{$user->id}}/user/show">{{count($user->round)}}</a></td>
      </tr>

      @endforeach

      </tbody>
  </table>

<div class="row">
    <div class="col-sm-12 text-center">
    {{$users->links()}}
    </div>
</div>


@stop
