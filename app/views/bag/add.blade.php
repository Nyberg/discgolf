@extends('db')

@section('content')

            <div class="showback">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa Bag</h4>
                  	   {{Form::open(['route'=>'bag.store', 'class'=>'form-horizontal style-form'])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                              <div class="col-sm-10">

                                  {{Form::text('type', '', ['class'=>'form-control'])}}
                                  {{errors_for('type', $errors)}}
                              </div>
                          </div>
                         {{Form::submit('Save', ['class'=>'btn btn-success'])}}
                         {{Form::close()}}
                </div>
            </div>
@stop