<!DOCTYPE html>
<html lang="en">
<head>

  <title>Info</title>
  @include('Assistant.layout.bootstrap')
  @include('Assistant.layout.sidebar')
</head>
<body>
<!-- Side navigation -->
@include('Assistant.layout.sidebarMain')
<!-- Side navigation -->
@include('Assistant.layout.startSection')
 

    
    <div class="container">
      <!-- View -->
      <div class="row gutters-sm">
                  <div class="col-md-4 mb-3">
                    <div class="card">
                                <div class="text-center">
                                  <h5 class="card-header">Information sur le Patient</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                      <img  src="{{asset('/assets/img/patient (1).png')}}" alt="Admin" width="150" />
                                        <div class="mt-3">
                                          <h4>{{$post->Prenom}} {{$post->Nom}}<h4>
                                        <!-- <p class="text-muted font-size-sm">{$post->Adresse}</p> -->
                                        </div>
                                        <!-- button close -->
                                        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end"> -->
                                          <!-- <a href="{ URL::previous()}" class="btn btn-dark">Close</a> -->
                                        <!-- </div> -->
                                        <!-- end button close -->
                                    </div>
                                </div>
                                <div class="text-center">
                                  <a class="btn btn-outline-info"  href="{{ route('assistant.pdf',$post->id_patient) }}">Imprimer</a> 
                                </div>
                                
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card mb-3">
                          <div class="card-body">
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Nom Complet</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$post->Prenom}} {{$post->Nom}}</div>
                                  </div>
                                  <hr/>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Sexe</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$post->DateNaissance}}</div>
                                  </div>
                                  <hr/>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Sexe</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$post->Sexe}}</div>
                                  </div>
                                  <hr/>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Adresse</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$post->Adresse}}</div>
                                  </div>
                                  <hr/>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Phone</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$post->Phone}}</div>
                                  </div>
                                  <hr/>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Email</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$post->Email}}</div>
                                  </div>
                                  <hr/>
                                  <div class="row">
                                    <div class="col-sm-3">
                                      <h6 class="mb-0">Montant</h6>
                                      </div>
                                      <div class="col-sm-9 text-secondary">{{$Montant}} DH</div>
                                  </div>
                          </div>
                      </div>
                  </div>

  
        </div>
      </div>
     <!-- next -->
     <br>
      <div class="container">
      <h2>Historique</h2>
      <br>
              <div class="table-responsive">
                      <table class="table my-0">
                            <thead>
                              <tr>
                                <th width="130px">id Patient</th>
                                <!-- <th>id consultation</th> -->
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="340px">Nombre de dents</th>
                                <th>Traitement</th>
                                <th  width="280px">Date début</th>
                                <th  width="280px">Date Fin</th>
                                <th  width="100px">Prix</th>
                              </tr>
                            </thead>
                            <tbody> 
                              <tr>
                                  @foreach ($patientanddent as $key => $value)
                                      @if($value->id_patient==$post->id_patient)
                                          <tr>
                                            <td>{{$value->id_patient}}</td>
                                            <!-- <td>{$value->id_consultation}</td>     -->
                                            <td>{{$value->Nom}}</td>
                                            <td>{{$value->Email}}</td>
                                            <td>{{$value->Phone}}</td>
                                            <td>{{$value->nombre_de_dent}}</td>
                                            <td>{{$value->service}}</td>
                                            <td>{{$value->start}}</td>
                                            <td>{{$value->end}}</td>
                                            <td>{{$value->prix}}</td>                                
                                          </tr>   
                                        @endif
                                    @endforeach  
                              </tr>
                          </tbody>
                      </table>  
              </div>
    </div>
  </div>
     {{-- </div> --}}
     <br>
<br>
<br>
<br>
<br>
@include('Assistant.layout.endSection')
@include('Assistant.layout.scriptSide')
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>