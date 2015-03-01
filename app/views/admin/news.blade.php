

@extends('db')

@section('content')

    <div class="showback">
                  <h2 class="text-center page-header-custom">Nyheter</h2>
                  <p class="text-center"><a href="/admin/add/news">Skapa nyhet</a></p>
                  <div class="divider-header"></div>


  <table class="table table-striped table-advance table-hover">


      <thead>
      <tr>
          <th><i class=""></i>Id</th>
          <th>Head</th>
          <th>Skapad</th>
          <th>Edit</th>
          <th>Ta bort</th>
      </tr>
      </thead>
      <tbody>

      @foreach($news as $new)

      <tr>
          <td>{{$new->id}}</td>
          <td><a href="/news/{{$new->id}}/show">{{$new->head}}</a></td>
          <td>{{$new->created_at->format('y-m-d')}}</td>
          <td>
            <a href="/admin/news/{{$new->id}}/edit"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
          </td>
          <td>
              {{Form::open(['method'=>'DELETE', 'route'=>['news.destroy', $new->id]])}}
              {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
              {{Form::close()}}
          </td>
      </tr>

      @endforeach

      </tbody>
  </table>

  </div>



@stop