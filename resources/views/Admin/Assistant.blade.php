<!DOCTYPE html>
<html>
<head>
@include('Admin.layout.bootstrap')
@include('Admin.layout.sidebar')
<title>Cabinet Dental</title>
</head>
    <!-- Modal add-------------------------------------------------------------------------------------------------------------------------------------- ---->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajoute Assistant</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ route('admin.store') }}" >
              <div class="modal-body">
                
                  @csrf <!--bach maibanch dakchi lfoo0 -->
                  <div class="mb-3" >
                    <label for="exampleInputEmail1" class="form-label">Nom :</label>
                    <input name="nom" type="text" class="form-control" >
                  </div>
                  <div class="mb-3" >
                      <label for="exampleInputEmail1" class="form-label">Prenom :</label>
                      <input name="prenom" type="text" class="form-control" >
                  </div>
                    <div class="mb-3" >
                      <label for="exampleInputEmail1" class="form-label">Sexe :</label>
                      <input name="sexe" type="text" class="form-control" >
                    </div>
                    <div class="mb-3" >
                      <label for="exampleInputEmail1" class="form-label">Phone :</label>
                      <input name="phone" type="text" class="form-control" >
                    </div>
                    <div class="mb-3" >
                      <label for="exampleInputEmail1" class="form-label">Email :</label>
                      <input name="email" type="email" class="form-control" >
                    </div>
                    <div class="mb-3" >
                      <label for="exampleInputEmail1" class="form-label">Password :</label>
                      <input name="password" type="password" class="form-control" >
                    </div>
                    {{-- //---------------------------------------------------------------------- --}}
                    <div class="form-floating">
                      <select name="x" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                        <option selected>Doctor</option>
                        @foreach ($d as $key => $value)
                        <option value="{{$value->id_doctor}}">{{$value->Nom}}</option>
                        @endforeach
                      </select>
                      <label for="floatingSelect">Works with selects</label>
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
                    <button type="submit" class="btn btn-secondary">Ajoute Assistant</button>
                  </div>
              
              </div>
            </form>
          </div>
     
        </div>
      </div>
    </div>
  <!-- Side navigation -->
  @include('Admin.layout.sidebarMain')
  <!-- End of Side navigation -->

  <section class="home-section">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
    </div>
      <!-- Page content -->
    <div class="container">
      
   
</form>
   <!--End Search -->
   <div class="card shadow">
    <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
      <p class="m-0 fw-bold" style="color:#56799e">Assistant Info</p>
    </div>

    <div class="card-body">
   <div class="row">
    <div class="col-md-6 text-nowrap">
    <div id="dataTable_filter" class="text-md-end dataTables_filter"><form action="{{ route('admin.assistant') }}" method="GET"><label class="form-label"><input name="search" class="form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Search" /></label></form></div>
    </div>
    
      <div class="col-md-6">
      <div id="dataTable_filter" class="text-md-end dataTables_filter">
          <div class="pull-right ">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajoute Assistant
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
            <th>Email</th>
            <th>Sexe</th>
            <th>Phone</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)
      <!-- Modal Edit-------------------------------------------------------------------------------------------------------------------------------------- ---->
        <div class="modal fade" id="exampleModal1{{$value->id_assistant}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Assistant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('admin.update',$value->id_assistant) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="modal-body">
                    
                      @csrf <!--bach maibanch dakchi lfoo0 -->
                      <div class="mb-3" >
                        <label for="exampleInputEmail1" class="form-label" >Nom :</label>
                        <input name="nom" type="text" class="form-control" value="{{$value->Nom}}">
                      </div>
                      <div class="mb-3" >
                          <label for="exampleInputEmail1" class="form-label">Prenom :</label>
                          <input name="prenom" type="text" class="form-control" value="{{$value->Prenom}}">
                      </div>
                        <div class="mb-3" >
                          <label for="exampleInputEmail1" class="form-label">Sexe :</label>
                          <input name="sexe" type="text" class="form-control" value="{{$value->Sexe}}">
                        </div>
                        <div class="mb-3" >
                          <label for="exampleInputEmail1" class="form-label">Phone :</label>
                          <input name="phone" type="text" class="form-control" value="{{$value->Phone}}">
                        </div>
                        <div class="mb-3" >
                          <label for="exampleInputEmail1" class="form-label">Email :</label>
                          <input name="email" type="email" class="form-control" value="{{$value->Email}}">
                        </div>
                        <div class="mb-3" >
                          <label for="exampleInputEmail1" class="form-label">Password :</label>
                          <input name="password" type="password" class="form-control" value="{{$value->Password}}">
                        </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Modifier</button>
                      </div>
                  
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div> 
<!--------------------------------------------------------------------------------------------------------------------------------------- ---->
        <tr>
           <td>{{$value->id_assistant}}</td>
            <td>{{ $value->Nom }}</td>
            <td>{{$value->Prenom}}</td>
            <td>{{$value->Email}}</td>
            <td>{{$value->Sexe}}</td>
            <td>{{$value->Phone}}</td>
           
            <td>
                <form  action="{{ route('admin.destroy',$value->id_assistant) }}" method="POST">   
                    @csrf
                    @method('DELETE') 
                     <!-- Button Show -->
                    <a class="btn btn-outline-info" href="{{ route('admin.show',$value->id_assistant) }}">Show</a> 
                    <!-- Button Edit -->   
                    <a class="btn btn-outline-primary" href="{{ route('admin.edit',$value->id_assistant) }}" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$value->id_assistant}}">Edit</a>
                    <!-- Button Delete -->        
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
</div>
<div class="d-flex justify-content-center">
                {!! $data->links() !!}
          </div>
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
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</body>
</html>