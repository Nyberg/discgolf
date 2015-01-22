@extends('master')

@section('content')


<div class="row">

    <div class="col-lg-12">
		    <form action="{{ action('RemindersController@postReset') }}" method="POST" class="form-horizontal">
            <input type="hidden" name="token" value="{{ $token }}"/>
		        <h4 class="form-login-heading">Återställ lösenord</h4>

		         <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Email</label>
                     <div class="col-sm-10">
                           {{Form::email('email', null,['class'=>'input-fw input-flat form-control', 'placeholder'=>'Email', 'autofocus'])}}

                     </div>
                 </div>


		         <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Nytt lösenord</label>
                     <div class="col-sm-10">
                           {{Form::password('password', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Password', 'autofocus'])}}

                     </div>
                 </div>


		         <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Bekräfta lösenord</label>
                     <div class="col-sm-10">
                             {{Form::password('password_confirmation', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Password', 'autofocus'])}}

                     </div>
                 </div>

		           <input type="submit" value="Reset Password" class="btn btn-theme"/>





		      </form>
    </div>
	</div>

@stop


