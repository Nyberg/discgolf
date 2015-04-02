@extends('db')

@section('content')

	<div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Skapa Runda</h4>
        <div class="divider-header"></div>

   {{Form::open(['method'=>'POST', 'route'=>['account-round-add-score'], 'class'=>'form-horizontal style-form', 'id'=>'round_form'])}}

      <div class="form-group">
          <label class="col-sm-1 col-sm-1 control-label">Välj Bana</label>
          <div class="col-sm-5">

         <select name="course" class="form-control teepads" id="teepads" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
              <option value="0" readonly>Välj Bana</option>
              @foreach($courses as $course)
              <option id="{{$course->id}}" value="{{$course->id}}">{{$course->name}}</option>
              @endforeach
              </select>
          </div>

          <div class="tee">

          <label class="col-sm-1 col-sm-1 control-label">Tee</label>
               <div class="col-sm-5">

                    <select name="teepad" class="form-control" id="target">
                    <option value="0" selected="selected">Välj teepad</option>
                    </select>

                  </div>

                  </div>

        </div>

        <div class="form-group">

         <label class="col-sm-1 col-sm-1 control-label">Välj typ</label>
            <div class="col-sm-5">
               <select name="type" class="form-control type" id="type">
                        <option id="1" value="Singel">Singel</option>
                        <option id="2" value="Par">Par</option>
                        <option id="3" value="Grupp">Grupp</option>
                </select>
            </div>

        <div class="user">

           <label class="col-sm-1 col-sm-1 control-label">Medspelare</label>
           <div class="col-sm-5">
           <select name="players" class="form-control players" id="players">
           <option value="0" selected="selected">Välj spelare</option>
           </select></div>
           </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Datum</label>
                 <div class="col-sm-5">

                     {{Form::text('date', '', ['class'=>'form-control datepicker'])}}
                      <span class="help-block">Klicka på fältet för att välja datum</span>
                     {{errors_for('date', $errors)}}
                 </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Väder</label>
             <div class="col-sm-5">
                <select name="weather" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                  @foreach($weathers as $w)
                  <option id="{{$w->id}}" value="{{$w->id}}">{{$w->name}}</option>
                  @endforeach
                </select>
             </div>
             <label class="col-sm-1 col-sm-1 control-label">Vind</label>
              <div class="col-sm-5">
                <select name="wind" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                    @foreach($winds as $w)
                    <option id="{{$w->id}}" value="{{$w->id}}">{{$w->name}}</option>
                    @endforeach
                </select>
             </div>
        </div>

        <div class="form-group">
            <label class="col-sm-1 col-sm-1 control-label">Kommentar</label>
                 <div class="col-sm-11">

                     {{Form::textarea('comment', '', ['class'=>'form-control'])}}

                     {{errors_for('comment', $errors)}}

                 </div>
        </div>

    {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
</div>

@stop


@section('scripts')

    <script>

      $(function() {
                   $(".datepicker").datepicker({
                   format: "yyyy-mm-dd"

                    })
           });

    $.validate({
      form : '#round_form'
    });

    </script>

@stop