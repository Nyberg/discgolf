@extends('master')

@section('content')

                 <h2 class="text-center page-header-custom">Klubbar</h2>
                 <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12">

    <div class="col-md-12" id="Container">
        @foreach($clubs as $club)
        <div class="col-sm-3 text-center thread mix">
           <img src="{{$club->image}}" class="img-responsive thumbnail center-block" width="100%"/>
           <p><a href="/club/{{$club->id}}/show">{{$club->name}}</a></p>
           <small>Medlemmar: {{count($club->users)}}</small>
        </div>
        @endforeach
    </div>

</div>



@stop

@section('scripts')
    <script>
    $(function(){

    // Instantiate MixItUp:

    $('#Container').mixItUp();

    });
    </script>
@stop