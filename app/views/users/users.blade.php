@extends('master')
@section('content')

  <h2 class="text-center page-header-custom">Användare</h2>
  <div class="divider-header"></div>

    <div class="row">
        <div class="col-sm-12" id="Container">
            @foreach($users as $u)
            <a href="/user/{{$u->id}}/show">
                <div class="col-sm-3 col-md-3">
                      <div class="thumbnail">
                        <div class="caption text-center">
                         <img src="{{$u->image}}" alt="" class="img-circle" width="60px"/>
                            <h5 class="">{{$u->first_name . ' ' . $u->last_name}}</h5>
                            <p>{{$u->profile->city->city . ', ' . $u->profile->state->state}}</p>
                       </div>
                      </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
        {{$users->links()}}
        </div>
    </div>

@stop
