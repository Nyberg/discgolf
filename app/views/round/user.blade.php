@extends('master')


@section('content')

      <h2 class="text-center page-header-custom">{{'Rundor av' . ' ' .$user->first_name . ' ' . $user->last_name}}</h2>
      <div class="divider-header"></div>

      <table class="table table-hover">
          <thead>
          <tr>
           <th>Datum</th>
            <th>Bana</th>
            <th>Typ</th>
            <th>Resultat</th>
          </tr>

          </thead>
          <tbody>
          @foreach($rounds as $round)
           <tr>
            <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
            <td><a href="/course/{{$round->course_id}}/show">{{$round->course->name . ' - ' . $round->tee->color}}</a></td>
            <td>{{$round->type}}

            @if($round->type == 'Par')
                {{' | '. getParPlayer($round->par_id, $user->id, $round->user_id)}}
            @else
            @endif
            </td>
            <td>{{calcScore($round->total, $round->tee['par'])}}</td>
           </tr>
           @endforeach
          </tbody>
      </table>

      <div class="row">
        <div class="col-md-12 text-center">

            {{$rounds->links()}}

        </div>
      </div>

@stop