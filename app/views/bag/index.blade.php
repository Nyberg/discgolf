@extends('ob')


@section('content')

    <div class="showback">
      <h4><i class="fa fa-angle-right"></i> Dina Bags</h4><hr>
      <table class="table table-hover">
          <thead>
          <tr>

           <th>Namn</th>
            <th>Discs</th>
            <th>Användare</th>

          </tr>

          </thead>
          <tbody>
          @foreach($bags as $bag)
           <tr>
           <td><a href="/bag/{{$bag->id}}/show">{{$bag->type}}</a></td>
           <td></td>
           <td><a href="/user/{{$bag->user->id}}/show">{{$bag->user->first_name. ' ' . $bag->user->last_name}}</a></td>


           </tr>
           @endforeach
          </tbody>
      </table>
    </div>

@stop