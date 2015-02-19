@extends('master')

@section('content')

        <div class="row">
        <div class="col-md-12">
        <h4 class="tab-rub text-center page-header-custom">{{$club->name}}</h4>
        <p class="text-center">{{$club->city->city . ', ' . $club->state->state}}</p>
        <div class="divider-header"></div>
        </div>
        </div>

<div class="row">
    <ul class="blue nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#sectionA">{{$club->name}}</a></li>
        <li><a data-toggle="tab" href="#sectionB">Nyheter ({{count($club->news)}})</a></li>
        <li><a data-toggle="tab" href="#sectionC">Medlemmar ({{count($club->users)}})</a></li>
        <li><a data-toggle="tab" href="#sectionD">Medlemskap</a></li>
        <li><a data-toggle="tab" href="#sectionE">Gästbok ({{count($club->comments)}})</a></li>
    </ul>
</div>

<div class="row">

    <div class="col-md-12 text-center">

        <br/>
        <br/>
        <br/>

        <h1 class="page-header-custom">Denna sidan är under konstruktion!</h1>
        <p>Förslag på vad en klubbs sida ska innehålla kan lämnas i forumet.</p>

    </div>

</div>



@stop
