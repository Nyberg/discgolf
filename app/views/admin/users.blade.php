

@extends('db')

@section('content')

    <div class="showback">
  <h4><i class="fa fa-angle-right"></i> User Admin</h4>


  <table class="table table-striped table-advance table-hover">


      <thead>
      <tr>
          <th><i class=""></i># Id</th>
          <th class="hidden-phone"><i class="fa fa-user"></i> User</th>
          <th><i class="fa fa-envelope"></i> Email</th>
          <th><i class=" fa fa-gavel"></i> Role</th>
          <th>Edit</th>
          <th>Rättigheter</th>
      </tr>
      </thead>
      <tbody>

      @foreach($users as $user)

      <tr>
          <td>{{$user->id}}</td>
          <td><a href="/user/{{$user->id}}/show">{{$user->first_name .' '. $user->last_name}}</a></td>
          <td>{{$user->email}}</td>
          <td>

      @foreach($user->roles as $role)

          {{$role->name}}
      @endforeach
         </td>

          <td>
            <a href="/user/{{$user->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          </td>
          <td>
          <a href="/admin/user/{{$user->id}}/roles/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-key"></i></button></a>
          </td>
      </tr>

      @endforeach

      </tbody>
  </table>

  </div>



@stop