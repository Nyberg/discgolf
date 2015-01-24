@extends('db')


@section('content')


<div class="showback">

      <h4><i class="fa fa-angle-right"></i> Dina sponsorer</h4><hr>
      <table class="table table-hover">
          <thead>
          <tr>

           <th>Sponsor</th>
           <th>Visningar</th>
           <th>Klicks</th>
            <th>Redigera</th>
            <th>Ta bort</th>

          </tr>

          </thead>
          <tbody>
          @foreach($sponsors as $sponsor)
           <tr>
                <td>{{$sponsor->name}}</td>
                <td>{{$sponsor->views}}</td>
                <td>{{$sponsor->clicks}}</td>
                <td><a href="/account/sponsor/{{$sponsor->id}}/edit/"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
                <td>
                    {{Form::open(['method'=>'DELETE', 'route'=>['sponsor.destroy', $sponsor->id]])}}
                    {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                    {{Form::close()}}
                </td>
           </tr>
           @endforeach
          </tbody>
      </table>

</div>

@stop