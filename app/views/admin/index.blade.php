@extends('admin/admin')

@section('content')


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row mt">

               <div class="col-lg-12 main-chart">

                <div class="col-lg-3">
               <h4 class="mb"><i class="fa fa-angle-right"></i> Users</h4>
                <a href="/admin/users"><span class="btn btn-primary btn-block">Edit User</span></a>
                </div>


                  	<div class="col-lg-3">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Club</h4>
                  	 <a href="/admin/club/add"><span class="btn btn-primary btn-block" style="margin-top: 5px;">Add Club</span></a>
                  	<a href="/admin/clubs"><span class="btn btn-primary btn-block" style="margin-top: 5px;">Edit Club</span></a>
                  	</div>

                  	<div class="col-lg-3">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Course</h4>
                    <a href="/admin/course/add"><span class="btn btn-primary btn-block" style="margin-top: 5px;">Add Course</span></a>
                    <a href="/admin/course"><span class="btn btn-primary btn-block" style="margin-top: 5px;">Edit Course</span></a>
                    </div>

           </div><!-- /row -->


					<div class="row">

					</div><!-- /row -->

					<div class="row mt">

					</div><!-- /row -->

                  </div><!-- /col-lg-9 END SECTION MIDDLE -->


      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->


              </div><! --/row -->
          </section>
      </section>


@stop