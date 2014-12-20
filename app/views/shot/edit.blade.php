@extends('master')

@section('content')

<div class="row">
<div class="col-lg-8">
 <h4 class="mb"><i class="fa fa-angle-right"></i> Hole {{$hole->number}}</h4>
 <table class="table table-hover">
    <thead>
    <th>Hole</th>
    <th>Length</th>
    <th>Par</th>

    </thead>
    <tbody>

    <tr>
      <td>{{$hole->number}}</td>
      <td>{{convert($hole->length)}}</td>
      <td>{{$hole->par}}</td>

    </tr>

   </tbody></table>

  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Shots</h4>
   {{Form::open(['route'=>'shot.store', 'class'=>'form-horizontal style-form'])}}

   {{Form::hidden('round_id', $round->id)}}
   {{Form::hidden('total', $total)}}
   {{Form::hidden('hole_id', $hole->id)}}


     <div class="form-group input-group-sm">
         <label class="col-sm-2 col-sm-2 control-label">Instructions</label>
         <div class="col-sm-10">

       <span class="help-block">Click on the image to set were your throws landed. Last shot goes into basket by default.</span>

         </div>

     </div>

@for($i = 1; $i<=$total-1; $i++)

       {{Form::hidden('number-'.$i.'', $i)}}

 <div class="form-group">
     <label class="col-sm-2 col-sm-2 control-label ">Shot {{$i}}</label>
     <div class="col-sm-2">

     {{Form::number('x-'.$i.'', '', ['class'=>'form-control', 'readonly', 'id'=>'x-'.$i.''])}}

     </div>
      <div class="col-sm-2">

      {{Form::number('y-'.$i.'', '', ['class'=>'form-control', 'readonly', 'id'=>'y-'.$i.''])}}

      </div>

          <label class="col-sm-1 col-sm-1 control-label ">Disc</label>
          <div class="col-sm-5">
             {{Form::select('disc-'.$i.'', $discs, '', array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
          </div>


 </div>

@endfor

 <div class="form-group">
     <label class="col-sm-2 col-sm-2 control-label">Last Shot</label>
     <div class="col-sm-4">

     {{Form::number('last', '', ['class'=>'form-control', 'readonly', 'placeholder'=>'To basket'])}}
       {{Form::hidden('last-x', 0)}}
       {{Form::hidden('last-y', 0)}}
     </div>
       <label class="col-sm-1 col-sm-1 control-label ">Disc</label>
              <div class="col-sm-5">
                 {{Form::select('last-disc', $discs, '', array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
              </div>

 </div>
          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">To reset</label>
              <div class="col-sm-10">

            <span class="help-block">To reset the form, please reload the page. No module currently implemented for it.</span>

              </div>

          </div>

       {{Form::submit('Save', ['class'=>'btn btn-primary'])}}

         {{Form::close()}}
 </div>

<div class="col-lg-4">
<canvas id="myCanvas" width="300" height="450"></canvas>
</div>
</div>

<script type="text/javascript">

        var canvas = document.getElementById('myCanvas');
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

        var i = 1;

        function setPoint(e) {

        var x, y;

      //  var j = document.getElementById('score').textContent;

      //  if(i < j){

        canoffset = $(canvas).offset();
            x = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft - Math.floor(canoffset.left);
            y = event.clientY + document.body.scrollTop + document.documentElement.scrollTop - Math.floor(canoffset.top) + 1;
            console.log('shot-'+i);
            document.getElementById('x-'+i).value = x;
            document.getElementById('y-'+i).value = y;
            context.fillText(i, x, y);
            i++;
        return [x,y];

       /* }else{
            alert('You cant add more!');
        }
*/
             }



</script>



@stop