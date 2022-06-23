<!DOCTYPE html>
<html lang="en">
<head>
@include('Doctor.layout.bootstrap')
@include('Doctor.layout.sidebar')
    <title>Admin</title>

</head>
<body>

@include('Admin.layout.sidebarMain')
  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>
    <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                  <main>
                  <div class="container-fluid px-4">
                        <div class="row">
                                    <div class="col-md-6 col-xl-6 mb-4">
                                            <div class="card shadow border-start-primary py-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Dentiste</span></div>
                                                            

                                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$codoctor}}</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6 mb-4">
                                            
                                            <div class="card shadow border-start-primary py-2">
                                                <div class="card-body">
                                                    <div class="row align-items-center no-gutters">
                                                        <div class="col me-2">
                                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Assistant</span></div>
                                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$coassistant}}</span></div>
                                                        </div>
                                                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                              </div>
                      </div>
                </main>
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

     <!-- javascript-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
