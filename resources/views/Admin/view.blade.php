<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
      <!-- View -->
      <div class="card">
        <h5 class="card-header">{{$post->Nom}}</h5>
        <div class="card-body">
          <h5 class="card-title">Information sur le Patient</h5>
            <p class="fs-3">Nom           : {{$post->Nom}}</p>
            <p class="fs-3">Prenom        : {{$post->Prenom}}</p>
            <p class="fs-3">Sexe          : {{$post->Sexe}}</p>
            <p class="fs-3">Phone         : {{$post->Phone}}</p>
            <p class="fs-3">Email         : {{$post->Email}}</p> 
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="/Admin/doctor" class="btn btn-dark">Close</a>
          </div>

        </div>
      </div>
    
      <!--  end View -->
    </div>
      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>