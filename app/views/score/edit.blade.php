@extends('db')

@section('content')

	<div class="showback">

          		 <h4><i class="fa fa-angle-right"></i> Redigera Resultat - Hål {{$score->hole->number}}</h4><hr>
                   <div class="form-horizontal style-form">
            {{Form::model($score,['method'=>'PATCH', 'route'=> ['score.update', $score->id]])}}
            {{Form::hidden('round_id', $score->round_id)}}
                      <div class="form-group">
                        <label class="col-sm-1 col-sm-1 control-label">Resultat</label>
                                                 <div class="col-sm-3">
                                              {{Form::number('score', null, ['class'=>'form-control'])}}
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