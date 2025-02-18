<!-- Page Header Start-->
<div class="page-main-header">
   <div class="main-header-left">
      <div class="logo-wrapper"><a href="{{url('/')}}"><img class="blur-up lazyloaded" src="{{ asset('assets/images/layout-2/logo/logo.png') }}" alt=""></a></div>
   </div>
   <div class="main-header-right row">
      <div class="mobile-sidebar">
         <div class="media-body text-right switch-sm">
            <label class="switch">
               <input id="sidebar-toggle" type="checkbox" checked="checked"><span class="switch-state"></span>
            </label>
         </div>
      </div>
      <div class="nav-right col">
         <ul class="nav-menus">
            <li>
               <form class="form-inline search-form">
                  <div class="form-group">
                     <input class="form-control-plaintext" type="search" placeholder="Search.."><span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                  </div>
               </form>
            </li>
            <li class="onhover-dropdown"><a class="txt-dark" href="#">
            <h6>EN</h6></a>
            <ul class="language-dropdown onhover-show-div p-20">
               <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i> Portuguese</a></li>
               <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i> Spanish</a></li>
               <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i> English</a></li>
               <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i> French</a></li>
            </ul>
         </li>
         <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
         <li class="onhover-dropdown"><i data-feather="bell"></i><span class="badge badge-pill badge-primary pull-right notification-badge">3</span><span class="dot"></span>
         <ul class="notification-dropdown onhover-show-div p-0">
            <li>
               <div class="media">
                  <div class="notification-icons bg-success mr-3"><i data-feather="thumbs-up"></i></div>
                  <div class="media-body">
                     <h6 class="font-success">Someone Likes Your Posts</h6>
                     <p class="mb-0"> 2 Hours Ago</p>
                  </div>
               </div>
            </li>
            <li>
               <div class="media">
                  <div class="notification-icons bg-info mr-3"><i data-feather="message-circle"></i></div>
                  <div class="media-body">
                     <h6 class="font-info">3 New Comments</h6>
                     <p class="mb-0"> 1 Hours Ago</p>
                  </div>
               </div>
            </li>
            <li>
               <div class="media">
                  <div class="notification-icons bg-secondary mr-3"><i data-feather="download"></i></div>
                  <div class="media-body">
                     <h6 class="font-secondary">Download Complete</h6>
                     <p class="mb-0"> 3 Days Ago</p>
                  </div>
               </div>
            </li>
            <li class="bg-light txt-dark"><a href="#" data-original-title="" title="">All </a> notification</li>
         </ul>
      </li>
      <li><a href="#"><i class="right_side_toggle" data-feather="message-square"></i><span class="dot"></span></a></li>
      <li class="onhover-dropdown">
         <div class="media align-items-center"><img class="align-self-center pull-right img-50 rounded-circle blur-up lazyloaded" src="{{ asset('assets/images/dashboard/man.png')}}" alt="header-user">
            <div class="dotted-animation"><span class="animate-circle"></span><span class="main-circle"></span></div>
         </div>
         <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
            <li><a href="#">Profile<span class="pull-right"><i data-feather="user"></i></span></a></li>
            <li><a href="#">Inbox<span class="pull-right"><i data-feather="mail"></i></span></a></li>
            <li><a href="#">Taskboard<span class="pull-right"><i data-feather="file-text"></i></span></a></li>
            <li><a href="#">Settings<span class="pull-right"><i data-feather="settings"></i></span></a></li>
         </ul>
      </li>
   </ul>
   <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
</div>
</div>
</div>
<!-- Page Header Ends -->