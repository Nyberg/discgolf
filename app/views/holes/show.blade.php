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

                    <br/><br/>

                     <h5><i class="fa fa-angle-right"></i> Ob Rules</h5><br/>

                    @if(is_null($hole->detail['ob']))

                    <p>No Ob-rules on this hole</p>

                    @else

                    <p>{{$hole->detail['ob']}}</p>

                    @endif

                    </div>
                    <div class="col-lg-4">
                    <a href="/img/dg/2.png" data-lightbox="image-1" data-title="Basket {{$hole->number}}">
                    <img src="/img/dg/2.png" class="" width="100%">
                    </a>
                    </div>
                  </div>

                      	    </div>
                      	 </div><!-- --/content-panel ---->
                      </div><!-- --/content-panel ---->
                  </div>

                  </div>
              </div>
          </section>
 </section>

@stop