@extends('master')

@section('content')

                 <h2 class="text-center page-header-custom">Klubbar</h2>
                 <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12">

    <div class="col-md-12" id="Container">
        <ul class="list-inline list-unstyled" id="Container">
               @foreach($clubs as $club)
               <li class="col-sm-3 text-center thread mix category-{{$club->country->country}} category-{{$club->state->state}} category-{{$club->city->city}}" data-myorder="2">

                  <img src="{{$club->image}}" class="center-block club-index"/>
                  <p><a href="{{$club->website}}" target="_blank">{{$club->name .', ' . $club->city->city}}</a></p>

               </li>
               @endforeach
           </ul>
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