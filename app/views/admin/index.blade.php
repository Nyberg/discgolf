@extends('db')

@section('content')

            <div class="row mtbox">
                <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  <a  href="/admin/users">  <div class="box1">
                        <span class="li_user"></span>
                        <h4>Användare</h4>
                    </div>
                        <p>Redigera användare</p></a>
                </div>
                <div class="col-md-2 col-sm-2 box0">
                   <a href="/admin/clubs/"> <div class="box1">
                        <span class="li_star"></span>
                        <h4>Klubbar</h4>
                    </div>
                        <p>Hantera klubbar</p></a>
                </div>
                   <div class="col-md-2 col-sm-2 box0">
                    <a  href="/admin/course/"> <div class="box1">
                        <span class="li_cloud"></span>
                        <h4>Banor</h4>
                    </div>
                        <p>Hantera banor</p></a>
                </div>

                    <div class="col-md-2 col-sm-2 box0">
                      <a href="#">  <div class="box1">
                            <span class="li_bubble"></span>
                            <h4>Kommentarer</h4>
                        </div>
                            <p>Hantera kommentarer</p></a>
                    </div>
                      <div class="col-md-2 col-sm-2 box0">
                      <a href="/admin/club/owners">  <div class="box1">
                            <span class="li_lock"></span>
                            <h4>Klubbägare</h4>
                        </div>
                            <p>Visa klubbägare</p></a>
                    </div>




            </div><!-- /row mt -->


        <div class="row mt">
            <div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                <a  href="/admin/location">  <div class="box1">
                <span class="li_world"></span>
                <h4>Geografi</h4>
                </div>
                <p>Länder, Landskap & Städer</p></a>

            </div>

            <div class="col-md-2 col-sm-2 box0">
                <a  href="/admin/links">  <div class="box1">
                <span class="li_key"></span>
                <h4>Länkar</h4>
                </div>
                <p>Redigera länkar</p></a>
            </div>

            <div class="col-md-2 col-sm-2 box0">
                <a  href="/admin/alfa">  <div class="box1">
                <span class="li_fire"></span>
                <h4>Alfatest</h4>
                </div>
                <p>Alfatest</p></a>
            </div>

        </div><!-- /row -->


            <div class="row">

            </div><!-- /row -->

            <div class="row mt">

            </div><!-- /row -->



@stop