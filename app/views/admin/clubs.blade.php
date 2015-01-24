@extends('db')

@section('content')

    <div class="showback">

     <h4 class="mb"><i class="fa fa-angle-right"></i> Alla Klubbar</h4>
     <div class="row">
        <div class="col-lg-12">
           <a href="/admin/club/add"><span class="btn btn-primary">Lägg till Klubb</span></a>
        </div>
     </div>
         <table class="table table-hover">
             <thead>
                 <th>Namn</th>
                 <th>Location</th>
                  <th>Hemsida</th>
                  <th>Redigera</th>
                  <th>Ta bort</th>
             </thead>
         <tbody>
            @foreach($clubs as $club)
            <tr>
                <td><a href="/club/{{$club->id}}/show">{{$club->name}}</a></td>
                <td>{{$club->city . ', '. $club->state . ', ' . $club->country}}</td>
                <td>{{$club->website}}</td>
                <td><a href="/admin/club/{{$club->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
                <td>
                {{Form::open(['method'=>'DELETE', 'route'=>['club.destroy', $club->id]])}}
                {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      </div>

@stop