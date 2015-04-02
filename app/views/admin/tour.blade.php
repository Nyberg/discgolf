@extends('db')

@section('content')

    <div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Alla tävlingar</h4>
        <div class="divider-header"></div>
     <div class="row">
        <div class="col-lg-12">
           <a href="/admin/tour/create"><span class="btn btn-primary">Lägg till Tävling</span></a>
        </div>
     </div>
         <table class="table table-hover">
             <thead>
                 <th>Namn</th>
                 <th>Datum</th>
                  <th>Redigera</th>
                  <th>Ta bort</th>
             </thead>
         <tbody>
            @foreach($tours as $tour)
            <tr>
                <td><a href="/tour/{{$tour->id}}/show">{{$tour->name}}</a></td>
                <td>{{$tour->date}}</td>
                <td><a href="/admin/tour/{{$tour->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
                <td>
                {{Form::open(['method'=>'DELETE', 'route'=>['tour.destroy', $tour->id]])}}
                {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>

      </div>

@stop