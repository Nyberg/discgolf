@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                  <div class="showback">



                  <div class="row">
                    <div class="col-lg-8">
                    <h4><i class="fa fa-angle-right"></i> Hole {{$hole->number}}</h4><br/>
                    <h5>Length: {{convert($hole->length)}}</h5>
                    <h5>Par: {{$hole->par}}</h5>
                    <h6 id="score">3</h6>

                    <br/><br/>

                     <h5><i class="fa fa-angle-right"></i> Ob Rules</h5><br/>

                    @if(is_null($hole->detail['ob']))

                    <p>No Ob-rules on this hole</p>

                    @else

                    <p>{{$hole->detail['ob']}}</p>

                    @endif

                    </div>
                    <div class="col-lg-4">
                    <a href="/img/dg/test.gif" data-lightbox="image-1" data-title="Basket {{$hole->number}}">
                    <img src="/img/dg/test.gif" class="" width="100%">
                    </a>
                    </div>
                  </div>

                      	    </div>
                      	 </div><!-- --/content-panel ---->
                      </div><!-- --/content-panel ---->


                                      <div class="col-lg-12 main-chart">
                                      <div class="showback">





<canvas id="myCanvas" width="300" height="450"></canvas>

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

        function setPoint(e) {

        var x, y;

        canoffset = $(canvas).offset();
            x = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft - Math.floor(canoffset.left);
            y = event.clientY + document.body.scrollTop + document.documentElement.scrollTop - Math.floor(canoffset.top) + 1;
            document.getElementById('score').innerHTML = x + ' ' + y;
            context.fillText('1', x, y);
        return [x,y];
             }
</script>

                                      </div></div></div>


                  </div>

                  </div>
              </div>
          </section>
 </section>

@stop