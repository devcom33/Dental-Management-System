<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    @include('Doctor.layout.bootstrap')
  </head>
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
                      <h6 class="mb-0">DateNaissance</h6>
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
                      <h6 class="mb-0">Montant Total</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">{{$post->Assurance}} DH</div>
                  </div>
          </div>
      </div>
  </div>

</html>