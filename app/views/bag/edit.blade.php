@extends('master')

@section('content')


      <h4 class="mb"><i class="fa fa-angle-right"></i> Add Bag</h4>
       {{Form::model($bag, ['method'=>'PATCH', 'route'=> ['bag.update', $bag->id]])}}

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Type</label>
              <div class="col-sm-10">

                  {{Form::text('type', null, ['class'=>'form-control'])}}
              </div>
          </div>
         {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
         {{Form::close()}}

                   <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                      Add Disc to Bag
                    </button><hr/>

                    <div class="row">
                      <div class="col-lg-12">
                      <h4>Discs In {{$bag->type}}</h4>



                    <div class="col-lg-3">
                      <h5>Putters</h5>
                          @foreach($bag->disc as $disc)
                          @if($disc->type == 'Putter')
                          <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                          @endif
                          @endforeach
                    </div>
                    <div class="col-lg-3">
                      <h5>Midranges</h5>
                          @foreach($bag->disc as $disc)
                          @if($disc->type == 'Midrange')
                          <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                          @endif
                          @endforeach
                    </div>
                    <div class="col-lg-3">
                      <h5>Fiarway Drivers</h5>
                          @foreach($bag->disc as $disc)
                          @if($disc->type == 'Fairway')
                          <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                          @endif
                          @endforeach
                    </div>
                    <div class="col-lg-3">
                      <h5>Drivers</h5>
                          @foreach($bag->disc as $disc)
                          @if($disc->type == 'Driver')
                          <p>{{$disc->author.' '.$disc->plastic.' '. $disc->name . ', '.$disc->weight.'g'}}</p>
                          @endif
                          @endforeach
                    </div>
                   </div>
                   </div>


                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    						  <div class="modal-dialog">
                    						    <div class="modal-content">
                    						      <div class="modal-header">
                    						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    						        <h4 class="modal-title" id="myModalLabel">Add Disc</h4>
                    						      </div>

                    						      <div class="modal-body">
                    						      {{Form::open(['route'=>'disc.store', 'class'=>'form-horizontal style-form'])}}
                    						      {{Form::hidden('bag_id', $bag->id)}}
                                                <div class="form-group">
                                                                  <label class="col-sm-2 col-sm-2 control-label">Name</label>
                                                                  <div class="col-sm-10">

                                                                      {{Form::text('name', '', ['class'=>'form-control'])}}
                                                                  </div>
                                                              </div>

                                                  <div class="form-group">
                                                      <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                                      <div class="col-sm-10">

                                                          {{Form::select('type', ['Putter'=>'Putter', 'Midrange'=>'Midrange', 'Fairway'=>'Fairway Driver', 'Driver'=>'Driver'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                                                      </div>
                                                  </div>

                    						      <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Manufacturer</label>
                                                        <div class="col-sm-10">

                                                            {{Form::text('author', '', ['class'=>'form-control'])}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                              <label class="col-sm-2 col-sm-2 control-label">Plastic</label>
                                                              <div class="col-sm-10">

                                                                  {{Form::text('plastic', '', ['class'=>'form-control'])}}
                                                              </div>
                                                          </div>
                                                  <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Weight</label>
                                                        <div class="col-sm-10">

                                                            {{Form::number('weight', '', ['class'=>'form-control'])}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Condition</label>
                                                        <div class="col-sm-10">

                                                            {{Form::select('condition', ['New'=>'New', 'Beat in'=>'Beat in'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                                                             <span class="help-block">Choose which condition your disc is in.</span>

                                                        </div>
                                                    </div>
                    						      <div class="modal-footer">
                    						          {{Form::submit('Save to bag', ['class'=>'btn btn-primary'])}}
                                                       {{Form::close()}}
                    						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                              </div>
                                            </div>
                                              </div>
                    						      </div>
                    						    </div>
                    						  </div>
                    						</div>


@stop