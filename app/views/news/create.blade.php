@extends('master')

@section('content')

    {{Form::open(['route'=>'news.store', 'class'=>'form-horizontal style-form'])}}
            <h4 class="tab-rub">Lägg till nyhet</h4>

            <div class="form-group">
             <label class="col-sm-12 col-sm-12 control-label">Rubrik</label>
             <div class="col-sm-12">

                 {{Form::text('head', '', ['class'=>'form-control'])}}
                 {{errors_for('head', $errors)}}
             </div>
            </div>

           <div class="form-group">
                 <label class="col-sm-12 col-sm-12 control-label">Inlägg</label>
                 <div class="col-sm-12">

                     {{Form::textarea('body', '', ['class'=>'form-control'])}}
                     {{errors_for('body', $errors)}}
                 </div>
             </div>

         {{Form::submit('Spara nyhet', ['class'=>'btn btn-success'])}}
    {{Form::close()}}
@stop