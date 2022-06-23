<!DOCTYPE html>
<html lang="en">
<head>
  @include('Doctor.layout.bootstrap')

  @include('Doctor.layout.sidebar')
    <title>Service</title>
</head>
<body>
    @include('Doctor.layout.sidebarMain')
    @include('Doctor.layout.startSection')
    @include('Doctor.layout.navBar')
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

            <div class="cart-body">
                <form method="POST" action="{{route('service.store')}}">
                    @csrf  
                        <div class="form-group">
                            <label class="form-label">Nom de Service</label>
                            <input name="nomservice" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prix(DH)</label>
                            <input name="prix" type="text" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajoute</button>
                    </form>
                    </div>
                </div>

                @include('Doctor.layout.endSection')
                @include('Doctor.layout.scriptSide')


      <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/theme.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> 
    </body> 
</html>