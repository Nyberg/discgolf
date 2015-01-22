@extends('login')

@section('content')

 @include('layouts/include/flash')



	  <div id="login-page">
	  	<div class="container">

		     {{Form::open(['route' => 'session.store', 'class'=>'form-login'])}}

		        <h2 class="form-login-heading">logga in</h2>

		        <div class="login-wrap">

                                        {{Form::email('email', null,['class'=>'input-fw input-flat form-control', 'placeholder'=>'Email', 'autofocus'])}}
		     <br>
                                        {{Form::password('password', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Password', 'autofocus'])}}

		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal">Glömt Lösenord?</a>

		                </span>
		            </label>
		            {{Form::submit('Logga in', ['class'=>'btn btn-primary btn-block'])}}

		               {{Form::close()}}
		            <hr>


		            <div class="registration">
		                Är du inte medlem?<br/>
		                <a class="" href="/registration">
		                    Skapa användare
		                </a>
		            </div>

		        </div>

		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		                          <h4 class="modal-title">Glömt Lösenord?</h4>

		                      </div>

		                      <div class="modal-body">

                                <p>Skriv in din email-adress nedan för att återställa ditt lösenord.</p>
                               <form action="{{ action('RemindersController@postRemind') }}" method="POST">

                                {{Form::email('email', null,['class'=>'form-control placeholder-no-fix', 'placeholder'=>'Email', 'autocomplete'=>'off','autofocus'])}}

                                </div>
                                <div class="modal-footer">
                                <input type="submit" class="btn btn-theme" value="Återställ">

                                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>


		                      </div>

		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>

@stop


