<!DOCTYPE html>
<html lang="en">
<head>
@include('Doctor.layout.bootstrap')
@include('Doctor.layout.sidebar')
<style>
.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

</style>
</head>
<body>
 @include('Doctor.layout.sidebarMain')
 @include('Doctor.layout.startSection')
 <div class="middle">
      <h1>COMING SOON</h1>      
      </div>
 @include('Doctor.layout.endSection')
@include('Doctor.layout.scriptSide')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>