@extends('master')

@section('content')

     <h4 class="mb"><i class="fa fa-angle-right"></i> Klubbägare</h4>
     <div class="row">
        <div class="col-lg-12">
        </div>
     </div>
         <table class="table table-hover">
             <thead>
                 <th>Namn</th>
                 <th>Klubb</th>
                 <th>Rättigheter</th>
             </thead>
         <tbody>
            @foreach($users as $user)
            <tr>
                <td><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></td>
                <td><a href="/club/{{$user->club['id']}}/show">{{$user->club['name']}}</a></td>
                <td><a href="/admin/user/{{$user->id}}/roles/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-key"></i></button></a></td>
            </tr>
            @endforeach
          </tbody>
      </table>

@stop