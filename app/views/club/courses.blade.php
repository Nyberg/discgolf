@extends('db')

@section('content')

    <div class="showback">

         <h4 class="mb"><i class="fa fa-angle-right"></i> {{$club->name}} - Banor</h4>
            <div class="row">
                <div class="col-lg-12">
                @foreach($club->course as $course)
                 @foreach($course->photos as $photo)


                    <div class="col-lg-6">

                       <div class="thumbnail">
                          <a href="/course/{{$course->id}}/show"><img src="{{$photo->url}}" alt="..."></a>
                          <div class="caption text-center">
                            <h4> {{$course->name}}</h4>

                            <p class=""><a href="/admin/course/{{$course->id}}/edit" class="btn btn-primary" role="button">Redigera</a></p>
                            <p class="">
                                         {{Form::open(['method'=>'DELETE', 'route'=>['course.destroy', $course->id]])}}
                                         {{Form::submit('Ta bort', ['class'=>'btn btn-danger'])}}
                                         {{Form::close()}}
                            </p>

                          </div>
                        </div>
                    </div>


                @endforeach
                @endforeach
                </div>
            </div
    </div

@stop