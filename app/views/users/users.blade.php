@extends('master')


@section('content')

              <h2 class="text-center page-header-custom">Användare</h2>
              <div class="divider-header"></div>

<div class="row">

    <div class="col-md-12 mb text-center    ">

    <div class="btn-toolbar ">

        <div class="btn-group ">

            <a type="button" class="btn btn-primary"><i class="fa fa-sort-alpha-asc"></i></a>

            <a type="button" class="btn btn-primary"><i class="fa fa-sort-alpha-desc"></i></a>

            <a type="button" class="btn btn-primary"><i class="fa fa-random"></i></a>

        </div>

    </div>

    </div>

    <div class="col-md-12">

     <ul class="list-inline list-unstyled" id="Container">
        @foreach($users as $user)
        <li class="col-sm-2 text-center thread mix mixup-content">
           <img src="{{$user->image}}" class="img-responsive img-circle center-block" width="40px"/>
           <p><a href="/user/{{$user->id}}/show">{{$user->first_name . ' ' . $user->last_name}}</a></p>
           <small>Klubb: <a href="/club/{{$user->club_id}}/show">{{$user->club->name}}</a></small>
        </li>
        @endforeach
    </ul>

</div>

<div class="row">
    <div class="col-sm-12 text-center">
    {{$users->links()}}
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