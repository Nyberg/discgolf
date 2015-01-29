@extends('db')


@section('content')

          <div class="showback">

          <h4 class=""><i class="fa fa-angle-right"></i> Ansökningar</h4>

          @if(count($club->membership) == 0)

            <p>Inga ansökningar.</p>

          @else

          <table class="table table-hover">
              <thead>
                  <tr>
                    <th>Namn</th>
                    <th>Medlem sedan</th>
                    <th>Antal rundor</th>
                    <th>Neka</th>
                    <th>Godkänn</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($club->membership as $mem)
                   <tr>
                    <td><a href="/user/{{$mem->user->id}}/show">{{$mem->user->first_name . ' ' . $mem->user->last_name}}</a></td>
                    <td>{{$mem->user->created_at->format('Y-m-d')}}</td>
                    <td>{{count($mem->user->rounds)}}</td>
                    <td><a href="/admin/deny/{{$mem->user_id}}/club/" class="btn btn-danger btn-xs"><i class="fa fa-ban"></i></a></td>
                    <td><a href="/admin/accept/{{$mem->user_id}}/club/{{$mem->club_id}}/" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a></td>
                   </tr>
                   @endforeach
              </tbody>
          </table>

          @endif

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