@extends('master')

@section('content')

         <h2 class="text-center page-header-custom">Alla rundor spelade vid {{$course->name}}</h2>
         <div class="divider-header"></div>
<table class="table table-hover">
<thead>
<tr>

<th>Datum</th>
<th>Användare</th>
<th>Tee</th>
<th>Typ</th>
<th>Resultat</th>

</tr>

</thead>
<tbody>
@foreach($rounds as $round)
<tr>
<td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
@if($round->type == 'Singel')
<td><a href="/user/{{$round->user_id}}/show">{{$round->user->first_name . ' ' . $round->user->last_name}}</a></td>
@else
<td>{{showPar($round->par_id, $round->user_id)}}</td>
@endif
<td>{{$round->tee['color']}}</td>
<td>{{$round->type}}</td>
<td>{{calcScore($round->total, $round->tee->par)}}</td>
</tr>
@endforeach
</tbody>
</table>

@stop