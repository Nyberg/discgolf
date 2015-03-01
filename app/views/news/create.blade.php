@extends('db')

@section('content')

    <div class="showback">

    {{Form::open(['route'=>'news.store', 'class'=>'form-horizontal style-form'])}}

         <h2 class="text-center page-header-custom">Skriv Nyhet</h2>
         <div class="divider-header"></div>

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
    </div>
@stop