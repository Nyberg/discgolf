@extends('master')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6">
                <a href="/account/round/add" class="btn btn-sm btn-success center-block">Skapa Singel/Par-runda</a>
            </div>
            <div class="col-sm-6">
                <a href="/round/group" class="btn btn-sm btn-success center-block">Skapa Grupprunda</a>
            </div>
        </div>
    </div>

        @if(Auth::user()->hasRole('Admin'))
        <div class="row">
        <br/>
            <div class="col-sm-12">
                <div class="col-sm-12">
                <a href="/account/app/start" class="btn btn-sm btn-success center-block">Webbapp!</a>
                </div>
            </div>
        </div>
        @else
        @endif
@stop
