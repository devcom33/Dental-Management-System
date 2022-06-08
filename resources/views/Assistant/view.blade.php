<!DOCTYPE html>
<html lang="en">
  <head>
    @include('Assistant.layout.sidebar')
  </head>
<body>
  <!-- Side navigation -->
@include('Assistant.layout.sidebarMain')
{{-- <div class="sidenav"> --}}
  
  @include('Assistant.layout.startSection')
  <!-- start of code  -->
      <!-- View -->
      <div class="card">
        <h5 class="card-header">{{$post->Nom}}</h5>
        <div class="card-body">
          <h5 class="card-title">Information sur le Patient </h5>
            <p class="fs-3">Id            : {{$post->id}}</p>
            <p class="fs-3">Nom           : {{$post->Nom}}</p>
            <p class="fs-3">Prenom        : {{$post->Prenom}}</p>
            <p class="fs-3">Sexe          : {{$post->Sexe}}</p>
            <p class="fs-3">Phone         : {{$post->Phone}}</p>
            <p class="fs-3">Email         : {{$post->Email}}</p> 
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="{{ URL::previous()}}" class="btn btn-dark">Close</a>
          </div>

        </div>
      </div> 
    
      <!--  end View -->
      @include('Assistant.layout.endSection')
      <!-- End of code  -->
    @include('Assistant.layout.scriptSide')
      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>