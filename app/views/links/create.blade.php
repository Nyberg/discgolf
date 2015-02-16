@extends('db')

@section('content')
<div class="showback">
    <div class="row">
        <div class="col-md-12">
              <h2 class="text-center page-header-custom">Skapa Länk</h2>
              <div class="divider-header"></div>
        </div>

        <div class="col-md-12">

         {{Form::open(['method' => 'post', 'route'=>'links.store'])}}
                <div class="form-group">
                    {{Form::label('namn','Namn')}}
                    {{Form::text('name', '', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('link','Länk')}}
                    {{Form::text('link', 'http://', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('type','Typ')}}
                    {{Form::select('type', ['club'=>'Klubb', 'disc'=>'Disktillverkare','comp'=>'Tävling', 'other'=>'Övrigt'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                </div>
         {{Form::submit('Spara', ['class'=>'btn btn-success btn-sm'])}}
         {{Form::close()}}

        </div>

    </div>
</div>

@stop