@extends('login')

@section('content')

 @include('layouts/include/flash')



	  <div id="login-page">
	  	<div class="container">
	  	<div class="form-horizontal">

		     {{Form::open(['route' => 'registration.store', 'class'=>'form-login'])}}

		        <h2 class="form-login-heading">Register</h2>

		        <div class="login-wrap">

    <div class="form-group">
                 <label class="col-sm-12 col-sm-12 control-label">First Name</label>
                 <div class="col-sm-12">


               {{Form::text('first_name', null,['class'=>'input-fw input-flat form-control', 'autofocus'])}}
                {{errors_for('first_name', $errors)}}

                 </div>
             </div>
	   <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">Last Name</label>
                <div class="col-sm-12">
                 {{Form::text('last_name', null,[   'class'=>'input-fw input-flat form-control', 'autofocus'])}}
                {{errors_for('last_name', $errors)}}
                </div>
           </div>
                     <div class="form-group">
                           <label class="col-sm-12 col-sm-12 control-label">Club</label>
                           <div class="col-sm-12">

                       <select name="club" class="form-control">
                       <option value="0">Choose Club</option>
                       @foreach($clubs as $club)
                       <option value="{{$club->id}}">{{$club->name}}</option>
                       @endforeach
                       </select>

                       <span class="help-block">Leave blank if you have no club. All clubless members will become a member of the sites own "club".</span>

                           </div>

                       </div>

              <div class="form-group">
                  <label class="col-sm-12 col-sm-12 control-label">E-mail</label>
                  <div class="col-sm-12">

                     {{Form::email('email', null,['class'=>'input-fw input-flat form-control', 'placeholder'=>'Email', 'autofocus'])}}
                    {{errors_for('email', $errors)}}
                  </div>
              </div>



                <div class="form-group">
                    <label class="col-sm-12 col-sm-12 control-label">Password</label>
                    <div class="col-sm-12">

                    {{Form::password('password', ['class'=>'input-fw input-flat form-control', 'placeholder'=>'Password', 'autofocus'])}}
                    {{errors_for('password', $errors)}}
                    </div>
                </div>

         <div class="form-group">
            <div class="col-sm-offset-0 col-sm-12">
              <div class="checkbox text-center">
                <label>
                {{Form::checkbox('terms', 'Ive read the terms of agreement')}}
            I've read the <a data-toggle="modal" href="login.html#myModal">terms of agreement</a>
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
                          <h4 class="modal-title">Terms of agreement</h4>
                      </div>
                      <div class="modal-body">
                          <p>Enter your e-mail address below to reset your password.</p>

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
