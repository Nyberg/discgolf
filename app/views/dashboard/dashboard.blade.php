@extends('master')

@section('content')

                  	<div class="row mtbox">
                        <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                          <a  href="/round/add">  <div class="box1">
                                <span class="li_like"></span>
                                <h3>{{$rounds}}</h3>
                            </div>
                                <p>Add another round!</p></a>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_star"></span>
                                <h3>0</h3>
                            </div>
                                <p>Show your favorite courses!</p>
                        </div>
                           <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_tag"></span>
                                <h3>4</h3>
                            </div>
                                <p>You have 4 pending tasks!</p>
                        </div>
                        <div class="col-md-2 col-sm-2 box0">
                            <div class="box1">
                                <span class="li_params"></span>
                                <h3>Statistics</h3>
                            </div>
                                <p>Check out your statistics!</p>
                        </div>

                            <div class="col-md-2 col-sm-2 box0">
                              <a href="/user/{{Auth::User()->id}}/edit">  <div class="box1">
                                    <span class="li_settings"></span>
                                    <h3>Settings</h3>
                                </div>
                                    <p>Edit your user settings!</p></a>
                            </div>

                  	</div><!-- /row mt -->


                      <div class="row mt">
            </div><!-- /row -->


					<div class="row">

					</div><!-- /row -->

					<div class="row mt">

					</div><!-- /row -->



@stop