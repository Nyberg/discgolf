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

    <div class="col-md-12 text-center">

        <br/>
        <br/>
        <br/>

        <h1 class="page-header-custom">Denna sidan är under konstruktion!</h1>

    </div>

</div>



@stop
