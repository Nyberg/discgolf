@extends('admin/admin')

@section('content')


    		<div class="span4">
     <!-- Profile Model 3 -->
                    <div class="panel">
                      <div class="valign">
                        <div class="text-center cell-1-3" >
                          <img src="/img/me.png" class="img-circle img-polaroid" alt="" style="width: 100px; height: 100px">
                        </div>
                        <div>

                          <ul class="icons-ul unstyled">
                            <li><em class="icon-fixed-width icon-user"></em>{{Auth::User()->username}}</li>

                            <li><em class="icon-fixed-width icon-envelope"></em> <a href="#">{{Auth::User()->email}}</a></li>
                          </ul>
                        </div>

                      </div>
                    </div>
                  <a href="/admin/{{Auth::User()->id}}/edit_settings"><button class="btn btn-primary btn-block">Edit Settings</button></a>

@stop