 <!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
     <a href="index.html">
      <img src="{{asset('')}}assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
      <h5 class="logo-text">ADMIN PORTAL</h5>
    </a>
  </div>

  <ul class="sidebar-menu">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="{{route('home')}}" class="waves-effect">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>
     <li>
        <a href="{{route('users')}}" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Users</span>
        </a>
      </li>
      <li>
        <a href="{{route('cordinates')}}" class="waves-effect">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Coordinates</span>
        </a>
      </li>



    </ul>

  </div>
  <!--End sidebar-wrapper-->
