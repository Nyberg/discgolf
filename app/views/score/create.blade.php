@extends('db')

@section('content')

    	<div class="showback">


    <h4><i class="fa fa-angle-right"></i> Skapa Runda - {{$tee->course['name'] . ' - ' . $tee->color}}</h4><hr>
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

        <h4 class="mb"><i class="fa fa-angle-right"></i> Lägg till resultat</h4>
            {{Form::open(['route'=>'round.store', 'class'=>'form-horizontal style-form', 'id'=>'score'])}}
            {{Form::hidden('course_id', $tee->course->id)}}
            {{Form::hidden('holes', $tee->holes)}}
            {{Form::hidden('round_id', $round->id)}}

             <div class="row">

            @foreach($tee->hole as $hole)

            {{Form::hidden('hole_id-'.$hole->number.'', $hole->id)}}

            {{Form::hidden('par-'.$hole->number.'', $hole->par)}}


              <div class="col-sm-3 col-md-3">
                <div class="thumbnail">
                  <div class="caption">

                   {{Form::number('number-'.$hole->number.'', $hole->number, array('class'=>'form-control text-center', 'readonly'))}}
                    {{Form::number('score-'.$hole->number.'', null, ['class'=>'form-control', 'placeholder'=>'Resultat', 'data-validation'=>'number', 'data-validation-allowing'=>'range[1;100]', 'data-validation-error-msg'=>'Du måste ange ett nummer mellan 1 och 100'])}}
                  </div>
                </div>
              </div>

            @endforeach

        </div>
         {{Form::submit('Spara', ['class'=>'btn btn-primary'])}}
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