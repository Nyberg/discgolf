@extends('master')

@section('content')

                 <h4 class="mb"><i class="fa fa-angle-right"></i> All Clubs</h4>
         <table class="table table-hover">
         <thead>
         <th>Name</th>
         <th>Location</th>
          <th>Website</th>
          <th>Edit</th>
          <th>Delete</th>
         </thead>
         <tbody>
                @foreach($clubs as $club)

                <tr>
                <td><a href="/club/{{$club->id}}/show">{{$club->name}}</a></td>
                <td>{{$club->city . ', '. $club->state . ', ' . $club->country}}</td>
                <td>{{$club->website}}</td>
                 <td>

                     <a href="/admin/club/{{$club->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                    </td>
                    <td>
                     {{Form::open(['method'=>'DELETE', 'route'=>['club.destroy', $club->id]])}}
                     {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
                     {{Form::close()}}

                     </td>
                </tr>

                @endforeach
                      </tbody>
                                              </table>



@stop