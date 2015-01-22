@extends('master')

@section('content')

<div class="row">
<div class="col-lg-8">
 <table class="table table-hover">
    <thead>

    </thead>
    <tbody>

    <tr class="text-center">
      <th>Hole</th><td>{{$score->hole['number']}}</td>
      <th>Length</th><td>{{convert($score->hole['length'])}}</td>
      <th>Score/Par</th><td class="{{checkScore($score->score, $score->par)}}">{{$score->score . ' ('.$score->par.')'}}</td>
      <td id="score">{{$score->score}}</td>
    </tr>

   </tbody></table>
<table class="table table-hover">
   <thead>
   <th>Shot</th>
   <th>Disc</th>
   <th>Condition</th>
   <th>Manufactorer</th>

   </thead>
   <tbody>

   @foreach($shots as $shot)

    <tr>
     <td>{{$shot->number}}</td>
     <td>{{$shot->disc->plastic . ' ' . $shot->disc->name . ' ' . $shot->disc->weight . 'g'}}</td>
     <td>{{$shot->disc->condition}}</td>
     <td>{{$shot->disc->author}}</td>
      </tr>

    @endforeach

  </tbody></table>

  <table class="table table-hover" id="table_cord">
     <thead>
     <th>X</th>
     <th>Y</th>

     </thead>
     <tbody>

     @foreach($shots as $shot)
      <tr>
       <td id="x-{{$shot->number}}">{{$shot->x}}</td>
       <td id="y-{{$shot->number}}">{{$shot->y}}</td>

        </tr>
      @endforeach
      <tr>
      <td id="img-obj">{{$score->hole['image']}}</td>
    </tr>

    </tbody></table>

</div>
<div class="col-lg-4">
<canvas id="myCanvas" width="300" height="450"></canvas>
</div>
</div> </div>

  <div class="row">
    <div class="col-lg-12">
    <div class="showback">
     <h4 class="mb"><i class="fa fa-comments-o"></i> Comments
        @if(Auth::user())
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#comment">
         Add Comment
        </button>
        @endif
     </h4>

     <div class="row">
       <div class="col-lg-12">

        @foreach($score->comments as $comment)

        @include('layouts/include/comment')

        @endforeach

        </div></div>


        <div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="myModalLabel">Add Comment</h4>
                                  </div>

                                  <div class="modal-body">
                                  {{Form::open(['route'=>'comment.store', 'class'=>'form-horizontal style-form'])}}
                                    {{Form::hidden('type_id', $score->id)}}
                                    {{Form::hidden('model', 'score')}}
                                   <div class="form-group">
                                                     <label class="col-sm-2 col-sm-2 control-label">Comment</label>
                                                     <div class="col-sm-10">

                                                         {{Form::text('body', '', ['class'=>'form-control'])}}
                                                     </div>
                                                 </div>


                                  <div class="modal-footer">
                                      {{Form::submit('Save Comment', ['class'=>'btn btn-primary'])}}
                                          {{Form::close()}}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                 </div>
                               </div>


<script type="text/javascript">

        var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');
        var x = 0;
        var y = 0;
        var width = canvas.width;
        var height = canvas.height;

        document.getElementById('table_cord').style.display = 'none';
        document.getElementById('score').style.display = 'none';

        var imageObj = new Image();

        imageObj.onload = function() {
          context.drawImage(imageObj, x, y, width, height);
        };

        imageObj.src = document.getElementById('img-obj').textContent;

        var coords_x = [0];
        var coords_y = [0];

            var j = document.getElementById('score').textContent;
            for (var i = 1; i < j; i++){

            var cordX = 'x-'+i;
            var cordY = 'y-'+i;

            console.log(cordX, cordY);

            var cord_x = document.getElementById(cordX).textContent;
            var cord_y = document.getElementById(cordY).textContent;

            coords_x.push(cord_x);
            coords_y.push(cord_y);

            }
            context.font = 'bold 12pt Arial';
            context.fillStyle = 'red';

            for (i=1; i<coords_x.length; i++) {

            context.globalCompositeOperation = 'destination-over';
            context.fillText(i, coords_x[i], coords_y[i]);
            }

</script>

@stop