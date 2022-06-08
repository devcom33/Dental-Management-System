<!DOCTYPE html>
<html>
<head>
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Doctor</title>
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
</head>
<body>

<!-- Modal -->
<form method="POST" action="{{route('admind.store')}}">
@csrf

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajoute Doctor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input name="nom" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prenom</label>
                            <input name="prenom" type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sexe</label>
                            <input name="sexe" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date Naissance</label>
                            <input name="datenaissance" type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Adresse</label>
                            <input name="adresse" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Numero de Telephone</label>
                            <input name="phone" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                    </div>
                    <div class="form-floating">
                        <select name="y" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Admin</option>
                            @foreach ($a as $key => $value)
                            <option value="{{$value->id_admin}}">{{$value->Nom}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
                        </div>
                {{-- ------------------------------------------------------------------------------------- --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>



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
        <a href="{{ route('addoctor') }}">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Patient</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('addoctor') }}">Doctor</a></li>
        </ul>
      </li>
      <li>
        <a href="{{ route('adassistant') }}">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Patient</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="{{ route('adassistant') }}">Assistant</a></li>
        </ul>
      </li>
 
</ul>
  </div>
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Drop</span>
    </div>
     
  <!-- Page content -->
    <div class="container">
      <div class="mt-5" >
          <form action="/Search" method="GET" class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." /><button class="btn btn-primary py-0" type="submit"><i class="fas fa-search"></i></button></div>
          </form>
      </div>
  
      <div class="row" style="margin-top: 5rem;">
          <div class="col-lg-12 margin-tb">
              <div class="pull-left ">
                  <h2>Ajoute Doctor</h2>
              </div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Ajoute Doctor
              </button>
              </div>
      </div>
     <table class="table table-bordered">
              <tr>
                          <th>id</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Sexe</th>
                          <th>Date de Naissance</th>
                          <th>Adresse</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th width="280px">Action</th>
              </tr>
              @foreach ($d as $key => $value)
                  <div class="modal fade" id="exampleModal1{{$value->id_doctor}}" tabindex="-1" aria-labelledby="exampleModalmodifier" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modifier Doctor</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                  
                          <form action="{{ route('admind.update',$value->id_doctor) }}" method="POST">
                              @csrf
                              @method('PUT')
                                  <div class="modal-body">
                                  @csrf
                                  <div class="mb-3">
                                      <label class="form-label">Nom</label>
                                      <input name="nom" type="text" class="form-control" value="{{$value->Nom}}">
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Prenom</label>
                                      <input name="prenom" type="text" class="form-control" value="{{$value->Prenom}}">
                                  </div>
  
                                  <div class="mb-3">
                                      <label class="form-label">Sexe</label>
                                      <input name="sexe" type="text" class="form-control" value="{{$value->Sexe}}">
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Date Naissance</label>
                                      <input name="datenaissance" type="date" class="form-control" value="{{$value->DateNaissance}}">
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Adresse</label>
                                      <input name="adresse" type="text" class="form-control" value="{{$value->Adresse}}">
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label">Numero de Telephone</label>
                                      <input name="phone" type="text" class="form-control" value="{{$value->Phone}}">
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                                      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$value->Email}}">
                                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                  </div>
                                  <div class="mb-3">
                                      <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                                      <input name="password" type="password" class="form-control" id="exampleInputPassword1" value="{{$value->Password}}">
                                  </div>
                                  <div class="mb-3 form-check">
                                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                  </div>
  
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Modifier</button>
                              </div>
                          </form>
                                  
                          </div>
                      </div>
                  </div>
                  
  
              <tr>
                  <td>{{ $value->id_doctor }}</td>
                  <td>{{ $value->Nom }}</td>
                  <td>{{ $value->Prenom }}</td>
                  <td>{{ $value->Sexe }}</td>
                  <td>{{ $value->DateNaissance }}</td>
                  <td>{{ $value->Adresse }}</td>
                  <td>{{ $value->Phone }}</td>
                  <td>{{ $value->Email }}</td>
                  <td>
                      <form action="{{ route('admind.destroy',$value->id_doctor) }}" method="POST">   
                          <a class="btn btn-info" href="{{ route('admind.show',$value->id_doctor) }}">Show</a>    
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$value->id_doctor}}" href="{{ route('admin.edit',$value->id_doctor) }}">Edit</button>   
                          @csrf
                          @method('DELETE')      
                          <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </table> 
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


<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>