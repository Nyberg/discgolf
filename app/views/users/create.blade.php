@extends('master')


@section('content')


<div class="container">

    <div class="row">

    @include('/layouts/include/flash')

    <div class="col-md-12">

        <h4>Registration</h4>

        {{Form::open(['route'=>'registration.store'])}}
        {{Form::label('first_name', 'First Name')}}
        {{Form::text('first_name', null, ['class'=>'form-control'])}}
        {{Form::label('last_name', 'Last Name')}}
                {{Form::text('last_name', null, ['class'=>'form-control'])}}
         {{Form::label('email', 'Email')}}
        {{Form::email('email', null, ['class'=>'form-control'])}}
     {{Form::label('password', 'Lösenord')}}
            {{Form::password('password', ['class'=>'form-control'])}}
    <br/>
        {{Form::submit('Save', ['class'=>'btn btn-primary'])}}

        {{Form::close()}}



    </div>

    </div>

</div>


@stop