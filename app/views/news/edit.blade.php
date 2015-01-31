@extends('master')

@section('content')

    {{Form::model($news, ['method'=>'PATCH', 'route'=> ['news.update', $news->id]])}}
            <h4 class="tab-rub">Redigera nyhet</h4>

            <div class="form-group">
             <label class="col-sm-12 col-sm-12 control-label">Rubrik</label>
             <div class="col-sm-12">

                 {{Form::text('head', null, ['class'=>'form-control'])}}
                 {{errors_for('head', $errors)}}
             </div>
            </div>

           <div class="form-group">
                 <label class="col-sm-12 col-sm-12 control-label">Inlägg</label>
                 <div class="col-sm-12">

                     {{Form::textarea('body', null, ['class'=>'form-control'])}}
                     {{errors_for('body', $errors)}}
                 </div>
             </div>

             <div class="form-group">

         {{Form::submit('Uppdatera nyhet', ['class'=>'btn btn-success'])}}
            {{Form::close()}}

    </div>
@stop