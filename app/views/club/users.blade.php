@extends('db')


@section('content')

          <div class="showback">

      <h4 class=""><i class="fa fa-angle-right"></i> Medlemmar</h4>
      <table class="table table-hover">
          <thead>
              <tr>
                <th>Namn</th>
                <th>Medlem sedan</th>
                <th>Foruminlägg</th>
                <th>Antal rundor</th>
              </tr>
          </thead>
          <tbody>
              @foreach($club->users as $user)
               <tr>
                <td><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></td>
                <td>{{$user->created_at->format('Y-m-d')}}</td>
                <td>{{count($user->forumcomments)}}</td>
                <td>{{count($user->rounds)}}</td>
               </tr>
               @endforeach
          </tbody>
      </table>

      </div>

@stop