@extends('admin/admin')


@section('content')

 <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
                  <div class="showback">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> {{$course->name}}</h4>
                    <div class="row">
                  <img class="" src="/img/dg/{{$course->image}}" width="100%"/>

                    </div>
                    <br/><br/>

                    <div class="row">
                    <div class="col-lg-6">
                    <h4><i class="fa fa-angle-right"></i> Information</h4><br/>

                    <ul>
                    <li><strong>Location:</strong></li>
                    <li>{{$course->location}}</li>
                    </ul>

                    <ul>

                    <li><strong>Description:</strong></li>
                      <li>{{$course->information}}</li>
                    </ul>

                    <ul>
                    <li><strong>Club:</strong></li>
                    <li>{{$course->club}}</li>
                    </ul>

                    <ul>
                    <li><strong>Fee:</strong></li>
                    @if($course->fee == null || '')
                    <td>Free</td>
                    @else
                    <td>{{$course->fee}}</td>
                    @endif
                    </ul>
                    <br/>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      Show Course Map
                    </button>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    						  <div class="modal-dialog">
                    						    <div class="modal-content">
                    						      <div class="modal-header">
                    						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    						        <h4 class="modal-title" id="myModalLabel">Course Map {{$course->name}}</h4>
                    						      </div>

                    						      <div class="modal-body">
                                                    <img src="/img/dg/banskiss.jpg" width="100%"/>
                    						      </div>
                    						      <div class="modal-footer">
                    						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    						      </div>
                    						    </div>
                    						  </div>
                    						</div>
                    </div>
                    <div class="col-lg-6">


                    <h4><i class="fa fa-angle-right"></i> Location</h4>

                    </div>
                    </div>
                    <br/>
                          <h4><i class="fa fa-angle-right"></i> Course Hole Information</h4><hr>
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                <th>Hole</th>
                                @foreach($course->hole as $hole)
                                <td><a href="/hole/{{$hole->id}}/show">{{$hole->number}}</a></td>
                                @endforeach
                              </tr>

                              </thead>
                              <tbody>
                               <tr>
                               <th>Par</th>
                               @foreach($course->hole as $hole)
                               <td>{{$hole->par}}</td>


                                @endforeach
                                <td>Total: {{$course->par}}</td>
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
                  <div class="row">
                                <div class="col-lg-12 main-chart">
                                <div class="showback">

                                        <h4><i class="fa fa-angle-right"></i> All Rounds played at {{$course->name}}</h4><hr>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>

                                             <th>Date</th>
                                              <th>Player</th>

                                              <th>Course</th>
                                              <th>Par</th>
                                              <th>Score</th>

                                            </tr>

                                            </thead>
                                            <tbody>
                                            @foreach($rounds as $round)
                                             <tr>
                                              <td><a href="/round/{{$round->id}}/course/{{$round->course_id}}">{{$round->created_at->format('Y-m-d')}}</a></td>
                                              <td><a href="/user/{{$round->user_id}}/show">{{$round->user}}</a></td>
                                              <td><a href="/course/{{$round->course_id}}/show">{{$round->course['name']}}</a></td>
                                              <td>{{$course->par}}</td>
                                              <td>{{$round->total}}</td>
                                             </tr>
                                             @endforeach
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