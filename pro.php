<?php
error_reporting(E_ERROR | E_PARSE);
?>

<!DOCTYPE html>

<html>

<head>
  <script type="text/javascript" src="pro_js.js"></script>

  <title>SOS</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:500|Dosis:300|Roboto+Slab|Open+Sans:400i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link rel = "stylesheet" href = "style_pro.css">
  <link rel="icon" type="image/png" href="favicon.ico" sizes="32x32" />
</head>

<body>

  <div class = "container">
    <div class="banner_master">
      <div class="span1">
        <button id="logo" onclick="location.href = 'pro.php';">
          <h2 id="txt">Emergency</h2>
          <h2 id="txt">Services</h2>
        </button>

        <button type="button" id="btn1" onclick="location.href = 'login.php';">Log In</button>
        <button type="button" id="btn" onclick="location.href = 'signup.php';">Sign Up</button>
      </div>

      <div class = "span3">
        <button id="go_down" onclick="window.scrollTo(100,1100)"><img id="img1" src="sos.png" height="110px" width="110px"></button>
        <center><p id="caption"><strong>Take help from the most aesthetic yet more simplistic helping services</strong></p></center>
      </div>

    <button id="span1_btn" onclick="window.scrollTo(0,0)"><img src="upload.png" height="30px" width="30px"></button>
  </div>

  <div class = "button_group">

    <div class="span_1">
      <center>
        <img id="img2" src="maps.png" height="96px" width="96px">
        <p id="p2">Location</p>
        <hr>
        <p id="text">Check what resources are available near you</p>
        <button id="btn_1" onclick="location.href = 'map.html';">Map It</button>
      </center>
    </div>

    <div class="span_2">
      <center>
        <img id="span_1_img" src="navigation.png" height="96px" width="96px">
        <p id="p2">Login</p>
        <hr>
        <p id="text">Login to get personalised content and access the SOS</p>
        <button id="btn_1" onclick="location.href = 'login.php';">Login</button>
      </center>
    </div>

    <div class="span_1">
      <center>
        <img src="globe.png" height="96px" width="96px">
        <p id="p2">Search</p>
        <hr>
        <p id="text">Get help from online tools like Facebook Wikipedia YouTube</p>
        <button id="btn_1" onclick="location.href = 'search.html';">Search</button>
      </center>
    </div>
  </div>

  <div class="sos">
    <center><h2 id="sos_h2">Activate SOS</h2>
      <form id="sendCoords" method="POST" action="#">
        <input id="sos_txt" type="number" placeholder="Enter your ID" name="sosid" />
        <input id="lat" type="text" name="latitude" style="display:none">
        <input id="lon" type="text" name="longitude" style="display:none"><br/>
        <br><input id="sos_btn" type="submit" value="Engage" name="sub" /></center>
      </form>
      <center><p id="sos_p">By activating <strong>SOS</strong> you are hereby sending your exact co-ordinates to your nominees</p></center>
    </div>

    <div class="credits">
      <center><h2 id="credits_h2">Write to us at <br/><br/><br/><br/> <p id="credits_p">emergencyservices@gmail.com</p></h2></center>

    </div>

    <footer>
      &copy SOS TEAM
    </footer>

  </div>
</body>

<script>

function callModal(l, lo){

  var sosText = document.getElementById('sos_txt').value;

  //alert("Im here"+sosText);
    if(sosText != ""){
      window.location.href = "https://localhost/Project/locationSend.php?lat=" + l + "&lon=" + lo + "&number=" +sosText;
      swal({
        title: "COORDINATES",
        text: "Your location:\n"+l+"\n"+lo+"",
      });
  }
  else {
    swal({
      title: "OOPS",
      text: "Provide an ID ",
    });
  }
}
</script>


  <script>
  var width = screen.width;
  var height = screen.height;

  if(width < 1366 && height < 768){
    alert("Best viewd in "+width+" X "+""+height+" resolution");
  }

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else {
      alert("Geolocation is not supported by this browser.");
    }
  }

  function showPosition(position) {
    callModal(position.coords.latitude, position.coords.longitude);
  }
  </script>

</html>

<?php

if(isset($_POST['sub'])){

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "sos";

  $conn = mysqli_connect($servername,$username,$password,$database);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

//$sql_entry = mysqli_query($conn,"SELECT * FROM registration_details WHERE phone_number_id = '$_POST[sosid]'");

if(!mysqli_query($conn,"SELECT * FROM registration_details WHERE phone_number_id = '$_POST[sosid]'")){
  echo "<script>alert('No records found');</script>";
}

else{
  //echo "<script>alert('No records found');</script>";
}


while($row = mysqli_fetch_assoc($sql_entry))
    {
      $num1 = $row['nominee_1'];
      $num2 = $row['nominee_2'];
      $num3 = $row['nominee_3'];

      if($num1 == 0){
        echo "<script>alert('boom');</script>";
      }
    }

    echo "<script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert('Geolocation is not supported by this browser.');
      }
    }

    function showPosition(position) {
      callModal(position.coords.latitude, position.coords.longitude);
    }

    function callModal(l, lo){
      document.getElementById('lat').value = l;
      document.getElementById('lon').value = lo;
      //alert(' '+document.getElementById('lat').value+' '+document.getElementById('lon').value);
    }
    </script>";


            echo "<script>
            getLocation();
                  </script>";

    $value = $_POST['latitude'] . ' ' . $_POST['longitude'];

    include ( "NexmoMessage.php" );
    $nexmo_sms = new NexmoMessage('d10be4da', 'b4f858e8c938dd6c');
    $info = $nexmo_sms->sendText( $num1, 'MyApp', $value );
    $info = $nexmo_sms->sendText( $num2, 'MyApp', $value );
    $info = $nexmo_sms->sendText( $num3, 'MyApp', $value );
    echo "<script>
          var nominee_1 = $num1;
          var nominee_2 = $num2;
          var nominee_3 = $num3;
          alert('Message sent to '+nominee_1+' '+nominee_2+' '+nominee_3);
          //alert('good');
        </script>";
  }

?>
