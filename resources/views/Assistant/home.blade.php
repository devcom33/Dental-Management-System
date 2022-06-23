<!DOCTYPE html>
<html lang="en">
<head>
@include('Assistant.layout.bootstrap')
@include('Assistant.layout.sidebar')  
</head>
<body>
 @include('Assistant.layout.sidebarMain')
 @include('Assistant.layout.startSection')
 <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row">
                            <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Revenus (mensuel)</span></div>
                                            

                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$som}} DH</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Patient (mensuel)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countpat}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Consultation (Aujourd'hui)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countconsultation}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Rendez-vous (Aujourd'hui)</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span>{{$countrdv}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                    <div class="card shadow mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Consultation
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Patient
                                    </div>
                                        <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Traitement Chart
                                    </div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

                                </div>
                            
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        @include('Assistant.layout.endSection')
@include('Assistant.layout.scriptSide')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            var _ydata=JSON.parse('{!! json_encode($months) !!}');
            var _xdata=JSON.parse('{!! json_encode($monthCount) !!}');

            var _aydata=JSON.parse('{!! json_encode($mnth) !!}');
            var _axdata=JSON.parse('{!! json_encode($countmnt) !!}');

            var _adata=JSON.parse('{!! json_encode($count_aucun) !!}');
            var _bdata=JSON.parse('{!! json_encode($count_cleanings) !!}');

            var _cdata=JSON.parse('{!! json_encode($count_whitening) !!}');
            var _ddata=JSON.parse('{!! json_encode($count_extractions) !!}');
            
        </script>


<script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
<script src="{{asset('assets/demo/chart-pie-demo.js')}}"></script>
</body>
</html>