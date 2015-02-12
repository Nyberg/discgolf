@extends('master')

@section('content')

                 <h2 class="text-center page-header-custom">Klubbar</h2>
                 <p class="text-center">Visar alla klubbar. Sortera med valmöjligheterna under.</p>
                 <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12">
    <div class="col-md-4 mb">
            <select name="" class="form-control" id="">
                <option class="filter" data-filter=".category-none">Välj Land</option>
                @foreach($countries as $country)
                <option class="filter" data-filter=".category-{{$country->country}}">{{$country->country}}</option>
                @endforeach
            </select>
    </div>
    <div class="col-md-4 mb">
            <select name="" class="form-control" id="">
                <option class="filter" data-filter=".category-none">Välj Landskap</option>
                @foreach($states as $state)
                <option class="filter" data-filter=".category-{{$state->state}}">{{$state->state}}</option>
                @endforeach
                </select>
    </div>
    <div class="col-md-4 mb">
            <select name="" class="form-control" id="">
                <option class="filter" data-filter=".category-none">Välj Stad</option>
                @foreach($cities as $city)
                <option class="filter" data-filter=".category-{{$city->city}}">{{$city->city}}</option>
                @endforeach
            </select>
    </div>

    </div>

    <div class="col-md-12">

    <div class="col-md-12" id="Container">
        <ul class="list-inline list-unstyled" id="Container">
               @foreach($clubs as $club)
               <li class="col-sm-3 text-center thread mix category-{{$club->country->country}} category-{{$club->state->state}} category-{{$club->city->city}}" data-myorder="2">

                  <a href="/club/{{$club->id}}/show"><img src="{{$club->image}}" class="img-responsive thumbnail center-block" width="100%;" min-height="60px;"/></a>

                  <p><a href="/club/{{$club->id}}/show">{{$club->name .', ' . $club->city->city}}</a></p>

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