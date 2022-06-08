<div class="sidebars close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">FSADENT</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Accueil</span>
        </a>
      </li>
      <li>
        <a href="{{ route('assistant.index',[$id_Assistant, $fk_Doctor]) }}">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Patient</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('assistant.index',[$id_Assistant, $fk_Doctor]) }}">Patient</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('consultationassistant.index',[$id_Assistant, $fk_Doctor]) }}">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Consultation</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('consultationassistant.index',[$id_Assistant, $fk_Doctor]) }}">Consultation</a></li>
          <li><a href="">Ajoute Consultation</a></li>
          <li><a href="#">Ajoute Traitement</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('fullcalenderA.index',[$id_Assistant, $fk_Doctor]) }}">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Calendrier  </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('fullcalenderA.index',[$id_Assistant, $fk_Doctor]) }}">Calendrier  </a></li>
          <li><a href="{{route('pending',[$fk_Doctor])}}">liste d'attente</a></li>
          <li><a href="{{route('completed',[$fk_Doctor])}}">liste approuvé</a></li>
        </ul>
      </li>  
  </ul>
  </div>