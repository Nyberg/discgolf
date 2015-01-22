

@extends('master')

@section('content')


<div class="row">
    <div class="col-lg-12">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Permissions</h4>



     <table class="table table-striped table-advance table-hover">
          <thead>
          <tr>
              <th>Rättigheter</th>
              <th>Ta bort</th>
          </tr>
          </thead>
          <tbody>

        @foreach($user->roles as $role)

       <tr>
            <td>{{$role->name}}</td>
            <td>
                {{Form::open(['method'=>'DELETE', 'route'=>['role.destroy', $role->id]])}}
                {{Form::hidden('user', $user->id)}}
                {{Form::submit('Ta Bort', ['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

     </div>

     <div class="row">
            <div class="col-lg-12">
                {{Form::open(['route'=>'role.store'])}}
                {{Form::hidden('id', $user->id)}}
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Permissions</label>
        <div class="col-sm-10">

        {{Form::select('role',$roles, '', array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

        </div>


        <div class="col-sm-10">
    {{Form::submit('Lägg till rättighet', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
        </div>
    </div>
    </div>
    </div>
</div>


@stop