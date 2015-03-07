@extends('master')

@section('content')


    <div class="row">
    <div class="col-md-12">
          <h2 class="text-center page-header-custom">Länkar</h2>
          <div class="divider-header"></div>
    </div>

    <div class="col-md-12 text-center">
        <div class="col-md-3">
            <h2 class="text-center page-header-custom">Klubbar</h2>
            <div class="divider-header"></div>
            @foreach($links as $link)
            @if($link->type == 'club')
            <p><a href="{{$link->url}}" target="_blank">{{$link->name}}</a></p>
            @else
            @endif
            @endforeach
        </div>

        <div class="col-md-3">
            <h2 class="text-center page-header-custom">Tävlingar</h2>
            <div class="divider-header"></div>
            @foreach($links as $link)
            @if($link->type == 'comp')
            <p><a href="{{$link->url}}" target="_blank">{{$link->name}}</a></p>
            @else
            @endif
            @endforeach
        </div>

        <div class="col-md-3">
            <h2 class="text-center page-header-custom">Tillverkare</h2>
            <div class="divider-header"></div>
            @foreach($links as $link)
            @if($link->type == 'disc')
            <p><a href="{{$link->url}}" target="_blank">{{$link->name}}</a></p>
            @else
            @endif
            @endforeach
        </div>

        <div class="col-md-3">
            <h2 class="text-center page-header-custom">Övriga Länkar</h2>
            <div class="divider-header"></div>
            @foreach($links as $link)
            @if($link->type == 'other')
            <p><a href="{{$link->url}}" target="_blank">{{$link->name}}</a></p>
            @else
            @endif
            @endforeach
        </div>

    </div>
    </div>



@stop