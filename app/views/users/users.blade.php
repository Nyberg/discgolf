@extends('master')


@section('content')

      <h4 class="mb"><i class="fa fa-angle-right"></i> Användare</h4>
          <div class="row">
             <img class="" src="/img/header-page.jpg" width="100%" height="60%"/>
          </div>
      <table class="table table-hover">
          <thead>
              <tr>
                <th>Namn</th>
                <th>Medlem sedan</th>
                <th>Pdga</th>
                <th>Pdga Rating</th>
                <th>Antal rundor</th>
              </tr>
          </thead>
          <tbody>
              @foreach($users as $user)
               <tr>
                <td><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></td>
                <td>{{$user->created_at->format('Y-m-d')}}</td>
                <td>#1000000</td>
                <td>900</td>
                <td>10</td>
               </tr>
               @endforeach
          </tbody>
      </table>

@stop