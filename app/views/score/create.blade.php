@extends('master')

@section('content')


    <h4><i class="fa fa-angle-right"></i> Create Round - {{$course->name}}</h4><hr>
      <table class="table table-hover">


          <thead>
          <tr>
            <th>Hole</th>
            @foreach($course->hole as $hole)
            <td>{{$hole->number}}</td>
            @endforeach
          </tr>

          </thead>
          <tbody>
           <tr>
           <th>Par</th>
           @foreach($course->hole as $hole)
           <td>{{$hole->par}}</td>


            @endforeach
           </tr>
           <tr>
           <th>Length</th>
           @foreach($course->hole as $hole)
           <td>{{$hole->length}}m</td>
           @endforeach
           </tr>
          </tbody>
      </table>

        <h4 class="mb"><i class="fa fa-angle-right"></i> Add Score</h4>
            {{Form::open(['route'=>'round.store', 'class'=>'form-horizontal style-form'])}}
            {{Form::hidden('course_id', $course->id)}}
            {{Form::hidden('holes', $course->holes)}}
            {{Form::hidden('round_id', $round->id)}}

             <div class="row">

            @foreach($course->hole as $hole)

            {{Form::hidden('hole_id-'.$hole->number.'', $hole->id)}}

            {{Form::hidden('par-'.$hole->number.'', $hole->par)}}


              <div class="col-sm-2 col-md-2">
                <div class="thumbnail">
                  <img src="{{$hole->image}}" alt="">
                  <div class="caption">

                   {{Form::number('number-'.$hole->number.'', $hole->number, array('class'=>'form-control text-center', 'readonly'))}}
                    {{Form::number('score-'.$hole->number.'', null, ['class'=>'form-control', 'placeholder'=>'Resultat'])}}
                  </div>
                </div>
              </div>

            @endforeach
            {{Form::submit('Next', ['class'=>'btn btn-primary'])}}
            {{Form::close()}}
        </div>
        </div>


@stop