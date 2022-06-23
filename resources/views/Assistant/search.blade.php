<!DOCTYPE html>
<html lang="en">
<head>
@include('Doctor.layout.bootstrap')
@include('Doctor.layout.sidebar')  
<title>Patient</title>
 
</head>
<body> 

    <!-- Modal add-------------------------------------------------------------------------------------------------------------------------------------- ---->
        <form method="post" action="{{ route('assistant.store') }}" >            
              @csrf <!--bach maibanch dakchi lfoo0 -->

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajoute Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

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
  
                <div class="mb-3">
                  <select name="x" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    {{-- <option selected>Doctor</option> --}}
                    @foreach ($d as $key => $value)
                    <option value="{{$value->id_doctor}}">{{$value->Nom}}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Doctor</label>
                </div>

                <div class="mb-3">
                  <select name="y" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                    @foreach ($a as $key => $value)
                    <option value="{{$value->id_assistant}}">{{$value->Nom}}</option>
                    @endforeach
                  </select>
                  <label for="floatingSelect">Assistant</label>
                </div>
                <div class="col-md-3">
                  <div id="dataTable_filter" class="text-md-end dataTables_filter"><form action="{{ route('assistant.search',[$id_Assistant, $fk_Doctor]) }}" method="GET"><label class="form-label"><input name="search" class="form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Search" /></label></form></div>
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
 @include('Assistant.layout.sidebarMain') 
  <!-- End of Side navigation -->
  
<!-- Page content -->
@include('Assistant.layout.startSection')
<!-- start of code  -->
{{-- Message d'errors --}}

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- end message --}}
  <div class="card shadow">
          <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
            <p class="m-0 fw-bold" style="color:#56799e">Patient Info</p>
          </div>
  
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <div class="card-body">
              <div class="row">
                    <div class="col-md-3 text-nowrap">
                        <div class="form-floating">
  
                          <select name="x" class="js-exemple-placeholder-single">
                            @foreach ($d as $key => $value)
                              <option value="{{$value->id_doctor}}">{{$value->Nom}}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                      <div id="dataTable_filter" class="text-md-end dataTables_filter"><form action="{{ route('assistant.search',[$id_Assistant, $fk_Doctor]) }}" method="GET"><label class="form-label"><input name="search" class="form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Search" /></label></form></div>
                      </div>
                    <div class="col-md-6">
                          <div id="dataTable_filter" class="text-md-end dataTables_filter">
                                  <div class="pull-right ">
                                      <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Ajoute Patient</button>
                                  </div>
                          </div>
                    </div>
              </div>
            <div class="table-responsive">
              <table class="table my-0">
                    <thead> 
                        <th>id</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Sexe</th>
                        <th>Phone</th>
                        <th>Montant</th>
                        <th width="280px">Action</th>
                    </thead>
       
                      @foreach ($data as $key => $value)
                                      <div class="modal fade" id="exampleModal1{{$value->id_patient}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier Patient</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form action="{{ route('assistant.update',$value->id_patient) }}" method="POST">
                                                              @csrf
                                                              @method('PUT')
                                                              <div class="modal-body">
                                                                  @csrf
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
                                          @if($value->fk_assistant==$id_Assistant && $value->fk_doctor==$fk_Doctor) 

                                          <tr>
                                            <td>{{$value->id_patient}}</td>
                                            <td>{{ $value->Nom }}</td>
                                            <td>{{$value->Prenom}}</td>
                                            <td>{{$value->Email}}</td>
                                            <td>{{$value->Sexe}}</td>
                                            <td>{{$value->Phone}}</td>
                                            <td>{{$value->Assurance}}</td>
                                  
                                          <td>
                                            <form  action="{{ route('assistant.destroy',$value->id_patient) }}" method="POST">      
                                                  @csrf
                                                  @method('DELETE') 
                                                  <!-- Button Show --> 
                                                  <a class="btn btn-outline-info"  href="{{ route('assistant.show',[$value,$id_Assistant, $fk_Doctor]) }}">Show</a> 
                                                  <!-- Button Edit -->   
                                                  <a class="btn btn-outline-primary" href="{{ route('assistant.edit',$value) }}" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$value->id_patient}}">Edit</a>
                                                  <!-- Button Delete -->        
                                                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                                              </form>
                                          </td>
                                      </tr>
                                      @endif
                        @endforeach
                </table>  
            </div>
            <div class="d-flex justify-content-center">
                {{-- {!! $value->links() !!} --}}
          </div>
          </div>
  </div>
  @include('Assistant.layout.endSection')
  @include('Assistant.layout.scriptSide')


  <!-- End of Side navigation -->

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
</div>
</body>