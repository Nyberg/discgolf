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
                    </button>

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