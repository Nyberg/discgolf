@extends('db')

@section('content')

    <div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Alla tävlingar</h4>
        <div class="divider-header"></div>

         <table class="table table-hover">
             <thead>
                 <th>Namn</th>
                 <th>Datum</th>
                 <th>Klubb</th>
             </thead>
         <tbody>
            @foreach($tours as $tour)
            <tr>
                <td><a href="/tour/{{$tour->id}}/show">{{$tour->name}}</a></td>
                <td>{{$tour->date}}</td>
                <td>{{$tour->club->name}}</td>
            </tr>
            @endforeach
          </tbody>
      </table>

      </div>

@stop