@extends('db')

@section('content')

	<div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Skapa Grupprunda</h4>
        <div class="divider-header"></div>

   {{Form::open(['method'=>'POST', 'route'=>['account-group-round-add-score'], 'class'=>'form-horizontal style-form', 'id'=>'round_form'])}}

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
            <label class="col-sm-1 col-sm-1 control-label">Datum</label>
                 <div class="col-sm-5">
                     {{Form::text('date', '', ['class'=>'form-control datepicker'])}}
                      <span class="help-block">Klicka på fältet för att välja datum.</span>
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
            <label class="col-sm-1 col-sm-1 control-label">Antal Spelare</label>
            <div class="col-sm-5">
                {{Form::select('num', ['2'=>'2', '3'=>'3','4'=>'4','5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8'],'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                <span class="help-block">Välj antalet spelare, inklusive dig själv.</span>
            </div>
        </div>

            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Spelare 1</label>
                <div class="col-sm-5">
                 <select name="player-1" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="{{Auth::id()}}" readonly>{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</option>
                      </select>
                  </div>

                <label class="col-sm-1 col-sm-1 control-label">Spelare 2</label>
                <div class="col-sm-5">
                 <select name="player-2" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                      </select>
                  </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Spelare 3</label>
                <div class="col-sm-5">
                 <select name="player-3" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                      </select>
                  </div>

                <label class="col-sm-1 col-sm-1 control-label">Spelare 4</label>
                <div class="col-sm-5">
                 <select name="player-4" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                      </select>
                  </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Spelare 5</label>
                <div class="col-sm-5">
                 <select name="player-5" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                  </select>
                </div>

                <label class="col-sm-1 col-sm-1 control-label">Spelare 6</label>
                <div class="col-sm-5">
                 <select name="player-6" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                      </select>
                  </div>
            </div>

            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Spelare 7</label>
                <div class="col-sm-5">
                 <select name="player-7" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                      </select>
                  </div>

                <label class="col-sm-1 col-sm-1 control-label">Spelare 8</label>
                <div class="col-sm-5">
                 <select name="player-8" class="form-control" id="" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                      <option value="0" readonly>Välj Användare</option>
                      @foreach($users as $course)
                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->first_name . ' ' . $course->last_name}}</option>
                      @endforeach
                      </select>
                  </div>
            </div>

        <div class="row">

        <div class="col-sm-12">
            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Kommentar</label>
                <div class="col-sm-11">
                {{Form::textarea('comment', '', ['class'=>'form-control'])}}
                </div>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
            {{Form::submit('Skapa runda', ['class'=>'btn btn-sm btn-success'])}}
            {{Form::close()}}
            </div>
        </div>

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

        $('#getPlayer').autocomplete({
            source: '/searchplayer',
            minLength: 1
        });

        $('#addPlayer').click(addGroupPlayer);

        var i = 2;
        function addGroupPlayer(){

            var x = $('#getPlayer').val();
            $('#players').append('<br/><div class="row"><div class="form-group"><label class="col-sm-1 control-label">Spelare '+i+'</label><div class="col-sm-11"><input class="form-control" readonly name="player-" type="text" value="'+x+'"></div></div></div>');
            i++;
            return false;
        };

    </script>

@stop