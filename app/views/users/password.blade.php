@extends('db')

@section('content')

<div class="showback">

<h2 class="text-center page-header-custom">Byt Lösenord</h2>
<div class="divider-header"></div>
    {{Form::open(['route'=>'account-change-password', 'class'=>'form-horizontal style-form'])}}

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nuvarande Lösenord</label>
                <div class="col-sm-10">

                {{Form::password('current', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Nuvarande lösenord', 'autofocus'])}}
                {{errors_for('current', $errors)}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Nytt Lösenord</label>
                <div class="col-sm-10">

                {{Form::password('new', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Nytt lösenord', 'autofocus'])}}
                {{errors_for('new', $errors)}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Bekräfta Lösenord</label>
                <div class="col-sm-10">

                {{Form::password('confirm', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Bekräfta lösenord', 'autofocus'])}}
                {{errors_for('confirm', $errors)}}
                </div>
            </div>
        {{Form::submit('Byt Lösenord', ['class'=>'btn btn-primary'])}}
        {{Form::token()}}

        {{Form::close()}}



    </div>

@stop