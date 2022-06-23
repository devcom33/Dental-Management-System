<div class="sidebars close">
  <div class="logo-details">
    <i class="fas fa-tooth" style="padding: 3px;margin-left: 4px;padding-left: 0px;padding-right: 0px;"></i>
      <span class="logo_name"  style="padding: -2px;margin: -3px;padding-right: 76px;padding-top: 7px">FSADENT</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="{{route('home.indxassistant',[$id_Assistant, $fk_Doctor]) }}">
          <i class="fas fa-home"></i>
          <span class="link_name">Accueil</span>
        </a>
      </li>
  
      <li>
        <a href="{{ route('assistant.index',[$id_Assistant, $fk_Doctor]) }}">
        <i class="fa fa-user" aria-hidden="true"></i>
          <span class="link_name">Patient</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('assistant.index',[$id_Assistant, $fk_Doctor]) }}">Patient</a></li>
        </ul>
      </li> 
      <li>
        <div class="iocn-link">
          <a href="{{ route('consultationassistant.index',[$id_Assistant, $fk_Doctor]) }}">
          <i class="fas fa-comments"></i>
            <span class="link_name">Consultation</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
           <ul class="sub-menu">
            <li><a class="link_name" href="{{ route('consultationassistant.index',[$id_Assistant, $fk_Doctor]) }}" >Consultation</a></li>
            <li><a href="{{ route('consultationassistant.index',[$id_Assistant, $fk_Doctor]) }}" >Ajoute Consultation</a></li>
          </ul>
      </li>

      <li>
        <div class="iocn-link">
          <a href="{{ route('fullcalenderA.index',[$id_Assistant, $fk_Doctor]) }}">
          <i class="fas fa-calendar-alt"></i>
            <span class="link_name">Calendrier  </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i> 
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('fullcalenderA.index',[$id_Assistant, $fk_Doctor]) }}">Calendrier  </a></li>
          <li><a href="{{route('pending',[$id_Assistant, $fk_Doctor])}}">liste d'attente</a></li>
          <li><a href="{{route('completed',[$id_Assistant, $fk_Doctor])}}">liste approuvé</a></li>
        </ul>
      </li> 
  </ul>
  </div>

  <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top" style="margin-left: 0px;margin-right: 0px;">
    <div class="container-fluid"><button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3" type="button">
        <i class="fas fa-bars"></i>
        </button>
      </div>
      <ul class="navbar-nav flex-nowrap ms-auto">
      
                <div class="d-none d-sm-block topbar-divider"></div>
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Assistant</span><img class="border rounded-circle img-profile" src="{{asset('assets/img/patient (1).png')}}" /></a>
                        <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                            <a class="dropdown-item" href="{{route('logoutAssistant')}}"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i> Logout</a>
                        </div>
                    </div>
                </li>
        </ul>

</nav>