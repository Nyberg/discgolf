@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

    	<div class="row mt">
                <div class="col-lg-12">
                  <div class="showback">


                          <h4><i class="fa fa-angle-right"></i> Your Profile</h4>

                  <a href="/admin/{{Auth::User()->id}}/edit/user"><span class="btn btn-primary">Edit Your Settings</span></a>

                  </div>
                    </div>
            </div>
</section>
</section>
@stop