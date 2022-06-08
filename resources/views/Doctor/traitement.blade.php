<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Doctor.layout.bootstrap')
    
    <title>Traitement</title>
</head>
<body>
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
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Patient</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Patient</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('consultationdoctor.index') }}">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Consultation</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('consultationdoctor.index') }}">Consultation</a></li>
          <li><a href="{{ route('consultationdoctor.index') }}">Ajoute Consultation</a></li>
          <li><a href="{{route('traitement.index')}}">Ajoute Traitement</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Calendrier  </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Calendrier  </a></li>
          <li><a href="#">Ajoute Rendez-vous</a></li>
          <li><a href="#">liste d'attente</a></li>
          <li><a href="#">liste approuvé</a></li>
        </ul>
      </li>
      
    
</ul>
  </div>
  <section class="home-section">

        
      <i class='bx bx-menu' ></i>
            <div class="main">
                <div class="container">
                <div class="col-sm-12 col-md-8 col-lg-10">
                <form method="POST" action="{{route('traitement.store')}}">
                    @csrf  
                        <div class="mb-3">
                            <label class="form-label">Nom de Traitement</label>
                            <input name="nomtraitement" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prix(DH)</label>
                            <input name="prix" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajoute</button>
                </form>
                </div>
                </div>
            </div>

    </section>
</body>
<script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
          arrow[i].addEventListener("click", (e)=>{
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
          });
        }
        let sidebar = document.querySelector(".sidebars");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
          sidebar.classList.toggle("close");
        });
      </script>
      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/theme.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
  
</html>