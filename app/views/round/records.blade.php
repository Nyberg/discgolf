@extends('master')


@section('content')

              <h2 class="text-center page-header-custom">Alla rekordrundor</h2>
              <div class="divider-header"></div>

 <table class="table table-hover">
          <thead>
          <tr>

           <th class="hidden-phone">Datum</th>
            <th>Användare</th>
            <th>Bana</th>
            <th class="hidden-phone">Typ</th>
            <th>Resultat</th>
            <th>Rating</th>
          </tr>

          </thead>
          <tbody>
          @foreach($records as $round)
           <tr>
            <td class="hidden-phone"><a href="/round/{{$round->round_id}}/course/{{$round->course_id}}">{{$round->date}}</a></td>
            <td>
            @if($round->type == 'Par')
                            {{showPar($round->par_id, $round->user_id)}}
                        @else
                       <a href="/user/{{$round->user_id}}/show"> {{$round->user->first_name . ' ' . $round->user->last_name}}</a>
                        @endif
            </td>
            <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name'] . ' - ' . $round->tee['color']}}</a></td>
            <td class="hidden-phone">{{$round->type}}
            </td>
            <td>{{calcScore($round->total, $round->tee['par'])}}</td>
            <td>0</td>
           </tr>
           @endforeach
          </tbody>
      </table>


      <div class="row">
          <div class="col-sm-12 text-center">
          {{$records->links()}}
          </div>
      </div>


@stop