@extends('admin/admin')


@section('content')

 <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                  <div class="showback">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> {{$course->name}}, {{$round->created_at->format('Y-m-d')}} by {{$round->user}} </h4>
                    <div class="row">
                  <img class="" src="/img/dg/{{$course->image}}" width="100%"/>

                    </div>

                    <br/>
                          <h4><i class="fa fa-angle-right"></i> Score:</h4><hr>
                          <table class="table table-hover text-center">
                              <thead>
                              <tr>
                                <th>Hole</th>
                                @foreach($course->hole as $hole)
                                <td><a href="/hole/{{$hole->id}}/score/{{$round->id}}">{{$hole->number}}</a></td>
                                @endforeach
                              </tr>

                              </thead>
                              <tbody>
                               <tr>
                               <th>Score/Par</th>

                               @foreach($round->score as $score)

                              <td class="{{checkScore($score->score, $score->par)}}">{{$score->score}} ({{$score->par}})</td>
                               @endforeach


                               </tr>
                               <tr>
                               <th>Length</th>
                               @foreach($course->hole as $hole)
                               <td>{{convert($hole->length)}}</td>
                               @endforeach
                               <td></td>


                               </tr>
                              </tbody>
                          </table>

                      	    </div>
                      	 </div><!-- --/content-panel ---->
                      </div><!-- --/content-panel ---->
                  </div>

                  </div>
              </div>
          </section>
 </section>

@stop