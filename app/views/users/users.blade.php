@extends('master')


@section('content')

      <h4><i class="fa fa-angle-right"></i> All Users</h4><hr>
      <table class="table table-hover">
          <thead>
          <tr>

            <th>Full Name</th>
            <th>Member Since</th>
            <th>Pdga</th>
            <th>Pdga Rating</th>
            <th>Sponsor</th>
            <th>Rounds</th>

          </tr>

          </thead>
          <tbody>
          @foreach($users as $user)
           <tr>

            <td><a href="/user/{{$user->id}}/show">{{$user->username}}</a></td>
            <td>{{$user->created_at->format('Y-m-d')}}</td>
            <td>#1000000</td>
            <td>900</td>
            <td>Prodigy</td>
            <td>10</td>
           </tr>
           @endforeach
          </tbody>
      </table>

@stop