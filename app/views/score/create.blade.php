@extends('db')

@section('content')

    	<div class="showback">

    <div class="col-md-12">
        <h2 class="text-center page-header-custom">Runda - {{$tee->course['name'] . ' - ' . $tee->color}} - {{$round->created_at->format('Y-m-d')}}</h2>
        <div class="divider-header"></div>
        @if($round->type == 'Group')
        <p class="text-center">Detta är en grupprunda med:
        @foreach($round->group->rounds as $r)
        <br/>
        <a href="/user/{{$r->user_id}}/show">{{$r->username}}</a>
        @endforeach
        </p>

        @else
        @endif

    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3"></div>
            <div class="col-md-3 text-center">
                <img src="{{$round->weather->image}}" alt="" width="80px" class="text-center"/>
                <p class="text-center">{{$round->weather->name}}</p>
            </div>
            <div class="col-md-3 text-center">
                <img src="/img/weather/flag.png" alt="" width="80px" class="text-center"/>
                <p class="text-center">{{$round->wind->name}}</p>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

     <hr class="divider row"/>

      <table class="table table-hover">


          <thead>
          <tr>
            <th>Hål</th>
            @foreach($tee->hole as $hole)
            <td>{{$hole->number}}</td>
            @endforeach
          </tr>

          </thead>
          <tbody>
           <tr>
           <th>Par</th>
           @foreach($tee->hole as $hole)
           <td>{{$hole->par}}</td>


            @endforeach
           </tr>
           <tr>
           <th>Längd</th>
           @foreach($tee->hole as $hole)
           <td>{{$hole->length}}m</td>
           @endforeach
           </tr>
          </tbody>
      </table>

         <hr class="divider row"/>

        <h2 class="text-center page-header-custom">Lägg till resultat</h2>
        <div class="divider-header"></div>

            {{Form::open(['route'=>'round.store', 'class'=>'form-horizontal style-form', 'id'=>'score'])}}
            {{Form::hidden('course_id', $tee->course->id)}}
            {{Form::hidden('holes', $tee->holes)}}
            {{Form::hidden('round_id', $round->id)}}

        <div class="row">

            @foreach($tee->hole as $hole)

            {{Form::hidden('hole_id-'.$hole->number.'', $hole->id)}}
            {{Form::hidden('par-'.$hole->number.'', $hole->par)}}

              <div class="col-sm-2 col-md-2">
                <div class="thumbnail">
                  <div class="caption">
                    {{Form::number('number-'.$hole->number.'', $hole->number, array('class'=>'form-control text-center', 'readonly'))}}
                    {{Form::number('score-'.$hole->number.'', null, ['class'=>'form-control', 'placeholder'=>'Resultat', 'data-validation'=>'number', 'data-validation-allowing'=>'range[1;100]', 'data-validation-error-msg'=>'Du måste ange ett nummer mellan 1 och 100'])}}
                  </div>
                </div>
              </div>

            @endforeach

        </div>
            {{Form::submit('Spara', ['class'=>'btn btn-success btn-sm center-block'])}}
            {{Form::close()}}
        </div>


@stop


@section('scripts')

    <script>

    $.validate({
      form : '#score'
    });

    </script>

@stop