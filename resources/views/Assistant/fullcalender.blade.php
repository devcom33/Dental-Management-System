<!DOCTYPE html>
<html>
<head>
@include('Assistant.layout.bootstrap')
  @include('Assistant.layout.fullcal')
  @include('Assistant.layout.sidebar')
  <title>RDV</title>
  </head>
<body>
<!-- Side navigation -->
@include('Assistant.layout.sidebarMain')
<!-- Side navigation -->
@include('Assistant.layout.startSection')
@include('Assistant.layout.navBar')
      <div style="text-align: center" class="container">
          <h1>Ajoute Rendez-Vous</h1>
              <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add RDV
           </button>
          <div id='calendar'></div>
      </div>
         
      <script>
      
      $(document).ready(function () {
      
          $.ajaxSetup({
              headers:{
                  'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              }
          });
      
          var calendar = $('#calendar').fullCalendar({
              editable:true,
              header:{
                  left:'prev,next today',
                  center:'title',
                  right:'month,agendaWeek,agendaDay'
              },
              events:'/doctor/fullcalender/$id_Doctor',
              selectable:true,
              selectHelper: true,
              select:function(start, end, allDay)
              {
                alert("Ajouter un RDV");
      
                  if(title)
                  {
                      var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');
                      var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');
      
                      $.ajax({
                          url:"/doctor/fullcalenderAjax",
                          type:"POST",
                          data:{
                              status: title,
                              start: start,
                              end: end,
                              type: 'add'
                          },
                          success:function(data)
                          {
                              calendar.fullCalendar('refetchEvents');
                              alert("Event Created Successfully");
                          }
                      })
                  }
              },
              editable:true,
              eventRender: function(event, element) {
      
                          if(event.status != '' && typeof event.status  !== "undefined")
                            { 
                          element.find(".fc-time").append(
                          "<br/>Status <b>"+event.status+"</b>"
                          +"<br/>Nom Patient <b>"+event.NomP +"</b>"
                          +"<br/>Nom Doctor <b>"+event.NomD +"</b>"
                          );
                      } 
                 // }
              },
      
              eventResize: function(event, delta)
              { var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                  var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                  var title = event.status;
                  var id = event.id;
                  $.ajax({
                      url:"/doctor/fullcalenderAjax",
                      type:"POST",
                      data:{
                          status: title,
                          start: start,
                          end: end,
                          id: id,
                          type: 'update'
                      },
                      success:function(response)
                      {
                          calendar.fullCalendar('refetchEvents');
                          alert(response);
                      }
                  })
              },
      
              eventDrop: function(event, delta)
              {
                  var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                  var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                  var title = event.status;
                  var id = event.id;
                  $.ajax({
                      url:"/doctor/fullcalenderAjax",
                      type:"POST",
                      data:{
                          status: title,
                          start: start,
                          end: end,
                          id: id,
                          type: 'update'
                      },
                      success:function(response)
                      {
                          calendar.fullCalendar('refetchEvents');
                          alert(response);
                      }
                  })
              },
      
              eventClick:function(event)
              {
                  if(confirm("Are you sure you want to remove it?"))
                  {
                      var id = event.id;
                      $.ajax({
                          url:"/doctor/fullcalenderAjax",
                          type:"POST",
                          data:{
                              id:id,
                              type:"delete"
                          },
                          success:function(response)
                          {
                              calendar.fullCalendar('refetchEvents');
                              alert("Event Deleted Successfully");
                          }
                      })
                  }
              }
          });
      
      });
        
      </script>
      
         <!-- Modal add-------------------------------------------------------------------------------------------------------------------------------------- ---->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajoute Rendez-vous</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{ route('fullcalender.store') }}" >
                  <div class="modal-body">
                    
                      @csrf <!--bach maibanch dakchi lfoo0 -->
      
                      <div class="mb-3" >
                          <select name="status" class="form-select" aria-label="Default select example">
                            <option >Status</option>
                            <option value="1">Validier</option>
                            <option value="2" selected>Pending</option>
                          </select>
                        </div>
            
                          <div class="mb-3">
                            <select name="x" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                              {{-- <option selected>Doctor</option> --}}
                              @foreach ($p as $key => $value)
                              <option value="{{$value->id_patient}}">{{$value->Nom}}</option>
                              @endforeach
                            </select>
                            <label for="floatingSelect">Patient</label>
                          </div>
            
                          <div class="mb-3">
                            <select name="y" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                              {{-- <option selected>Doctor</option> --}}
                              @foreach ($d as $key => $value)
                              <option value="{{$value->id_doctor}}">{{$value->Nom}}</option>
                              @endforeach
                            </select>
                            <label for="floatingSelect">Doctor</label>
                          </div>
            
                          <div class="mb-3">
                          <label style="margin: .4rem 0;" for="meeting-time">Choose a start for your appointment:</label>
                            <input name="start" style=" display: block;
                            font: 1rem 'Fira Sans', sans-serif;
                            margin: .4rem 0;
                            " type="datetime-local" id="meeting-time"
                            name="meeting-time" value="2022-04-12T19:30"
                            min="2018-06-07T00:00" max="2025-06-14T00:00">
                        </div>
            
                        <div class="mb-3">
                            <label style="margin: .4rem 0;" for="meeting-time">Choose a end for your appointment:</label>
                            <input name="end" style=" display: block;
                            font: 1rem 'Fira Sans', sans-serif;
                            margin: .4rem 0;
                            " type="datetime-local" id="meeting-time"
                            name="meeting-time" value="2022-04-12T19:30"
                            min="2018-06-07T00:00" max="2025-06-14T00:00">
                        </div>
                       
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary">Ajoute RDV</button>
                      </div>
                  
                  </div>
                </form>
              </div>
         
            </div>
          </div>
        </div>
      
        </div>
        @include('Assistant.layout.endSection')
        @include('Assistant.layout.scriptSide')








  <!-- End of Side navigation -->

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

<script>
  var msg = '{{Session::get('alert')}}';
  var exist = '{{Session::has('alert')}}';
  if(exist){
    alert(msg);
  }
</script>