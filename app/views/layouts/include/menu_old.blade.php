   <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/" class="logo"><b>Penguin Project - Dashboard</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li class=""><a class="logout" href="/">Tillbaka till startsidan</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="/user/{{Auth::id()}}/show"><img src="{{Auth::user()->image}}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</h5>
              	  	
                  <li class="mt">

                  @if(Auth::user()->hasRole('Admin'))
                        <a class="active" href="/admin">
                        <i class="fa fa-dashboard"></i>
                        <span>Adminpanel</span>
                    </a>
                  @else
                      <a class="active" href="/dashboard">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  @endif
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tree"></i>
                          <span>Rundor</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/account/round/add">Lägg till runda</a></li>
                          <li><a  href="/account/rounds/{{Auth::id()}}/user">Hantera dina rundor</a></li>
                      </ul>
                  </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-spinner"></i>
                            <span>Bag</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="/account/user/{{Auth::id()}}/bags">Hantera dina bags</a></li>
                            <li><a  href="/account/user/{{Auth::id()}}/lost-and-found">Lost & Found</a></li>

                        </ul>
                    </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-home"></i>
                          <span>Klubb</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/club/{{Auth::user()->club_id}}/show">Besök din klubb</a></li>
                          @if(Auth::user()->hasRole('ClubOwner'))
                          <li><a  href="/admin/club/{{Auth::user()->club_id}}/edit">Redigera din klubb</a></li>
                          <li><a  href="/admin/club/{{Auth::user()->club_id}}/users">Hantera medlemmar</a></li>
                          <li><a  href="/admin/club/{{Auth::user()->club_id}}/courses">Hantera din klubbs banor</a></li>
                          <li><a  href="/admin/course/add">Lägg till bana</a></li>
                          @else
                          @endif

                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-money"></i>
                          <span>Sponsorer</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/account/sponsor/add">Lägg till en sponsor</a></li>
                          <li><a  href="/account/sponsor/user">Hantera dina sponsorer</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-pencil"></i>
                          <span>Recensioner</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/account/review/add">Skriv en recension</a></li>
                          <li><a  href="/account/review/user">Hantera dina recensioner</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-comment-o"></i>
                          <span>Kommentarer</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/account/comment/user/">Hantera dina kommentarer</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Profil</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="/account/edit/{{Auth::id()}}/user">Redigera din profil</a></li>
                          <li><a  href="/account/user/password/">Byt lösenord</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="/logout" >
                          <i class=" fa fa-sign-out"></i>
                          <span>Logga ut</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      