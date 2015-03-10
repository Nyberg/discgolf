@extends('db')

@section('content')

	<div class="showback">

                  <h2 class="text-center page-header-custom">Redigera Resultat - Hål {{$score->hole->number}}</h2>
                  <div class="divider-header"></div>

                   <div class="form-horizontal style-form">
            {{Form::model($score,['method'=>'PATCH', 'route'=> ['score.update', $score->id], 'id'=>'score_update'])}}
            {{Form::hidden('round_id', $score->round_id)}}
                      <div class="form-group">
                        <label class="col-sm-1 col-sm-1 control-label">Resultat</label>

                         <div class="col-sm-3">
                          {{Form::number('score', null, ['class'=>'form-control', 'data-validation'=>'number', 'data-validation-allowing'=>'range[1;100]', 'data-validation-error-msg'=>'Du måste ange ett nummer mellan 1 och 100'])}}
                         </div>

                        <label class="col-sm-1 col-sm-1 control-label">Längd</label>
                        <div class="col-sm-3">
                               {{Form::number('length', $score->hole->length, ['class'=>'form-control','readonly'])}}
                        </div>

                        <label class="col-sm-1 col-sm-1 control-label">Par</label>
                        <div class="col-sm-3">
                               {{Form::number('par', $score->hole->par, ['class'=>'form-control','readonly'])}}
                        </div>


                       </div>


             {{Form::submit('Updatera Resultat', ['class'=>'btn btn-primary'])}}
             {{Form::close()}}
                </div>
    </div>
@stop


@section('scripts')

    <script>

    $.validate({
      form : '#score_update'
    });

    </script>

@stop