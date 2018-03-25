<?php

session_start();
if(!$_SESSION['record_status']){
if($_SESSION['record_status'] == 1){
  echo '<script>
          alert("Record Updated");
      </script>
  ';
}
}

$_SESSION['record_status'] = 0;
//echo $_SESSION['phoneNum'];

?>

<!DOCTYPE html>

<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SOS</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:500|Dosis:300|Roboto+Slab|Open+Sans:400i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link rel = "stylesheet" href = "afterLogIn.css">
  <link rel="icon" type="image/png" href="favicon.ico" sizes="32x32" />

</head>

<body>

  <div class = "container">
    <div class="banner">
      <button id="logo" onclick="location.href = 'pro.php';">
        <h2 id="txt">Emergency</h2>
        <h2 id="txt">Services</h2>
      </button>

      <div class="dropdown">
        <button type="button" class="dropbtn" id="img_btn" onclick="location.href = 'signup.php';"><img src="user.png" height="64px" width="64px"></button>
        <div class="dropdown-content">
          <a href="login.php">Log Out</a>
          <a href="editDetails.php">Edit Details</a>
        </div>
      </div>
    </div>

    <div class="emergencyButton">
      <center>
        <form id="locateForm" method="POST" action="#">
          <input id="lat" type="text" name="latitude" style="display:none">
          <input id="lon" type="text" name="longitude" style="display:none"><br/>
          <input id="emeButton" type="submit" name="sub" value="SOS">
      </form>
      </center>
    </div>
</body>

<script>

var width = screen.width;
var height = screen.height;

if(width < 1366 && height < 768){
  alert("Best viewd in "+width+" X "+""+height+" resolution");
}

</script>

</html>

<?php

if(isset($_POST['sub'])){
  //echo "<script>
  //alert('boom');
  //</script>";

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "sos";

  $conn = mysqli_connect($servername,$username,$password,$database);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

$sql_entry = mysqli_query($conn,"SELECT * FROM registration_details WHERE phone_number_id = '$_SESSION[phoneNum]'");

while($row = mysqli_fetch_assoc($sql_entry))
    {
      $num1 = $row['nominee_1'];
      $num2 = $row['nominee_2'];
      $num3 = $row['nominee_3'];
    }
    //echo $num3;
    //echo $location;
    // Close result set

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
