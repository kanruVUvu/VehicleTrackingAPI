<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Live Vehicle Tracking Service</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" href="http://mapmyindia.com/images/favicon.ico" type="image/x-icon">
                <!--put your map api javascript url with key here-->
        <script src="https://apis.mapmyindia.com/advancedmaps/v1/i19tolx5gtklubpb1tqsi9i9m4up53ay/map_load?v=1.2"></script>
    <!-- CUSTOM CSS -->
   <!-- <link rel="stylesheet" href="main.css"> -->
 <style>
    .line1 {
    border-left:3px solid black;
    height:500px;
    }
     .line2 {
    border-left:3px solid black;
    height:500px;
    }
     .line3 {
    border-left:3px solid black;
    height:500px;
    }
    body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
 #map { 
        height: 800px; 
        width: 100%; 
       } 
    </style>
  </head>
  <body>
    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="logo.png" style="position:relative;width:20%;float:left">&nbsp;&nbsp;&nbsp;3EV Industries&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
		  <li class="nav-item">
             <a class="nav-link" href="#" style="position:relative;color:orange;font-size:20px;bottom:-13px">About Us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
			<li class="nav-item">
             <a class="nav-link" href="#" style="position:relative;color:orange;font-size:20px;bottom:-13px">Services &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </li>
		   <li class="nav-item">
              <a class="nav-link" href="#" style="position:relative;color:orange;font-size:20px;bottom:-13px">Support </a>
            </li>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
              <button class="block" style="position:relative;bottom:-7px;color:orange;width:100px;height:40px;text-align:center;bottom:-13px">NEWS</button>
            </li>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li class="nav-item">
            <select name="shippingservices" id="shippingservices" style="position:relative;bottom:-10px;width:207px;height:38px;bottom:-15px;color:orange">
   <option value="starti" style="position:relative;color:orange"><a href="#">START SHIPPING</a></option>    
    <option value="shipi"  style="position:relative;color:orange"><a href="#">SHIP IMMEADIATELY</a></option>
    <option value="setupi" style="position:relative;color:orange"><a href="#">SET-UP BUSINESS ACCOUNT</a></option>
    <option value="freighti" style="position:relative;color:orange"><a href="#">FREIGHT SHIPPING</a></option>
  </select>
			  </li>
          </ul>
        </div>
      </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning" style="position:relative;height:41px">
      <div class="container">
          <marquee width="200%" direction="left" height="35px" style="position:relative;font-size:25px">
•Our services in parts of Karnataka are also likely to be affected due to heavy rainfall. Further, leading to delayed pickups and deliveries across the region.  
            •Dear Customer, our services in parts of Karnataka are likely to be impacted due to the lockdown imposed by local government authorities. Further, leading to delayed pickups and deliveries across the region. Regret this inconvenience. 
</marquee>
        </div>
    </nav>
    <!-- HEADER -->
    <header class="main-header" style="position:relative;background-color:black;height:500px">
        <br>
        <br>
        <br>
        <br>
           <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" style="position:relative;width:100%;color:red;text-align:center">VEHICLE ID</button>
</div>
<div id="London" class="tabcontent" style="position:relative;color:orange;background-color:white" >
  <h3>TRACK ORDER</h3>
  <form method='post' action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="vehno" style="position:relative;font-size:22px;color:orange">Enter Vehicle Number or ID:</label>
  <input type="text" id="vno" name="vehicleno" style="position:relative;font-size:17px" placeholder="Vehicle Number or ID" value='<?php if(isset($_POST['vehicleno'])) echo $_POST['vehicleno']; ?>'>
  &nbsp;&nbsp;&nbsp;<button onclick="myFunction()" style="position:relative;color:white;background-color:red">TRACK</button>
</form>
</div>
    </header>
    
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.dbent.co.in/fe/api/v1/send?username=3evi.trans&password=TKJ5G&unicode=false&from=THREVI&to=8860901155&text=hello",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $vehicleentityno = $_POST['vehicleno'];
}
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://gateway.api.web.aquilatrack.com/?Authorization=Bearer%20eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbklkIjo1Mzk1LCJ1c2VybmFtZSI6IjNFVmluZHVzdHJpZXMiLCJyb2xlcyI6IkNMSUVOVCIsImlhdCI6MTU5NTQ4NTY3OH0.b0-p4hhiC4GTQ3L1IIrAEEOzNwS2L-TVOa59w5fl-aI&AllDeviceLocations=Bearer%20eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbklkIjo1Mzk1LCJ1c2VybmFtZSI6IjNFVmluZHVzdHJpZXMiLCJyb2xlcyI6IkNMSUVOVCIsImlhdCI6MTU5NTQ4NTY3OH0.b0-p4hhiC4GTQ3L1IIrAEEOzNwS2L-TVOa59w5fl-aI",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n    \"operationName\": null,\r\n    \"variables\": {},\r\n    \"query\": \"{\\n  getAllDeviceLocations {\\n    vehicleNumber\\n    vehicleType\\n    vehicleModel\\n    uniqueId\\n    timestamp\\n    latitude\\n    longitude\\n    gpsStatus\\n    idlingStatus\\n    haltStatus\\n    isOverspeed\\n    isHA\\n    isHB\\n    isPrimaryBattery\\n    isNoGps\\n    speed\\n    extBatVol\\n  }\\n}\\n\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbklkIjo1Mzk1LCJ1c2VybmFtZSI6IjNFVmluZHVzdHJpZXMiLCJyb2xlcyI6IkNMSUVOVCIsImlhdCI6MTU5NTQ4NTY3OH0.b0-p4hhiC4GTQ3L1IIrAEEOzNwS2L-TVOa59w5fl-aI",
    "VehicleDetails: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJsb2dpbklkIjo1Mzk1LCJ1c2VybmFtZSI6IjNFVmluZHVzdHJpZXMiLCJyb2xlcyI6IkNMSUVOVCIsImlhdCI6MTU5NTQ4NTY3OH0.b0-p4hhiC4GTQ3L1IIrAEEOzNwS2L-TVOa59w5fl-aI",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
