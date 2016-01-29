<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse "> 
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="header-seperation"> 
            <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu" class=""> <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
            </ul>
            <!-- BEGIN LOGO -->	
            <a href="index.html">
                <img src="{{asset('img/logo.png')}}" class="logo pull-left" data-src="{{asset('img/logo.png')}}" data-src-retina="{{asset('img/logo2x.png')}}" width="106" height="92" /></a>
            <!-- END LOGO --> 
            <script>
                function nWindow (w, h)
                {
                NWin = window.open("", "NW", "fullscreen=yes, toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no, width=" + w + ",height=" + h);
                        NWin.focus();
                }
            </script>
            <ul class="nav pull-right notifcation-center">	
                <li class="dropdown" id="header_task_bar"> <a href="{{ URL::to('/') }}"  class="dropdown-toggle active" data-toggle=""> <div class="iconset top-home"></div> </a> </li>
                <li class="dropdown" id="header_task_bar"> <a href="{{ URL::to('pos') }}" onclick="nWindow();" target="NW" onclick="window.open('');" class="dropdown-toggle active" data-toggle=""> <div class="iconset icon-custom-ui"></div> </a> </li>
                <!--<li class="dropdown" id="header_inbox_bar"> <a href="email.html" class="dropdown-toggle"> <div class="iconset top-messages"></div>  <span class="badge" id="msgs-badge">2</span> </a>
                        </li><li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle"> <div class="iconset top-chat-white "></div> </a> </li>        -->
            </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER --> 
        <div class="header-quick-nav"> 
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="pull-left"> 
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle"><div class="iconset top-menu-toggle-dark"></div> </a> </li>        
                </ul>
                <ul class="nav quick-section">
                    <li class="quicklinks"> <a href="#" class=""><div class="iconset top-reload"></div> </a> </li> 
                    <li class="quicklinks"> <span class="h-seperate"></span></li>
                    <li class="quicklinks"> <a href="#" class=""><div class="iconset top-tiles"></div></a> </li>
                    <div class="input-prepend inside search-form no-boarder">
                        <span class="add-on"> <a href="#" class=""><div class="iconset top-search"></div></a></span>
                        <input name="" type="text" class="no-boarder " placeholder="Search Dashboard" style="width:250px;" />
                    </div>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
            <!-- BEGIN CHAT TOGGLER -->
            <div class="pull-right"> 
                <div class="chat-toggler">	
                    <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" data-content='
                       <div style="width:300px" class="scroller" data-height="100px">
                       <div class="notification-messages info">
                       <div class="user-profile">
                       <img src="{{asset('img/profiles/d.jpg')}}" data-src="{{asset('img/profiles/d.jpg')}}" data-src-retina="{{asset('img/profiles/d2x.jpg')}}" width="35" height="35">
                       </div>
                       <div class="message-wrapper">
                       <div class="heading">
                       David Nester - Commented on your wall
                       </div>
                       <div class="description">
                       Meeting postponed to tomorrow
                       </div>
                       <div class="date pull-left">
                       A min ago
                       </div>										
                       </div>
                       <div class="clearfix"></div>									
                       </div>	
                       <div class="notification-messages danger">
                       <div class="iconholder">
                       <i class="icon-warning-sign"></i>
                       </div>
                       <div class="message-wrapper">
                       <div class="heading">
                       Server load limited
                       </div>
                       <div class="description">
                       Database server has reached its daily capicity
                       </div>
                       <div class="date pull-left">
                       2 mins ago
                       </div>
                       </div>
                       <div class="clearfix"></div>
                       </div>	
                       <div class="notification-messages success">
                       <div class="user-profile">
                       <img src="{{asset('img/profiles/h.jpg')}}" data-src="{{asset('img/profiles/h.jpg')}}" data-src-retina="{{asset('img/profiles/h2x.jpg')}}" width="35" height="35">
                       </div>
                       <div class="message-wrapper">
                       <div class="heading">
                       You haveve got 150 messages
                       </div>
                       <div class="description">
                       150 newly unread messages in your inbox
                       </div>
                       <div class="date pull-left">
                       An hour ago
                       </div>									
                       </div>
                       <div class="clearfix"></div>
                       </div>							
                       </div>' data-toggle="dropdown" data-original-title="Notifications">
                        <div class="user-details"> 
                            <div class="username">
                                <span class="badge badge-important">3</span> 
                                {{Auth::user()->firstname}} <span class="bold">{{Auth::user()->lastname}}</span>									
                            </div>						
                        </div> 
                        <div class="iconset top-down-arrow"></div>
                    </a>						
                    <div class="profile-pic"> 
                        <img alt="" src="{{asset('img/profiles/avatar_small.jpg')}}" data-src="{{asset('img/profiles/avatar_small.jpg')}}" data-src-retina="{{asset('img/profiles/avatar_small2x.jpg')}}" width="35" height="35" />
                    </div>       			
                </div>
                <ul class="nav quick-section ">
                    <li class="quicklinks"> 
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
                            <div class="iconset top-settings-dark "></div> 	
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
                            <li><a href="user-profile.html"> My Account</a>
                            </li>
                            <li><a href="calender.html">My Calendar</a>
                            </li>
                            <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a>
                            </li>
                            <li class="divider"></li>                
                            <li><a href="{{ URL::to('logout') }}"><i class="icon-off"></i>&nbsp;&nbsp;Log Out</a></li>
                        </ul>
                    </li> 
                    <li class="quicklinks"> <span class="h-seperate"></span></li> 
                    <li class="quicklinks"> 	
                        <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle"><div class="iconset top-chat-dark "><span class="badge badge-important hide" id="chat-message-count">1</span></div>
                        </a> 
                        <div class="simple-chat-popup chat-menu-toggle hide">
                            <div class="simple-chat-popup-arrow"></div><div class="simple-chat-popup-inner">
                                <div style="width:100px">
                                    <div class="semi-bold">David Nester</div>
                                    <div class="message">Hey you there </div>
                                </div>
                            </div>
                        </div>
                    </li> 
                </ul>
            </div>
            <!-- END CHAT TOGGLER -->
        </div> 
        <!-- END TOP NAVIGATION MENU --> 

    </div>
    <!-- END TOP NAVIGATION BAR --> 
</div>

<!-- END HEADER --> 