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

<div class="tab-content">

</div>



@stop
