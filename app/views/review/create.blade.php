@extends('db')

@section('content')

<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa recension</h4>
   {{Form::open(['method'=>'POST', 'route'=>['review.store'], 'class'=>'form-horizontal style-form', 'id'=>'review'])}}

         <div class="form-group">
             <label class="col-sm-2 col-sm-2 control-label">Välj bana att recensera</label>
             <div class="col-sm-10">

               {{Form::select('id', $courses,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

             </div>
         </div>

               <div class="form-group">
                   <label class="col-sm-2 col-sm-2 control-label">Rubrik</label>
                   <div class="col-sm-10">

                      {{Form::text('head', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}

                   </div>
               </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Din recension</label>
          <div class="col-sm-12">

            {{Form::textarea('body')}}

          </div>
      </div>

        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Ditt betyg</label>
            <div class="col-sm-12">

               {{Form::select('rating', ['1'=>'1','2'=>'2', '3'=>'3','4'=>'4','5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9','10'=>'10'],'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

            </div>
        </div>


        {{Form::submit('Spara', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

@stop

@section('scripts')

    <script>

    $.validate({
      form : '#review'
    });

    </script>

@stop