      <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
              <!--logo start-->
              <a href="/" class="logo"><b>Another Awesome Site</b></a>
              <!--logo end-->
              <div class="nav notify-row" id="top_menu">
                  <!--  notification start -->
                  <ul class="nav top-menu">


                  </ul>
                  <!--  notification end -->
              </div>
              <div class="top-menu">
              	<ul class="nav pull-right top-menu">


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

                @if(Auth::user())

           	  <p class="centered"><a href="/user/{{Auth::user()->id}}">

           	    @else

           	      <p class="centered"><a href="/registration">
           	    @endif
                    	  @if(!empty(Auth::user()->image))


                    	   <img src="/img/{{Auth::user()->image}}" class="img-circle" width="60">

                    	  @else

                    	  <img src="/img/avatar.png" class="img-circle" width="60">

                    	  @endif
                    	   </a></p>

                	   @if(Auth::user())
                	    <h5 class="centered">{{Auth::user()->username}}</h5>

                	   @else
                	 <h5 class="centered">Welcome, Guest!</h5>
                        @endif
                    <li class="mt">

                    @if(Auth::user())

                        <a class="active" href="/admin">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>

                    @else

                    @endif
                    </li>

                    <li class="sub-menu">
                                            <a href="javascript:;" >
                                                <i class=" fa fa-bar-chart-o"></i>
                                                <span>Statistics</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a  href="morris.html">Morris</a></li>
                                                <li><a  href="chartjs.html">Chartjs</a></li>
                                            </ul>
                                        </li>

                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-bullseye"></i>
                            <span>Discgolf</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="/round/add">Add round</a></li>
                            @if(Auth::user())
                            <li><a  href="/rounds/{{Auth::User()->id}}/user">Your rounds</a></li>
                            @else

                            @endif
                            <li><a  href="/rounds">All rounds</a></li>
                        </ul>
                    </li>


                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-tree"></i>
                            <span>Courses</span>
                        </a>
                        <ul class="sub">
                        <li><a  href="/course">All Courses</a></li>
                            <li><a  href="blank.html">Find Course</a></li>


                            <li><a  href="lock_screen.html">Favorite Courses</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-users"></i>
                            <span>Players</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="form_component.html">Find players</a></li>
                            <li><a  href="/users">All Players</a></li>
                            <li><a  href="/users">Your Friends</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;" >
                            <i class="fa fa-trophy"></i>
                            <span>Tournaments</span>
                        </a>
                        <ul class="sub">
                            <li><a  href="basic_table.html">Basic Table</a></li>
                            <li><a  href="responsive_table.html">Responsive Table</a></li>
                        </ul>
                    </li>


                   @if(Auth::user())  <li class="sub-menu">
                                            <a href="javascript:;" >
                                                <i class="fa fa-cogs"></i>
                                                <span>Settings</span>
                                            </a>
                                            <ul class="sub">
                                                <li><a  href="calendar.html">Your settings</a></li>
                                                <li><a  href="gallery.html">Your profile</a></li>
                                                <li><a  href="todo_list.html">Item 3</a></li>
                                            </ul>
                                        </li>
                    @else
                    @endif

                    <li class="sub-menu">

                    @if(Auth::user())

                    @else

                    <a class="" href="/registration"><i class="fa fa-user"></i>Sign Up</a></li>


                    </li>

                    @endif


                    <li class="sub-menu">

                    @if(Auth::user())

                    <a class="logout" href="/logout"><i class="fa fa-sign-out"></i>Logout</a></li>

                    @else

                     <a class="login" href="/login"><i class="fa fa-sign-in"></i>Login</a></li>

                    @endif
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

