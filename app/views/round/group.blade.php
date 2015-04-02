@extends('db')

@section('content')

	<div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Grupprunda -  Välj medspelare</h4>
        <div class="divider-header"></div>
      <div class="form-group">
      <div class="col-lg-6">
      {{Form::open(['route' => 'searchplayer', 'method' => 'GET', 'class' => '', 'id'=>'searchplayer'])}}
        <div class="input-group">
          <input type="text" class="form-control" name="getPlayer" id="getPlayer" placeholder="Sök spelare..">
          <span class="input-group-btn">
             {{Form::button('Lägg till spelare', ['type'=>'submit', 'class' => 'btn btn-default'])}}
          </span>
        </div><!-- /input-group -->
        {{Form::close()}}
      </div><!-- /.col-lg-6 -->

      <div class="col-sm-6">

      <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">Valda spelare</div>

        <!-- Table -->
        <table class="table" id="selected_players">
          <thead>
          </thead>
          <tbody>
          <tr>
            <td>{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</td>
            <td>Ta bort</td>
          </tr>
          </tbody>
        </table>
      </div>

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

    $('#getPlayer').autocomplete({
        source: '/searchplayer',
        minLength: 1
    });

    $('#searchplayer').submit(addGroupPlayer);

    function addGroupPlayer(){

        var x = $('#getPlayer').val();
        $('#selected_players').append('<tr><td>'+ x +'</td><td>Ta bort</td></tr>');
        return false;
    };

    </script>

@stop