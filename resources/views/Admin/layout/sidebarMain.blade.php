
<div class="sidebars close">

  <div class="logo-details">
  <i class="fas fa-tooth" style="padding: 3px;margin-left: 4px;padding-left: 0px;padding-right: 0px;"></i>
    <span class="logo_name"  style="padding: -2px;margin: -3px;padding-right: 76px;padding-top: 7px">FSADENT</span>
  </div>
  <ul class="nav-links">
      <li>
        <a href="{{ route('home.indexadmin')}}">
          <i class='fas fa-home' ></i>
          <span class="link_name">Accueil</span>
        </a>
      </li>
      <li>
        <a href="{{ route('addoctor') }}">
          <i class='fa fa-user' ></i>
          <span class="link_name">Doctor</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('addoctor') }}">Doctor</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('adassistant') }}">
          <i class='fa fa-user' ></i>
          <span class="link_name">Assistant</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('adassistant') }}">Assistant</a></li>
        </ul>
      </li>
</div>
<nav class="navbar navbar-light navbar-expand bg-white mb-4 topbar static-top" style="margin-left: 0px;margin-right: 0px;">
    <div class="container-fluid"><button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3" type="button">
        <i class="fas fa-bars"></i>
        </button>
      </div>
      <ul class="navbar-nav flex-nowrap ms-auto">
      
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Admin</span><img class="border rounded-circle img-profile" src="{{asset('assets/img/patient (1).png')}}" /></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout</a>
                        </div>
                    </div>
                </li>
        </ul>

</nav>