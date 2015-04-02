@extends('master')

@section('content')

        <div class="row">
        <div class="col-md-12">
        <h1 class="text-center">{{$club->name}} <small>{{$club->city->city . ', ' . $club->state->state}}</small></h1>
                <br/><p class="text-center"><a href="{{$club->website}}" target="_blank"><i class="fa fa-3x fa-desktop green" data-container="body" data-toggle="tooltip" data-placement="right" data-title="Klicka här för att komma till klubbens hemsida."></i></a></p>
        </div>
        </div>

<div class="row">

    <div class="col-md-12 text-center">
        <br/>
     <br/>
        <h4>Vill du ansluta en klubb till sidan? Maila <a href="mailto:johannes.nyb@gmail.com?Subject=Ansluta klubb" target="_top">Johannes Nyberg</a> för mer info!</h4>

    </div>

</div>



@stop

@section('scripts')

            <script>
              $(function () {
                  $('[data-toggle="tooltip"]').tooltip()
              })
            </script>
@stop