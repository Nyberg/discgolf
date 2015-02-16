@extends('db')

@section('content')
<div class="showback">
    <div class="row">
        <div class="col-md-12">
              <h2 class="text-center page-header-custom">Länkar</h2>
              <div class="divider-header"></div>
        </div>

        <div class="col-md-12">


              <a class="btn btn-default" href="/admin/link/add">Lägg till</a>


        </div>

        <div class="col-md-12">

        <table class="table table-hover">
             <thead>
                    <th>Namn</th>
                    <th>Länk</th>
                    <th>Klick</th>
                    <th>Redigera</th>
                    <th>Ta bort</th>
             </thead>
             <tbody>
                @foreach($links as $link)
                <tr>
                    <td><a href="{{$link->url}}">{{$link->name}}</a></td>
                    <td>{{$link->url}}</td>
                    <td>{{$link->clicks}}</td>
                    <td><a href="/admin/link/{{$link->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
                    <td>
                    {{Form::open(['method'=>'DELETE', 'route'=>['links.destroy', $link->id]])}}
                    {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                    {{Form::close()}}
                    </td>
                </tr>
                @endforeach
              </tbody>
          </table>

        </div>

    </div>
</div>

@stop