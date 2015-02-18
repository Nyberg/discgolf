@extends('login')

@section('content')

 @include('layouts/include/flash')



	  <div id="login-page">
	  	<div class="container">

		     {{Form::open(['route' => 'activation.store', 'class'=>'form-login', 'id'=>'login'])}}

		        <h2 class="form-login-heading">Anmälan Alfatester</h2>

		        <div class="login-wrap">

                                        {{Form::email('email', null,['class'=>'input-fw input-flat form-control', 'placeholder'=>'Email', 'autofocus', 'data-validation'=>'email'])}}
                                        <br>
                                        {{Form::text('name', null,['class'=>'input-fw input-flat form-control', 'placeholder'=>'Namn', 'autofocus', 'data-validation'=>'required'])}}
		     <br>

		            {{Form::submit('Skicka anmälan', ['class'=>'btn btn-primary btn-block'])}}

		               {{Form::close()}}
		            <hr>
		          <!-- modal -->

		      </form>

		      		            <div class="registration">
              		                Är du redan medlem?<br/>
              		                <a class="" href="/login">
              		                    Logga in
              		                </a>
              		            </div>

	  	</div>
	  </div>

@stop

        @section('scripts')
        <script>

            $.validate({
              form : '#login'
            });

        </script>
        @stop



