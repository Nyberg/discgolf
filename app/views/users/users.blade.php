@extends('master')


@section('content')

              <h2 class="text-center page-header-custom">Användare</h2>
              <p class="text-center">Visar alla användare i ditt län - {{Auth::user()->profile->state->state}}</p>
              <div class="divider-header"></div>

  <table class="table table-striped table-advance table-hover">


      <thead>
      <tr>
          <th>Användare</th>
          <th>Klubb</th>
          <th>Rating</th>
          <th>Rundor</th>
      </tr>
      </thead>
      <tbody>

      @foreach($users as $user)

      <tr>
          <td><a href="/user/{{$user->id}}/show">{{$user->user->first_name .' '. $user->user->last_name}}</a></td>
          <td>{{$user->user->club->name}}</td>
          <td>0</td>
          <td>{{count($user->user->round)}}</td>
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
