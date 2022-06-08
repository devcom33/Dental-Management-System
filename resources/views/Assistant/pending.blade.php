<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    <title>Doctor</title>

    <style>
  /* The sidebar menu */
 .sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
   width: 160px; /* Set the width of the sidebar */
   position: fixed; /* Fixed Sidebar (stay in place on scroll) */
   top: 0; /* Stay at the top */
   left: 0;
   overflow-y: hidden;
   overflow-x: hidden; /* Disable horizontal scroll */
 }
 
 /* The navigation menu links */
 .sidenav a {
   padding: 6px 8px 6px 16px;
   text-decoration: none;
   font-size: 25px;
   color: #818181;
   display: block;
 }
 
 /* When you mouse over the navigation links, change their color */
 .sidenav a:hover {
   color: #f1f1f1;
 }
 
 /* Style page content */
 .main {
   margin-left: 160px; /* Same as the width of the sidebar */
   padding: 0px 10px;
 }
 
 /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
 @media screen and (max-height: 450px) {
   .sidenav {padding-top: 15px;}
   .sidenav a {font-size: 18px;}
 }
 /* ------------------------------------------------ ----------------------------------------------*/
 /* Add a black background color to the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}
/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}
/* Style the search box inside the navigation bar */
.topnav input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}
/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}
   </style>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.sidebars{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 260px;
  background: #11101d;
  z-index: 100;
  transition: all 0.5s ease;
}
.sidebars.close{
  width: 78px;
}
.sidebars .logo-details{
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
}
.sidebars .logo-details i{
  font-size: 30px;
  color: #fff;
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
}
.sidebars .logo-details .logo_name{
  font-size: 22px;
  color: #fff;
  font-weight: 600;
  transition: 0.3s ease;
  transition-delay: 0.1s;
}
.sidebars.close .logo-details .logo_name{
  transition-delay: 0s;
  opacity: 0;
  pointer-events: none;
}
.sidebars .nav-links{
  height: 100%;
  padding: 30px 0 150px 0;
  overflow: auto;
}
.sidebars.close .nav-links{
  overflow: visible;
}
.sidebars .nav-links::-webkit-scrollbar{
  display: none;
}
.sidebars .nav-links li{
  position: relative;
  list-style: none;
  transition: all 0.4s ease;
}
.sidebars .nav-links li:hover{
  background: #1d1b31;
}
.sidebars .nav-links li .iocn-link{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.sidebars.close .nav-links li .iocn-link{
  display: block
}
.sidebars .nav-links li i{
  height: 50px;
  min-width: 78px;
  text-align: center;
  line-height: 50px;
  color: #fff;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.sidebars .nav-links li.showMenu i.arrow{
  transform: rotate(-180deg);
}
.sidebars.close .nav-links i.arrow{
  display: none;
}
.sidebars .nav-links li a{
  display: flex;
  align-items: center;
  text-decoration: none;
}
.sidebars .nav-links li a .link_name{
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  transition: all 0.4s ease;
}
.sidebars.close .nav-links li a .link_name{
  opacity: 0;
  pointer-events: none;
}
.sidebars .nav-links li .sub-menu{
  padding: 6px 6px 14px 80px;
  margin-top: -10px;
  background: #1d1b31;
  display: none;
}
.sidebars .nav-links li.showMenu .sub-menu{
  display: block;
}
.sidebars .nav-links li .sub-menu a{
  color: #fff;
  font-size: 15px;
  padding: 5px 0;
  white-space: nowrap;
  opacity: 0.6;
  transition: all 0.3s ease;
}
.sidebars .nav-links li .sub-menu a:hover{
  opacity: 1;
}
.sidebars.close .nav-links li .sub-menu{
  position: absolute;
  left: 100%;
  top: -10px;
  margin-top: 0;
  padding: 10px 20px;
  border-radius: 0 6px 6px 0;
  opacity: 0;
  display: block;
  pointer-events: none;
  transition: 0s;
}
.sidebars.close .nav-links li:hover .sub-menu{
  top: 0;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
}
.sidebars .nav-links li .sub-menu .link_name{
  display: none;
}
.sidebars.close .nav-links li .sub-menu .link_name{
  font-size: 18px;
  opacity: 1;
  display: block;
}
.sidebars .nav-links li .sub-menu.blank{
  opacity: 1;
  pointer-events: auto;
  padding: 3px 20px 6px 16px;
  opacity: 0;
  pointer-events: none;
}
.sidebars .nav-links li:hover .sub-menu.blank{
  top: 50%;
  transform: translateY(-50%);
}
.sidebars .profile-details{
  position: fixed;
  bottom: 0;
  width: 260px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #1d1b31;
  padding: 12px 0;
  transition: all 0.5s ease;
}
.sidebars.close .profile-details{
  background: none;
}
.sidebars.close .profile-details{
  width: 78px;
}
.sidebars .profile-details .profile-content{
  display: flex;
  align-items: center;
}
.sidebars .profile-details img{
  height: 52px;
  width: 52px;
  object-fit: cover;
  border-radius: 16px;
  margin: 0 14px 0 12px;
  background: #1d1b31;
  transition: all 0.5s ease;
}
.sidebars.close .profile-details img{
  padding: 10px;
}
.sidebars .profile-details .profile_name,
.sidebars .profile-details .job{
  color: #fff;
  font-size: 18px;
  font-weight: 500;
  white-space: nowrap;
}
.sidebars.close .profile-details i,
.sidebars.close .profile-details .profile_name,
.sidebars.close .profile-details .job{
  display: none;
}
.sidebars .profile-details .job{
  font-size: 12px;
}
.home-section{
  position: relative;
  background: #fff;
  height: 100vh;
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
}
.sidebars.close ~ .home-section{
  left: 78px;
  width: calc(100% - 78px);
}
.home-section .home-content{
  height: 60px;
  display: flex;
  align-items: center;
}
.home-section .home-content .bx-menu,
.home-section .home-content .text{
  color: #11101d;
  font-size: 35px;
}
.home-section .home-content .bx-menu{
  margin: 0 15px;
  cursor: pointer;
}
.home-section .home-content .text{
  font-size: 26px;
  font-weight: 600;
}
@media (max-width: 400px) {
  .sidebars.close .nav-links li .sub-menu{
    display: none;
  }
  .sidebars{
    width: 78px;
  }
  .sidebars.close{
    width: 0;
  }
  .home-section{
    left: 78px;
    width: calc(100% - 78px);
    z-index: 100;
  }
  .sidebars.close ~ .home-section{
    width: 100%;
    left: 0;
  }
}
</style>

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
        <a href="{{ route('doctor.index',[$id_Doctor]) }}">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Patient</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('doctor.index',[$id_Doctor]) }}">Patient</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('consultationdoctor.index',[$id_Doctor]) }}">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Consultation</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('consultationdoctor.index',[$id_Doctor]) }}">Consultation</a></li>
          <li><a href="">Ajoute Consultation</a></li>
          <li><a href="#">Ajoute Traitement</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="{{ route('fullcalender.index',[$id_Doctor]) }}">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Calendrier  </span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route('fullcalender.index',[$id_Doctor]) }}">Calendrier  </a></li>
          <li><a href="{{route('pending',[$id_Doctor])}}">liste d'attente</a></li>
          <li><a href="{{route('completed',[$id_Doctor])}}">liste approuvé</a></li>
        </ul>
      </li> 
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Drop </span>
    </div>
     <!-- next -->
     <div class="container">
<div class="card shadow">
    <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
      <p class="text-primary m-0 fw-bold">Patient Info</p>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">

        </div>
      <div class="table-responsive">
        <table class="table my-0">
              <thead>
                  <th>id</th>
                  <th>Nom Doctor</th>
                  <th>Nom Patient</th>
                  <th>Date Start</th>
                  <th>Date End</th>
                  <th>Statut</th>
                  <th>Valider</th>
              </thead>
              @foreach ($pending as $key => $value)
              @if($value->status == "pending")
              <tr>
                 <td>{{$value->id}}</td>
                 <td>{{$value->NomD}}</td>
                 <td>{{$value->NomP}}</td>
                 <td>{{$value->start}}</td>
                 <td>{{$value->end}}</td>
                 <td>{{$value->status}}</td>
                 <td> 
                     <a class="btn btn-info" href="{{ route('doctor.valider',$value->id) }}">Completed</a> 
                 </td>
              </tr>
              @endif
              @endforeach
          </table>  
      </div>
    </div>
     </div>

  </section>

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








</body>
</html>