@extends('db')

@section('content')

	<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera tee {{$tee->color}} för {{$tee->course['name']}}</h4>
  {{Form::model($tee, ['method'=>'PATCH', 'route'=> ['tee.update', $tee->id], 'id'=>'tee'])}}

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Färg</label>
          <div class="col-sm-10">

              {{Form::text('color', null, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
              <span class="help-block"></span>

          </div>

        </div>

          <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Antal hål</label>
              <div class="col-sm-10">

                  {{Form::text('holes', null, ['class'=>'form-control', 'data-validation'=>'number', 'data-validation-allowing'=>'range[9;27]', 'data-validation-error-msg'=>'Du måste ange ett nummer mellan 9 och 27'])}}
                  <span class="help-block"></span>

              </div>

            </div>

        {{Form::submit('Uppdatera', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

    <a href="/admin/holes/{{$tee->course['id']}}/tee/{{$tee->id}}/add"><span class="btn btn-theme"><i class=" fa fa-plus"></i>Lägg till hål</span></a>

     <div class="row">

        <div class="col-lg-12">

<h4><i class="fa fa-angle-right"></i>  Redigera hål</h4><hr><table class="table table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Längd</th>
        <th>Par</th>
        <th>Redigera</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tee->hole as $hole)
    <tr>
        <td>{{$hole->number}}</td>
        <td>{{$hole->length}}m</td>
        <td>{{$hole->par}}</td>
        <td><a href="/admin/holes/{{$hole->id}}/edit"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
    </tr>
    @endforeach

    </tbody>
</table>

        </div>
    </div>
     </div>

@stop

@section('scripts')
<script>

$.validate({
  form : '#tee'
});

</script>
@stop