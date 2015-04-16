@extends('db')


@section('content')


     		<div class="showback">
      @if(count($rounds) == 0)

      @else
       <h2 class="text-center page-header-custom">Dina Rundor</h2>
       <div class="divider-header"></div>
            <p class="text-center">Här ligger alla rundor efter att dom lagts till. När du klickar på <a href="#" class="btn btn-xs btn-success">Markera som aktiv</a> kan du inte ändra ditt resultat på rundan. Rundan kan inte heller tas bort för tillfället. Detta för att modulen med rekordrundor ska fungera korrekt.</p>

      <table class="table table-hover">
          <thead>
          <tr>

           <th>Datum</th>
            <th>Användare</th>
            <th>Bana</th>
            <th>Typ</th>
            <th>Resultat</th>
            <th>Redigera</th>
            <th>Aktiv</th>
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
           <td><a href="/account/round/{{$round->id}}/edit/{{$round->course_id}}"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
            <td><a href="/account/round/{{$round->id}}/active" class="btn btn-sm btn-success">Markera som aktiv</a></td>
            <td>

             {{Form::open(['method'=>'DELETE', 'route'=>['round.destroy', $round->id]])}}
             {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
             {{Form::close()}}

            </td>
           </tr>
           @endforeach
          </tbody>
      </table>
      @endif

 <h2 class="text-center page-header-custom"> Dina Aktiva rundor</h2>
 <div class="divider-header"></div>

     @if(count($actives) == 0)
        <p class="text-center">Du har inga aktiva rundor än.</p>
     @else

            <table class="table table-hover">
                <thead>
                <tr>

                 <th>Datum</th>
                  <th>Användare</th>
                  <th>Bana</th>
                  <th>Typ</th>
                  <th>Resultat</th>
                </tr>

                </thead>
                <tbody>
                @foreach($actives as $ac)
                 <tr>
                  <td><a href="/round/{{$ac->id}}/course/{{$ac->course_id}}">{{$ac->created_at->format('Y-m-d')}}</a></td>
                  <td><a href="/user/{{$ac->user_id}}/show">{{$ac->user->first_name . ' ' . $ac->user->last_name}}</a></td>
                  <td><a href="/course/{{$ac->course_id}}/show">{{$ac->course['name'] . ' - ' . $ac->tee['color']}}</a></td>
                  <td>{{$ac->type}}

                  @if($ac->type == 'Par')

                  @else
                  @endif
                  </td>
                  <td>{{calcScore($ac->total, $ac->tee['par'])}}</td>
                  </tr>
                 @endforeach
                </tbody>
            </table>
@endif
      </div>

@stop