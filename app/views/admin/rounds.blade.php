@extends('db')
@section('content')
<div class="showback">

       <h2 class="text-center page-header-custom">Alla Rundor</h2>
       <div class="divider-header"></div>

      <table class="table table-hover">
          <thead>
          <tr>

           <th>Datum</th>
            <th>Användare</th>
            <th>Bana</th>
            <th>Typ</th>
            <th>Resultat</th>
            <th>Status</th>
            <th>Ta bort</th>

          </tr>

          </thead>
          <tbody>
          @foreach($rounds as $round)
           <tr>
            <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
            <td><a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a></td>
            <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name'] . ' - ' . $round->tee['color']}}</a></td>
            <td>{{$round->type}}

            @if($round->type == 'Par')

            @else
            @endif
            </td>
            <td>{{calcScore($round->total, $round->tee['par'])}}</td>
            <td>{{$round->status}}</td>
           <td>

             {{Form::open(['method'=>'DELETE', 'route'=>['round.destroy', $round->id]])}}
             {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
             {{Form::close()}}

            </td>
           </tr>
           @endforeach
          </tbody>
      </table>


             <h2 class="text-center page-header-custom">Alla Rekordrundor</h2>
             <div class="divider-header"></div>

            <table class="table table-hover">
                <thead>
                <tr>

                 <th>Datum</th>
                  <th>Användare</th>
                  <th>Bana</th>
                  <th>Typ</th>
                  <th>Resultat</th>
                  <th>Status</th>
                  <th>Ta bort</th>

                </tr>

                </thead>
                <tbody>
                @foreach($records as $round)
                 <tr>
                  <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
                  <td><a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a></td>
                  <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name'] . ' - ' . $round->tee['color']}}</a></td>
                  <td>{{$round->type}}

                  @if($round->type == 'Par')

                  @else
                  @endif
                  </td>
                  <td>{{calcScore($round->total, $round->tee['par'])}}</td>
                  <td>{{$round->status}}</td>
                 <td>

                   {{Form::open(['method'=>'DELETE', 'route'=>['record.destroy', $round->id]])}}
                   {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                   {{Form::close()}}

                  </td>
                 </tr>
                 @endforeach
                </tbody>
            </table>

      @stop