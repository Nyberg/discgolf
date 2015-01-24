@extends('db')

@section('content')

<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera recension - {{$review->head}}</h4>
  <div class="form-horizontal">
     {{Form::model($review, ['method'=>'PATCH', 'route'=> ['review.update', $review->id]])}}

         <div class="form-group">
             <label class="col-sm-2 col-sm-2 control-label">Välj bana att recensera</label>
             <div class="col-sm-10">

               {{Form::select('id', $courses,$review->course_id,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                 {{errors_for('id', $errors)}}
             </div>
         </div>

       <div class="form-group">
           <label class="col-sm-2 col-sm-2 control-label">Rubrik</label>
           <div class="col-sm-10">

              {{Form::text('head', null, ['class'=>'form-control'])}}
            {{errors_for('head', $errors)}}
           </div>
       </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Din recension</label>
          <div class="col-sm-12">

            {{Form::textarea('body', null)}}
             {{errors_for('body', $errors)}}

          </div>
      </div>

        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Ditt betyg</label>
            <div class="col-sm-12">

               {{Form::select('rating', ['1'=>'1','2'=>'2', '3'=>'3','4'=>'4','5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9','10'=>'10'],$review->rating,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
             {{errors_for('rating', $errors)}}
            </div>
        </div>


        {{Form::submit('Spara', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}
    </div>
</div>

@stop