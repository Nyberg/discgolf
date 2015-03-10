@extends('db')

@section('content')

<div class="showback">
      <h2 class="text-center page-header-custom">Redigera Resultat</h2>
            @if($round->status == 1)
              <p class="text-center">Denna rundan är markerad som aktiv och kan därför inte redigeras.</p>
              <br/>
            @else
            @endif
      <div class="divider-header"></div>

      <table class="table table-hover table-responsive text-center">
      <thead>
      <tr>
          <th class="text-center">Hål</th>
          <th class="text-center">Längd</th>
          <th class="text-center">Par</th>
          <th class="text-center">Score</th>
      </tr>
      </thead>
      <tbody>
    @foreach($round->score as $score)

        <tr>
          <td>{{$score->hole->number}}</td>
          <td>{{convert($score->hole->length)}}</td>
          <td>{{$score->par}}</td>
          <td class="{{checkScore($score->score, $score->par)}} text-center">{{$score->score}} ({{$score->par}})</td>
        </tr>
      @endforeach

      </tbody>
  </table>
</div>

@stop