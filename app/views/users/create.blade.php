@extends('login')

@section('content')

 @include('layouts/include/flash')



	  <div id="login-page">
	  	<div class="container">
	  	<div class="form-horizontal">

		     {{Form::open(['route' => 'registration.store', 'class'=>'form-login'])}}

		        <h2 class="form-login-heading">Bli medlem idag!</h2>

		        <div class="login-wrap">

    <div class="form-group">
                 <label class="col-sm-12 col-sm-12 control-label">Förnamn</label>
                 <div class="col-sm-12">


               {{Form::text('first_name', null,['class'=>'input-fw input-flat form-control', 'autofocus'])}}
                {{errors_for('first_name', $errors)}}

                 </div>
             </div>
	   <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Efternamn</label>
                <div class="col-sm-12">
                 {{Form::text('last_name', null,[   'class'=>'input-fw input-flat form-control', 'autofocus'])}}
                {{errors_for('last_name', $errors)}}
                </div>
           </div>

              <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">E-mail</label>
                  <div class="col-sm-12">

                     {{Form::email('email', null,['class'=>'input-fw input-flat form-control', 'autofocus'])}}
                    {{errors_for('email', $errors)}}
                  </div>
              </div>



                <div class="form-group">
                    <label class="col-sm-12 col-sm-12 control-label">Lösenord</label>
                    <div class="col-sm-12">

                    {{Form::password('password', ['class'=>'input-fw input-flat form-control', 'autofocus'])}}
                    {{errors_for('password', $errors)}}
                    </div>
                </div>

         <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
              <div class="checkbox text-center">
                <label>
                {{Form::checkbox('terms', 'Ive read the terms of agreement')}}
            Jag har läst <a data-toggle="modal" href="login.html#myModal">och förstått villkoren</a>
                </label>
              </div>
                  {{errors_for('terms', $errors)}}
            </div>
          </div>

            {{Form::submit('Register', ['class'=>'btn btn-primary btn-block'])}}
            {{Form::close()}}

		        </div>

        </div>

          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Villkor</h4>
                      </div>
                      <div class="modal-body">
                          <p>Skriv villkor här..</p>

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Got it!</button>

                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

	  	</div>
	  </div>

@stop
