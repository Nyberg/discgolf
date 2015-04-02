@extends('master')

@section('content')

                 <h2 class="text-center page-header-custom">Klubbar</h2>
                 <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12">

               @foreach($clubs as $club)
                <a href="/club/{{$club->id}}/show/">
                    <div class="col-sm-3 col-md-3">
                          <div class="thumbnail">
                            <div class="caption text-center">

                                <img src="{{$club->image}}" alt="" height="60px"/>
                                <h4 class="">
                                                                    {{$club->name . ', ' . $club->city->city}}
                                                                </h4>
               
                           </div>
                          </div>
                    </div>
                </a>
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