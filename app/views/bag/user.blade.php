@extends('db')


@section('content')

<div class="showback">

                 <h2 class="text-center page-header-custom">Dina Bags</h2>
                 <div class="divider-header"></div>
    @if(count($bags) == 0)
    <p class="text-center"> Du har inga bags än. Klicka på "Skapa ny bag" för att skapa en</p>
    @else
    <p>Klicka på namnet för att visa väskans discar.</p>
      <div class="row">
           <div class="col-lg-12">
                  <table class="table table-hover ">
                  <thead>
                  <tr>
                  <th>Bag</th>
                  <th>Discs</th>
                  <th>Lägg till disc</th>
                  <th>Redigera</th>
                  <th>Ta bort </th>
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
                   <th>Plast</th>
                   <th>Namn</th>
                   <th>Vikt</th>
                   <th>Typ</th>
                   <th>Redigera</th>
                   <th>Ta bort</th>

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
                     {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
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
      <h4 class="modal-title" id="myModalLabel">Redigera Bag</h4>
      </div>

      <div class="modal-body">
       <div class="form-horizontal style-form">
       {{Form::model($bag, ['method'=>'PATCH', 'route'=> ['bag.update', $bag->id], 'id'=>'bag_edit'])}}

      <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Namn</label>
      <div class="col-sm-10">

      {{Form::text('type', $bag->type, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
      </div>
      </div>


      <div class="modal-footer">
      {{Form::submit('Spara', ['class'=>'btn btn-primary'])}}
      {{Form::close()}}
      <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

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
                      <h4 class="modal-title" id="myModalLabel">Lägg till disc i {{$bag->type}}</h4>
                    </div>

                    <div class="modal-body">
                     <div class="form-horizontal style-form">
                    {{Form::open(['route'=>'disc.store', 'class'=>'form-horizontal style-form', 'id'=>'disc_add'])}}
                      {{Form::hidden('id', $bag->id)}}


                     <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                           <div class="col-sm-10">

                               {{Form::text('name', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                           </div>
                       </div>
                       <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Tillverkare</label>
                          <div class="col-sm-10">

                              {{Form::text('author', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                          </div>
                      </div>
                     <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Plast</label>
                          <div class="col-sm-10">

                              {{Form::text('plastic', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                          </div>
                      </div>
                     <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Vikt</label>
                          <div class="col-sm-10">

                              {{Form::text('weight', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                          </div>
                      </div>
                 <div class="form-group">
                                   <label class="col-sm-2 col-sm-2 control-label">Typ</label>
                                   <div class="col-sm-10">

                                      {{Form::select('type', ['Putter'=>'Putter', 'Midrange'=>'Midrange', 'Fairway Driver'=>'Fairway Driver', 'Driver'=>'Driver'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                                   </div>
                               </div>
                               </div>

                    <div class="modal-footer">
                        {{Form::submit('Lägg till disk', ['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                      <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

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
                                         <h4 class="modal-title" id="myModalLabel">Redigera disc - {{$disc->name}}</h4>
                                       </div>

                                       <div class="modal-body">
                                        <div class="form-horizontal style-form">
                                      {{Form::model($disc, ['method'=>'PATCH', 'route'=> ['disc.update', $disc->id], 'id'=>'disc_edit'])}}
                                      {{Form::hidden('bag_id', $bag->id)}}


                                        <div class="form-group">
                                              <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                                              <div class="col-sm-10">

                                                  {{Form::text('name', null, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                                              </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-sm-2 col-sm-2 control-label">Tillverkare</label>
                                             <div class="col-sm-10">

                                                     {{Form::text('author',null, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                                             </div>
                                         </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 col-sm-2 control-label">Plast</label>
                                             <div class="col-sm-10">

                                                 {{Form::text('plastic', null, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                                             </div>
                                         </div>
                                        <div class="form-group">
                                             <label class="col-sm-2 col-sm-2 control-label">Vikt</label>
                                             <div class="col-sm-10">

                                                 {{Form::text('weight', null, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
                                             </div>
                                         </div>
                                    <div class="form-group">
                                                      <label class="col-sm-2 col-sm-2 control-label">Typ</label>
                                                      <div class="col-sm-10">

                                                         {{Form::select('type', ['Putter'=>'Putter', 'Midrange'=>'Midrange', 'Fairway Driver'=>'Fairway Driver', 'Driver'=>'Driver'], $disc->type, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                                                      </div>
                                                  </div>

                                       <div class="modal-footer">
                                           {{Form::submit('Spara disc', ['class'=>'btn btn-primary'])}}
                                               {{Form::close()}}
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Stäng</button>

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

@endif
     <div class="row">

      <div class="col-lg-12">
     <a href="/account/bag/add"><span class="btn btn-primary">Skapa ny bag</span></a>

      </div>
        </div>
</div>




@stop

@section('scripts')

    <script>

    $.validate({
      form : '#bag_edit, #disc_add, #disc_edit'
    });

    </script>

@stop