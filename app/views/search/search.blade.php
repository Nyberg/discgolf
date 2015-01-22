@extends('master')


@section('content')

<div class="row">
  <div class="col-lg-12">
    {{Form::open(['route' => 'searchresult', 'method' => 'GET', 'class' => ''])}}
    <div class="input-group">
            <input type="text" class="form-control"  name="auto" id="auto" placeholder="Sök banor..">
            <span class="input-group-btn">
              {{Form::button('<i class="fa fa-search"></i>', ['type'=>'submit', 'class' => 'btn btn-default'])}}
            </span>
    </div><!-- /input-group -->
    {{Form::close()}}
    </div><!-- /.col-lg-6 -->
  </div>
</div>

<div class="showback">
  <div class="row">
    <div class="col-lg-12">

        <h4><i class="fa fa-angle-right"></i> Din sökning på '{{$result}}' gav {{$num}} träffar:</h4>

        <div class="row">

            <div class="col-lg-12">
                @foreach($courses as $course)
                <div class="col-lg-4">
                    @foreach($course->photos as $photo)
                    <a href="/course/{{$course->id}}/show"><img src="{{$photo->url}}" width="100%"/></a>
                    @endforeach
                    <p>{{$course->name}}</p>
                </div>
                @endforeach
            </div>

            <div class="col-lg-12 text-center">

                {{$courses->links()}}

            </div>
        </div>
    </div>
  </div>
</div>
@stop