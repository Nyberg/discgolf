@extends('master')

@section('content')

<div class="container">
<div class="row">

<div class="span4"></div>
<div class="span4">
 @include('layouts/include/flash')



<div class="panel panel-stack">
                  <div class="panel panel-stack-first">
                    <h4><strong>Sign in</strong></h4>

                    @if(!empty($errors->first('email')))
                    <div class="alert alert-danger">
                     <em class="icon-exclamation"></em>  {{ $errors->first('email') }}
                    </div>

                    @endif
                    @if(!empty($errors->first('password')))
                     <div class="alert alert-danger">
                          <em class="icon-exclamation"></em>  {{ $errors->first('password') }}
                     </div>
                    @endif

                        		</p>



                     {{Form::open(['route' => 'session.store'])}}
                     {{Form::label('email', 'Email')}}
                     {{Form::email('email', null,['class'=>'input-fw input-flat', 'placeholder'=>'Email'])}}
                     {{Form::label('password', 'Password')}}
                     {{Form::password('password', ['class'=>'input-fw input-flat', 'placeholder'=>'Password'])}}
                    {{Form::submit('Log in', ['class'=>'btn btn-primary pull-right'])}}
                                     {{Form::close()}}
                                     <br/>
                  </div>
    <div class="panel panel-stack-last panel-primary">
                        <div class="text-center">

                        </div>
                      </div>

                </div>
        </div>

<div class="span4"></div>

              </div>
              </div>
</div>
           @stop


