<!DOCTYPE html>
<html>
<head>
    <title>Consultation</title>
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
  /* The sidebar menu */
 .sidenav {
   height: 100%; /* Full-height: remove this if you want "auto" height */
   width: 160px; /* Set the width of the sidebar */
   position: fixed; /* Fixed Sidebar (stay in place on scroll) */
   z-index: 1; /* Stay on top */
   top: 0; /* Stay at the top */
   left: 0;
   background-color: #111; /* Black */
   overflow-x: hidden; /* Disable horizontal scroll */
   padding-top: 20px;
 }
 
 /* The navigation menu links */
 .sidenav a {
   padding: 6px 8px 6px 16px;
   text-decoration: none;
   font-size: 25px;
   color: #818181;
   display: block;
 }
 
 /* When you mouse over the navigation links, change their color */
 .sidenav a:hover {
   color: #f1f1f1;
 }
 
 /* Style page content */
 .main {
   margin-left: 160px; /* Same as the width of the sidebar */
   padding: 0px 10px;
 }
 
 /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
 @media screen and (max-height: 450px) {
   .sidenav {padding-top: 15px;}
   .sidenav a {font-size: 18px;}
 }
 /* ------------------------------------------------ ----------------------------------------------*/
 /* Add a black background color to the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the "active" element to highlight the current page */
.topnav a.active {
  background-color: #2196F3;
  color: white;
}

/* Style the search box inside the navigation bar */
.topnav input[type=text] {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  font-size: 17px;
}

/* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
@media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;
  }
}
   </style>


</head>
<body>
 <!-- Side navigation -->
 <div class="sidenav">
  <a href="#">Accueil</a>  
  <a href="{{ route('assistant.index',[$id_Assistant, $fk_Doctor]) }}">Patient</a> 
  <a href="{{ route('consultationassistant.index',[$id_Assistant, $fk_Doctor]) }}">Consultation</a>
  <a href="{{ route('fullcalender.index',[$id_Assistant, $fk_Doctor]) }}">Calendrier</a>
</div> 
  <!-- End of Side navigation --> 
<div class="main">
  <div class="container">
      <form method="POST" action="{{route('consultationassistant.store')}}">
        @csrf
          <div class="mb-3" >
              <label for="exampleInputEmail1" class="form-label">Patient :</label>
              <input name="nomP" type="text" class="form-control" >
              
          </div>
          <div class="mb-3" >
              <label for="exampleInputEmail1" class="form-label">Doctor :</label>
              <input name="nomD" type="text" class="form-control" >
          </div>
          <div class="mb-3" >
              <label for="exampleInputEmail1" class="form-label">Date Consultation :</label>
              <input name="datec" type="date" class="form-control" >
          </div>
          <div class="mb-3" >
              <label for="exampleInputEmail1" class="form-label">Montant :</label>
              <input name="montant" type="text" class="form-control" >
          </div>
          <div class="mb-3" >
            <div class="form-floating">
              <textarea name="observation" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
              <label for="floatingTextarea2">Comments</label>
            </div>
          </div>

          
          <div class="form-floating">
                        <select name="assis" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Assistant</option>
                            @foreach ($a as $key => $value)
                            <option value="{{$value->id_assistant}}">{{$value->Nom}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
            </div>


            <div class="form-floating">
                        <select name="doc" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Doctor</option>
                            @foreach ($d as $key => $value)
                            <option value="{{$value->id_doctor}}">{{$value->Nom}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
            </div>



            <div class="form-floating">
                        <select name="pat" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Patient</option>
                            @foreach ($data as $key => $value)
                            <option value="{{$value->id_patient}}">{{$value->Nom}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
            </div>
            

            <div class="form-floating">
                        <select name="or" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                            <option selected>Ordenance</option>
                            @foreach ($ordo as $key => $value)
                              <option value="{{$value->id_ordonnance}}">{{$value->id_ordonnance}}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Works with selects</label>
            </div>



          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>

</body>
</html>