@extends('master')


@section('content')

      <h4><i class="fa fa-angle-right"></i> All Your Bags</h4><hr>
      <table class="table table-hover">
          <thead>
          <tr>

           <th>Type</th>
            <th>Discs</th>
            <th>Edit</th>
            <th>Delete</th>

          </tr>

          </thead>
          <tbody>
          @foreach($bags as $bag)
           <tr>
           <td>{{$bag->type}}</td>
           <td>{{$bag->discs}}</td>
               <td><a href="/bag/{{$bag->id}}/edit/"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>

            <td>

             {{Form::open(['method'=>'DELETE', 'route'=>['bag.destroy', $bag->id]])}}
             {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
             {{Form::close()}}

            </td>
           </tr>
           @endforeach
          </tbody>
      </table>

      <a href="/bag/add"><span class="btn btn-primary">Add Another Bag</span></a>


@stop