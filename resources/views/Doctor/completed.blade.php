<!DOCTYPE html>
<html lang="en">
<head>
  @include('Doctor.layout.bootstrap')
  @include('Doctor.layout.sidebar')
  <title>Approuvé</title>
</head>

<body>
  @include('Doctor.layout.sidebarMain')
  @include('Doctor.layout.startSection')
  @include('Doctor.layout.navBar')
<div class="card shadow">
    <div class="card-header d-flex flex-wrap justify-content-center align-items-center justify-content-sm-between gap-3">
      <p class="m-0 fw-bold"  style="color:#56799e">Patient Info</p>
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
              </thead>
              @foreach ($completed as $key => $value)
              @if($value->status == "completed")
              <tr>
                 <td>{{$value->id}}</td>
                 <td>{{$value->NomD}}</td>
                 <td>{{$value->NomP}}</td>
                 <td>{{$value->start}}</td>
                 <td>{{$value->end}}</td>
                 <td>{{$value->status}}</td>
              </tr>
              @endif
              @endforeach
          </table>  
      </div>
      </div>
    </div>
     </div>
     @include('Doctor.layout.endSection')
     @include('Doctor.layout.scriptSide')








</body>
</html>