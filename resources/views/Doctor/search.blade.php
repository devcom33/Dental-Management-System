<!DOCTYPE html>
<html>
<head>
  @include('Doctor.layout.sidebar')
    <title>Cabinet Dental</title>
</head>
<body>
    <!-- Modal add-------------------------------------------------------------------------------------------------------------------------------------- ---->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('doctor.store') }}" >
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
                <label for="exampleInputEmail1" class="form-label">Date Naissance :</label>
                <input name="datee" type="date" class="form-control" >
              </div>
              <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Adresse :</label>
                <input name="addr" type="text" class="form-control" >
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
                    <label for="exampleInputEmail1" class="form-label">code RDV :</label>
                    <input name="rdv" type="text" class="form-control" >
                  </div>
                  <div class="mb-3" >
                    <label for="exampleInputEmail1" class="form-label">Assurance :</label>
                    <input name="assurance" type="text" class="form-control" >
                  </div>
                <div class="mb-3" >
                  <label for="exampleInputEmail1" class="form-label">Password :</label>
                  <input name="password" type="password" class="form-control" >
                </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-secondary">Ajoute Patient</button>
              </div>
          
          </div>
        </form>
      </div>
 
    </div>
  </div>
</div>
<!-- Side navigation -->
@include('Doctor.layout.sidebarMain')
<!-- Side navigation -->
<!-- Page content -->
@include('Doctor.layout.startSection')
@include('Doctor.layout.navBar')
  

   <!--Search -->
   <div class="mt-5" >
     <form action="/Search2" method="GET">
    <input name="search" type="text" class="form-control" placeholder="Search">
    <button type="submit" class="btn btn-primary" >Search </button>
  </div>
</form>
  </div>
   <!--End Search -->
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ">
                <h2>Add Patient</h2>
            </div>
            <!-- Button Create modal -->
            <div class="pull-right ">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> Create New Patient</button>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
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
<div class="modal fade" id="exampleModal1{{$value->id_patient}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('doctor.update',$value->id_patient) }}" method="POST">
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
                <label for="exampleInputEmail1" class="form-label">Date Naissance :</label>
                <input name="datee" type="text" class="form-control" value="{{$value->DateNaissance}}">
            </div>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Adresse :</label>
                <input name="addr" type="text" class="form-control" value="{{$value->Adresse}}">
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
                    <label for="exampleInputEmail1" class="form-label">Code RDV :</label>
                    <input name="rdv" type="text" class="form-control" value="{{$value->CodeRDV}}">
                </div>
                <div class="mb-3" >
                    <label for="exampleInputEmail1" class="form-label">Assurance :</label>
                    <input name="assurance" type="text" class="form-control" value="{{$value->Assurance}}">
                </div>
                <div class="mb-3" >
                    <label for="exampleInputEmail1" class="form-label">Password :</label>
                    <input name="password" type="password" class="form-control" value="{{$value->Password}}">
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-secondary">Update</button>
              </div>
          
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------------------------------------------------------------- ---->

        <tr>
           <td>{{$value->id_patient}}</td>
            <td>{{ $value->Nom }}</td>
            <td>{{$value->Prenom}}</td>
            <td>{{$value->Email}}</td>
            <td>{{$value->Sexe}}</td>
            <td>{{$value->Phone}}</td>
           
            <td>
                <form  action="{{ route('doctor.destroy',$value->id_patient) }}" method="POST">   
                    @csrf
                    @method('DELETE') 
                     <!-- Button Show -->
                    <a class="btn btn-info" href="{{ route('doctor.show',$value->id_patient) }}">Show</a> 
                    <!-- Button Edit -->   
                    <a class="btn btn-primary" href="{{ route('doctor.edit',$value->id_patient) }}" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$value->id_patient}}">Edit</a>
                    <!-- Button Delete -->        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
 
    @include('Doctor.layout.endSection')
    @include('Doctor.layout.scriptSide')
  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 

</body>
</html>


