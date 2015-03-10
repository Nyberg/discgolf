@extends('db')

@section('content')
        <div class="showback">
            <div class="row mtbox">
                <div class="col-md-5 col-sm-5 col-md-offset-1 box0">
                  <a  href="/account/edit/{{Auth::id()}}/user">  <div class="box1">
                        <span class="li_user"></span>
                        <h4>Användare</h4>
                    </div>
                        <p>Redigera din profil</p></a>
                </div>
                      <div class="col-md-5 col-sm-5 box0">
                      <a href="/account/round/add/">  <div class="box1">
                            <span class="li_star"></span>
                            <h4>Runda</h4>
                        </div>
                            <p>Lägg till runda</p>
                      </a>
                    </div>
            </div><!-- /row mt -->
            <div class="row">

            </div><!-- /row -->

            <div class="row mt">

            </div><!-- /row -->
</div>


@stop