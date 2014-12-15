@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          		 <div class="form-panel">

          		 <h4><i class="fa fa-angle-right"></i> Edit Score - Basket {{$score->hole->number}}</h4><hr>
                   <div class="form-horizontal style-form">
            {{Form::model($score,['method'=>'PATCH', 'route'=> ['score.update', $score->id]])}}
            {{Form::hidden('round_id', $score->round_id)}}
                      <div class="form-group">
                        <label class="col-sm-1 col-sm-1 control-label">Score</label>
                                                 <div class="col-sm-3">
                                              {{Form::number('score', null, ['class'=>'form-control'])}}
                                                </div>
                          <label class="col-sm-1 col-sm-1 control-label">Length</label>
                             <div class="col-sm-3">
                                       {{Form::number('length', $score->hole->length, ['class'=>'form-control','readonly'])}}
                            </div>

                              <label class="col-sm-1 col-sm-1 control-label">Par</label>
                                 <div class="col-sm-3">
                                           {{Form::number('par', $score->hole->par, ['class'=>'form-control','readonly'])}}
                                </div>


                       </div>


             {{Form::submit('Update Score', ['class'=>'btn btn-primary'])}}
             {{Form::close()}}
                </div>
          		</div><!-- col-lg-12-->
    	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop