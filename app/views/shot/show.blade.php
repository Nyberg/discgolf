@extends('master')

@section('content')

<div class="row">
<div class="col-lg-8">
 <table class="table table-hover">
    <thead>
    <th>Hole</th>
    <th>Length</th>
    <th>Par</th>
    <th>Score</th>

    </thead>
    <tbody>

    <tr>
      <td>{{$score->hole['number']}}</td>
      <td>{{convert($score->hole['length'])}}</td>
      <td>{{$score->par}}</td>
      <td id="score">{{$score->score}}</td>
    </tr>

   </tbody></table>
<table class="table table-hover">
   <thead>
   <th>Shot</th>
   <th>Disc</th>
   <th>Comment</th>

   </thead>
   <tbody>

   @foreach($shots as $shot)

    <tr>
     <td>{{$shot->number}}</td>
     <td>{{$shot->disc}}</td>
     <td>{{$shot->comment}}</td>
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
      <td id="img-obj">/img/dg/test.gif</td>
    </tr>

    </tbody></table>

</div>
<div class="col-lg-4">
<canvas id="myCanvas" width="300" height="450"></canvas>
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


<script type="text/javascript">

    /*    var canvas = document.getElementById('myCanvas');
        var context = canvas.getContext('2d');

        context.font = 'bold 12pt Arial';
        context.fillStyle = 'red';
        var x = 0;
        var y = 0;
        var width = canvas.width;
        var height = canvas.height;

        var imageObj = new Image();

        imageObj.onload = function() {
          context.drawImage(imageObj, x, y, width, height);
        };
        imageObj.src = '/img/dg/test.gif';

       canvas.addEventListener("click", setPoint, false);

        function setPoint(e) {

        var x, y;

        canoffset = $(canvas).offset();
            x = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft - Math.floor(canoffset.left);
            y = event.clientY + document.body.scrollTop + document.documentElement.scrollTop - Math.floor(canoffset.top) + 1;
            document.getElementById('coord').innerHTML = x + ' ' + y;
            context.fillText('1', x, y);
        return [x,y];
             } */
</script>

@stop