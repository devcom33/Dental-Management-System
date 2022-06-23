<!DOCTYPE html>
<html>
<head>
@include('Admin.layout.bootstrap')
@include('Admin.layout.sidebar')
    <title>Doctor</title>

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

@include('Admin.layout.sidebarMain')



  <section class="home-section">
  <!-- Page content -->
  <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>
        <div class="container">
          <div class="card shadow">
              <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
                <p class="m-0 fw-bold" style="color:#56799e">Doctor Info</p>
              </div>

              <div class="card-body">
                        <div class="row">
                        <div class="col-md-6 text-nowrap">
                        <div id="dataTable_filter" class="text-md-end dataTables_filter"><form action="/SearchDoctor" method="GET"><label class="form-label"><input name="search" class="form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Search" /></label></form></div>
                        </div>
                          <div class="col-md-6">
                            <div id="dataTable_filter" class="text-md-end dataTables_filter">
                                <div class="pull-right ">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Ajoute Doctor
                                    </button>
                                </div>
                            </div>
                        </div>
                      </div>

                  <div class="table-responsive">
                    <table class="table my-0">
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
                                      <a class="btn btn-outline-info" href="{{ route('admind.show',$value->id_doctor) }}">Show</a>    
                                      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$value->id_doctor}}" href="{{ route('admin.edit',$value->id_doctor) }}">Edit</button>   
                                      @csrf
                                      @method('DELETE')      
                                      <button type="submit" class="btn btn-outline-danger">Delete</button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                  </table> 

            </div>
            <div class="d-flex justify-content-center">
                        {{-- {!! $d->links() !!} --}}
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


<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>