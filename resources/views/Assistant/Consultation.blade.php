<!DOCTYPE html>
<html>
<head>
    <title>Consultation</title>
   <!-- CSS only -->
   @include('Assistant.layout.bootstrap')
   @include('Assistant.layout.sidebar')
</head>
  <body>

    @include('Assistant.layout.sidebarMain')
    @include('Assistant.layout.startSection')

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
    
    <div class="card shadow mb-3">
          <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
            <p class="text-primary m-0 fw-bold" >Consultation</p>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">Traitement</button>
          </div>
                              <form method="POST" action="{{route('consultationassistant.store')}}">
                                @csrf
                                <div class="card-body">
                                      <div class="row">
                                              <div class="col-sm-12 col-md-8 col-lg-6">
                                                    <div class="form-floating">
                                                          <select name="patient" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                              <option ></option>

                                                          
                                                              @foreach ($rdv as $key => $value)
                                                              @if($value->fk_doctor==$fk_Doctor && $value->status=="pending")
                                                                <option value="{{$value->fk_patient}}">{{$value->NomP}}</option>
                                                              @endif
                                                              @endforeach
                                                          </select>
                                                          <label for="floatingSelect">Nom Patient</label>
                                                      </div>
                                              </div>
                                                <div class="col-sm-12 col-md-8 col-lg-6">
                                                    <div class="form-floating">
                                                        <select name="doc" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        
                                                            @foreach ($d as $key => $value)
                                                              @if($value->id_doctor==$fk_Doctor)
                                                              <option value="{{$fk_Doctor}}"> Doctor : {{$value->Nom}} {{$value->Prenom}}</option>
                                                              @endif
                                                            @endforeach
                                                        </select>
                                                        <label for="floatingSelect">Nom Doctor</label>
                                                    </div>
                                                </div>
                                          </div>
                                      </div>

                                        <div class="card-footer">
                                          <button type="submit" class="btn btn-success">Enregistrer</button>

                
                                        </div>

                              </form>
                              <div class="card-footer">
                                <form method="POST" action="{{route('operation.store')}}">
                                  @csrf
                                    <button type="submit" class="btn btn-danger">Completed</button>
                                </form>
                              </div>
      
        </div>
    </div>

      <div class="container">
        <!-- Button trigger modal -->


            <!-- Full Screen -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Traitement</h5>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <div class="text-left">
                          <img src="{{asset('assets/img/teethnumber.png')}}" class="img-fluid" alt="Responsive image">
                        </div>
                    </div>
                          <div class="col-sm-12 col-md-8 col-lg-2">

                                    <form method="POST" action="{{route('traitement.store')}}">
                                      @csrf  
                                            <div class="mb-3">
                                              <label class="form-label">Nombre de dent</label>
                                              <select name="choisirdent" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        @foreach ($dent as $key => $value)
                                                                <option value="{{$value->id_dents}}" selected>{{$value->nombre_de_dent}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                  <select name="choisirtrait" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                        @foreach ($serv as $key => $value)
                                                                <option value="{{$value->id_service}}" selected>{{$value->service}}</option>
                                                        @endforeach
                                                  </select>
                                                  <label for="floatingSelect">Service</label>
                                            </div>
                                          <button type="submit" class="btn btn-primary">click</button>
                                    </form>
                          </div>
                    </div>
                        <!-- Body modal full screen -->
                       
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <br>

            <div class="container">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th>id Consultation</th>
                          <th>Nom</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Nombre de dents</th>
                          <th>Traitement</th>
                          <th width="280px">Date début</th>
                          <th width="280px">Date Fin</th>
                          <th width="280px">Prix</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                            @foreach ($patientanddent as $key => $value)
                              <tr>
                                <td>{{$value->id_consultation}}</td>
                                
                                <td>{{$value->Nom}}</td>
                                <td>{{$value->Email}}</td>
                                <td>{{$value->Phone}}</td>
                                <td>{{$value->nombre_de_dent}}</td>
                                <td>{{$value->service}}</td>
                                <td>{{$value->start}}DH</td>
                                <td>{{$value->end}}DH</td>
                                <td>{{$value->prix}}DH</td>   
                              </tr>   
                              @endforeach  
                        </tr>
                    </tbody>
                </table>
            </div>

      @include('Assistant.layout.endSection')
      @include('Assistant.layout.scriptSide')

      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/theme.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
  
  </body>
</html>