curl_close($curl);
//echo $response;
$someArray4= json_decode($response, true);
//print_r($someArray4);
$d1 = strlen($vehicleentityno);
$nx=count($someArray4['data']['getAllDeviceLocations']);
//echo $nx;
for ($x=0; $x<=$nx; $x++) {
$u[$x]=$someArray4['data']['getAllDeviceLocations'][$x]['vehicleNumber']."<br/>";
//print_r($u[$x]);
$c[$x]=$someArray4['data']['getAllDeviceLocations'][$x]['latitude']."<br/>";
//print_r($c[$x]);
$d[$x]=$someArray4['data']['getAllDeviceLocations'][$x]['longitude']."<br/>";
//print_r($d[$x]);
$d2[$x]= strlen($u[$x]);
$d3[$x] = substr($u[$x],0,10);
$d4[$x]= substr($u[$x],0,9);
$d5[$x]= substr($u[$x],0,8);
//echo strcmp($vehicleentityno,$d3[$x])."<br/>";
if(($vehicleentityno === $d3[$x]))
{
$k=$c[$x];
//print_r($k);
$f=$d[$x];
//print_r($f);
}
else if(($vehicleentityno === $d4[$x]))
{
$k=$c[$x];
//print_r($k);
$f=$d[$x];
//print_r($f);
}
else if(($vehicleentityno === $d5[$x]))
{
$k=$c[$x];
//print_r($k);
$f=$d[$x];
//print_r($f);
}
}
?>
    <div id="map"></div>
        <script type="text/javascript">
        var a = parseFloat('<?php echo $k; ?>'); 
       console.log(a);
         var b = parseFloat('<?php echo $f; ?>'); 
         console.log(b);
        var map=new MapmyIndia.Map("map",{ center:[a,b], zoomControl: true, hybrid:true, search:true, location:true}); 
        
        L.marker([a,b]).addTo(map);
         </script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

    <!-- FEATURES -->

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
                <h3 style="position:relative;text-align:left">SERVICES</h3>
                <p style="position:relative;font-size:20px;text-align:left">
                  3EV Industries aim is to build the operating system for
                  commerce in India. We provide transportation, warehousing
                  freight, reverse logistics, cross-border and technology
                  services to over 10000 customers including all of India’s
                  largest e-commerce companies and leading enterprises. Our 
                  transportation platform and logistics operations bring
                  flexibility, breadth, efficiency and innovation to our 
                  operations. Our operations, infrastructure and technology 
                  enable our customers to transact with us and our partners at 
                  the lowest costs.
                </p>
          </div>
        </div>
      </div>
    </section>
<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4" style="position:relative;background-color:orange">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold" style="position:relative;font-size:20px">3EV Industries Private Limited</h6>
        <p style="position:relative;font-size:20px">3EV Industries Private Limited emerged in 2019 from decades of Experience in off-grid-clean-energy technologies and global standards of sustainable business development .Our commitment is to be a trusted service provider meeting the needs of consumers and businesses at the hyper-local edge of passenger,goods,freight and value-added e-commerce fulfillment.</p>
       
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">
 <div class="line1"></div>
      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold" style="position:relative;font-size:20px">Company</h6>
        <p>
          <a href="#!" style="position:relative;font-size:20px">About Us</a>
        </p>
        <p>
          <a href="#!" style="position:relative;font-size:20px">Services</a>
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">
 <div class="line2"></div>
      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold" style="position:relative;font-size:20px">Useful links</h6>
        <p>
          <a href="#!" style="position:relative;font-size:20px">Support</a>
        </p>
        <p>
        <p>
          <a href="#!" style="position:relative;font-size:20px">Start Shipping</a>
        </p>
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">
 <div class="line3"></div>
      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold"  style="position:relative;font-size:20px">Contact</h6>
        <p style="position:relative;font-size:20px">
          <i class="fas fa-home mr-3">
              </i>No 4-8,Apparel Park,Phase-1,Doddaballapura,Karnataka,Bangalore - 561203</p>
        <p style="position:relative;font-size:20px">
          <i class="fas fa-envelope mr-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;info@3evi.com</i></p>
        <p style="position:relative;font-size:20px">
          <i class="fas fa-phone mr-3"></i>+91 9108881010</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center" style="position;relative;background-color:green">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left" style="position:relative;font-size:32px">© 2020 Copyright:
          <a href="https://mdbootstrap.com/">
            <strong>3ev Industries Private Limited</strong>
          </a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f" style="position:relative;font-size:34px"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter" style="position:relative;font-size:34px"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g" style="position:relative;font-size:34px"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-linkedin-in" style="position:relative;font-size:34px"></i>
              </a>
            </li>
          </ul>
        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>
<!-- Footer -->

    <!-- BOOTSTRAP SCRIPTS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
