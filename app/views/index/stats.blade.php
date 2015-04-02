@extends('master')

@section('content')

<div class="row">

    <div class="col-md-12">
        <h2 class="text-center page-header-custom">Statistik</h2>

        @if(Auth::check())
        @else
        <p class="text-center">Som medlem på sidan får du tillgång till extra statistik.</p>
        @endif
        <div class="divider-header"></div>

    </div>

</div>

    @if(Auth::check())

     <div class="row">
        <!-- Sidomeny -->
        {{Form::open(['method' => 'POST','route' => ['course.stats'],'class' => 'form-horizontal', 'id' => 'round_avg'])}}
        <div class="col-md-12">

            <div class="col-md-6">
            <p>Välj datum (från och till) för att generera era resultat mellan valda datum.</p>
            <p>Ni kan även välja vilken bana det ska gälla. Vill ni inte välja bana så lämna fältet som det är. Under grafen kan ni sedan klicka er vidare till era rundor (rundorna öppnas i nytt fönster).</p>
            </div>

                      <div class="col-md-6">
                        <div class="form-group">

                                 <div class="col-md-6">
                                     <label class="col-sm-6 col-sm-6 control-label">Från Datum</label>
                                     {{Form::text('date-from', null, ['class'=>'form-control datepicker', 'id'=>'date_from'])}}
                                      <span class="help-block">Klicka på fältet för att välja datum</span>
                                     {{errors_for('date-from', $errors)}}

                                 </div>

                                 <div class="col-md-6">
                                     <label class="col-sm-6 col-sm-6 control-label">Till Datum</label>
                                     {{Form::text('date-to', null, ['class'=>'form-control datepicker', 'id'=>'date_to'])}}
                                      <span class="help-block">Klicka på fältet för att välja datum</span>
                                     {{errors_for('date-to', $errors)}}

                                 </div>
                        </div>

                              <div class="form-group">

                                  <div class="col-sm-6">
                                  <label class="col-sm-6 col-sm-6 control-label">Välj Bana</label>

                                 <select name="course" class="form-control teepads" id="teepads" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
                                                      <option value="0">Välj Bana</option>
                                                      @foreach($courses as $course)
                                                      <option id="{{$course->id}}" value="{{$course->id}}">{{$course->name}}</option>
                                                      @endforeach
                                                      </select>
                                  </div>

                                </div>



                {{Form::hidden('id', Auth::id(), ['id'=>'id'])}}
                {{Form::hidden('model', 'stats', ['id'=>'model'])}}
                {{Form::hidden('user_id', Auth::id(), ['id'=>'user_id'])}}
                {{Form::submit('Beräkna', ['class' => 'btn btn-red btn-sm btn-block'])}}
                {{Form::close()}}
            </div>
        </div>
        <!-- Slut sidomeny -->
        </div>

<!-- Nav-pills -->
<div class="showback hidden-phone">
<div class="row">

</div>
    <div class="row">
       <div id="chart-round-avg" style="min-width: 310px; height: 400px; width: 100%; margin: 0 auto"></div>
    </div>
</div>

<div class="row">
   <div class="col-sm-12" id="round-data">

    </div>
</div>

@else
@endif

@stop


@section('scripts')
        {{HTML::script('admin_js/stats/stats.js')}}
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

<script>

    jQuery(document).ready(function($) {
            $('#info').hide();
            getUserRounds();
            $('#round_avg').submit(getRoundAvgStats);
        });


      $(function() {
                   $(".datepicker").datepicker({
                   format: "yyyy-mm-dd"

                    })
           });


        </script>


@stop