@extends('layouts/login')

@section('content')

 @include('layouts/include/flash')



	  <div id="login-page">
	  	<div class="container">

		     {{Form::open(['route' => 'session.store', 'class'=>'form-login'])}}
		        <h2 class="form-login-heading">sign in now</h2>

		        <div class="login-wrap">

                                        {{Form::email('email', null,['class'=>'input-fw input-flat form-control', 'placeholder'=>'Email', 'autofocus'])}}
		     <br>
                                        {{Form::password('password', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Password', 'autofocus'])}}

		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

		                </span>
		            </label>
		            {{Form::submit('Log in', ['class'=>'btn btn-primary btn-block'])}}
		               {{Form::close()}}
		            <hr>


		            <div class="registration">
		                Don't have an account yet?<br/>
		                <a class="" href="/registration">
		                    Create an account
		                </a>
		            </div>

		        </div>

		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->

		      </form>

	  	</div>
	  </div>








           @stop


