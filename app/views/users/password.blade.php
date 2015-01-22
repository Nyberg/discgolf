@extends('master')

@section('content')

<h4 class="mb"><i class="fa fa-angle-right"></i> Change Password</h4>
    {{Form::open(['route'=>'account-change-password', 'class'=>'form-horizontal style-form'])}}




            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Current Password</label>
                <div class="col-sm-10">

                {{Form::password('current', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Current Password', 'autofocus'])}}
                {{errors_for('current', $errors)}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">

                {{Form::password('new', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'New Password', 'autofocus'])}}
                {{errors_for('new', $errors)}}
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">

                {{Form::password('confirm', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Confirm New Password', 'autofocus'])}}
                {{errors_for('confirm', $errors)}}
                </div>
            </div>
        {{Form::submit('Change Password', ['class'=>'btn btn-primary'])}}
        {{Form::token()}}

        {{Form::close()}}



    </div>

@stop