<!DOCTYPE html>
<html lang="en">
<head>
<title>Pending Page</title>
  @include('Assistant.layout.bootstrap')
  @include('Assistant.layout.sidebar')

</head>
<body>
  @include('Assistant.layout.navBar')
<!-- Side navigation -->
@include('Assistant.layout.sidebarMain')
<!-- Side navigation -->
@include('Assistant.layout.startSection')

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


      <div class="table-responsive">
        <table class="table my-0">
              <thead>
                  <th>id</th>
                  <th>Nom Doctor</th>
                  <th>Nom Patient</th>
                  <th>Date Start</th>
                  <th>Date End</th>
                  <th>Statut</th>
                  <th>Approuvé</th>
              </thead>
              @foreach ($pending as $key => $value)
              @if($value->status == "pending")
              <tr>
                 <td>{{$value->id}}</td>
                 <td>{{$value->NomD}}</td>
                 <td>{{$value->NomP}}</td>
                 <td>{{$value->start}}</td>
                 <td>{{$value->end}}</td>
                 <td>{{$value->status}}</td>
                 <td> 
                     <a class="btn btn-info" href="{{ route('doctor.validerX',$value->id) }}">Completed</a> 
                 </td>
              </tr>
              @endif
              @endforeach
          </table>  
      </div>
      </div>
    </div>
    @include('Assistant.layout.endSection')
    @include('Assistant.layout.scriptSide')


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>