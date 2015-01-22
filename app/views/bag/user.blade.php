@extends('master')


@section('content')

<h4><i class="fa fa-angle-right"></i> All Your Bags</h4>
      <div class="row">
           <div class="col-lg-12">
                  <table class="table table-hover ">
                  <thead>
                  <tr>
                  <th>Bag</th>
                  <th>Discs</th>
                  <th>Add Disc</th>
                  <th>Edit</th>
                  <th>Delete </th>
                  </tr>
                  </thead>
                  <tbody>

     @foreach($bags as $bag)


            <tr>
            <td data-toggle="collapse" href="#collapseExample{{$bag->id}}" aria-expanded="false" aria-controls="collapseExample">
            {{$bag->type}}
            </td>
            <td data-toggle="collapse" href="#collapseExample{{$bag->id}}" aria-expanded="false" aria-controls="collapseExample">
            {{$bag->discs}}
            </td>
            <td> <a data-toggle="modal" data-target="#addDisc{{$bag->id}}"><button class="btn btn-xs btn-primary" id="edit"><i class="fa fa-plus"></i></button></a></td>
            <td>
            <a data-toggle="modal" data-target="#bagEdit{{$bag->id}}"><button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a>
            </td>

            <td>
             {{Form::open(['method'=>'DELETE', 'route'=>['bag.destroy', $bag->id]])}}
             {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
             {{Form::close()}}
            </td>

            </tr>


          @endforeach

                 </tbody>


         </table>
         </div>


               <div class="col-lg-12">

         @foreach($bags as $bag)
         <div class="collapse" id="collapseExample{{$bag->id}}">

                <table class="table table-hover ">
                   <thead>
                   <tr>
                   <th>Plastic</th>
                   <th>Name</th>
                   <th>Weight</th>
                   <th>Type</th>
                   <th>Edit</th>
                   <th>Delete</th>

                   </tr>
                   </thead>
                   <tbody>

                   @foreach($bag->disc as $disc)
                   <tr>
                   <td>{{$disc->plastic}}</td>
                   <td>{{$disc->name}}</td>
                   <td>{{$disc->weight}}g</td>
                   <td>{{$disc->type}}</td>
                   <td><a data-toggle="modal" data-target="#editDisc{{$disc->id}}"><button class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></button></a></td>
                   <td>

                   {{Form::open(['method'=>'DELETE', 'route'=>['disc.destroy', $disc->id]])}}
                     {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
                     {{Form::close()}}
                     </td>
                   </tr>
                   @endforeach
                   </tbody>
                   </table>

         </div>

      <div class="modal fade bs-example-modal-lg" id="bagEdit{{$bag->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h4 class="modal-title" id="myModalLabel">Edit Bag</h4>
      </div>

      <div class="modal-body">
       <div class="form-horizontal style-form">
       {{Form::model($bag, ['method'=>'PATCH', 'route'=> ['bag.update', $bag->id]])}}

      <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Name</label>
      <div class="col-sm-10">

      {{Form::text('type', $bag->type, ['class'=>'form-control'])}}
      </div>
      </div>


      <div class="modal-footer">
      {{Form::submit('Save Bag', ['class'=>'btn btn-primary'])}}
      {{Form::close()}}
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
      </div>
      </div>

      </div>
      </div>


      </div>

       <div class="modal fade bs-example-modal-lg" id="addDisc{{$bag->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="myModalLabel">Add Disc to {{$bag->type}}</h4>
                    </div>

                    <div class="modal-body">
                     <div class="form-horizontal style-form">
                    {{Form::open(['route'=>'disc.store', 'class'=>'form-horizontal style-form'])}}
                      {{Form::hidden('id', $bag->id)}}


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

                              {{Form::text('weight', '', ['class'=>'form-control'])}}
                          </div>
                      </div>
                 <div class="form-group">
                                   <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                   <div class="col-sm-10">

                                      {{Form::select('type', ['Putter'=>'Putter', 'Midrange'=>'Midrange', 'Fairway Driver'=>'Fairway Driver', 'Driver'=>'Driver'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                                   </div>
                               </div>
                               </div>

                    <div class="modal-footer">
                        {{Form::submit('Add Disc', ['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                   </div>
                 </div>
          </div>

          </div>
          </div><!-- --/Modal-panel ---->



         @endforeach

         @foreach($bags as $bag)

         @foreach($bag->disc as $disc)

               <div class="modal fade bs-example-modal-lg" id="editDisc{{$disc->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                   <div class="modal-dialog modal-lg">
                                     <div class="modal-content">
                                       <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                         <h4 class="modal-title" id="myModalLabel">Edit Disc {{$disc->name}}</h4>
                                       </div>

                                       <div class="modal-body">
                                        <div class="form-horizontal style-form">
                                      {{Form::model($disc, ['method'=>'PATCH', 'route'=> ['disc.update', $disc->id]])}}
                                      {{Form::hidden('bag_id', $bag->id)}}


                                        <div class="form-group">
                                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                                              <div class="col-sm-10">

                                                  {{Form::text('name', null, ['class'=>'form-control'])}}
                                              </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-sm-2 col-sm-2 control-label">Manufacturer</label>
                                             <div class="col-sm-10">

                                                     {{Form::text('author',null, ['class'=>'form-control'])}}
                                             </div>
                                         </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 col-sm-2 control-label">Plastic</label>
                                             <div class="col-sm-10">

                                                 {{Form::text('plastic', null, ['class'=>'form-control'])}}
                                             </div>
                                         </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 col-sm-2 control-label">Weight</label>
                                             <div class="col-sm-10">

                                                 {{Form::text('weight', null, ['class'=>'form-control'])}}
                                             </div>
                                         </div>
                                    <div class="form-group">
                                                      <label class="col-sm-2 col-sm-2 control-label">Type</label>
                                                      <div class="col-sm-10">

                                                         {{Form::select('type', ['Putter'=>'Putter', 'Midrange'=>'Midrange', 'Fairway Driver'=>'Fairway Driver', 'Driver'=>'Driver'], $disc->type, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                                                      </div>
                                                  </div>

                                       <div class="modal-footer">
                                           {{Form::submit('Save Disc', ['class'=>'btn btn-primary'])}}
                                               {{Form::close()}}
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                      </div>
                                    </div>
                                    </div>
                             </div>

                             </div>
                             </div><!-- --/Modal-panel ---->

         @endforeach
         @endforeach

         </div>

</div>

     <!-- <div class="row">
      <hr/>
      <div class="col-lg-12">
     <a href="/bag/add"><span class="btn btn-primary">Add Another Bag</span></a>

      </div>
        </div> -->






@stop