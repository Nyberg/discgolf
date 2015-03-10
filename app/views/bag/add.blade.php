@extends('db')

@section('content')

            <div class="showback">
                  	                   <h2 class="text-center page-header-custom">Skapa Bag</h2>
                                       <div class="divider-header"></div>
                  	   {{Form::open(['route'=>'bag.store', 'class'=>'form-horizontal style-form', 'id'=>'bag'])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                              <div class="col-sm-10">

                                  {{Form::text('type', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                                  {{errors_for('type', $errors)}}
                              </div>
                          </div>
                         {{Form::submit('Spara Bag', ['class'=>'btn btn-success'])}}
                         {{Form::close()}}
                </div>
            </div>
@stop

@section('scripts')

    <script>

    $.validate({
      form : '#bag'
    });

    </script>

@stop