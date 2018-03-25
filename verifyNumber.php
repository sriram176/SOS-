<?php
session_start();

error_reporting(E_ERROR | E_PARSE);

$servername = "localhost";
$username = "root";
$password = "";
$database = "sos";

// Create connection
$conn = new mysqli($servername,$username,$password,$database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_entry = "SELECT phone_number_id FROM registration_details";

if($result = mysqli_query($conn, $sql_entry)){
  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      if($_POST[_number] == $row[phone_number_id]){
      echo "<script>
              alert('NUMBER ALREADY REGISTERED');
              location.href = 'signup.php';
            </script>
            ";
    }
  }
}
    else {
    //echo "Error: " . $sql_entry . "<br>" . $conn->error;
}
}
/*if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
}*/
//echo "Connected successfully";

//mysql_select_db("sos", $conn);

$conn->close();

if(isset($_SESSION['index'])){
  $otp = mt_rand(1000,10000);
  include ( "NexmoMessage.php" );
  $nexmo_sms = new NexmoMessage('d10be4da', 'b4f858e8c938dd6c');
  $info = $nexmo_sms->sendText( $_POST['_number'], 'MyApp', $otp );
  echo "<script>
  alert('OTP sent');
  </script>";
  $_SESSION['index'] = 2;
  $_SESSION['otpNum'] = $otp;
}
?>

<!DOCTYPE html>

<html>

<head>

  <title>SignUp</title>
  <link rel ="stylesheet" href ="verifyNumber.css">
  <link rel="icon" type="image/png" href="favicon.ico" sizes="32x32" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:500|Open+Sans:400i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dosis:300" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>

  <div class="container">
    <div class="banner_master">
      <div class="span1">
        <button id="logo" onclick="location.href = 'pro.php';">
          <h2 id="txt">Emergency</h2>
          <h2 id="txt">Services</h2>
        </button>
        <!--<button type="button" id="btn1" onclick="location.href = 'login.php';">Log In</button>-->
      </div>
    </div>

    <p id="circle"><strong><img id="img3" src="startup.png" height="50px" width="50px">&nbsp&nbspSign Up!</strong></p>

    <div class="login_form">
      <form id="log_form" action="" method="">
        <center>
          <input type="number" id="log_form_number" name="01_number" placeholder="Enter OTP" required /><br /><br /><br>
          <input type="button" id="btn3" name="but1" onclick="verifyOtp('addNominee.php')" value="Verify" />
        </center>
      </form>
    </div>
  </div>

  <script>

  window.onbeforeunload = function() {
    return "Dude, are you sure you want to leave? Think of the kittens!";
    location.href = 'verifyNumber.php';
  }

  function verifyOtp(action){
    var eneteredOtp = '<?php echo $_SESSION['otpNum']; ?>';
    if(parseInt(eneteredOtp) == document.getElementById('log_form_number').value){
      alert("Number Verified");
      var subForm = document.getElementById('log_form');
      subForm.action = action;
      subForm.method = 'post';
      subForm.submit();
    }
    else{
      swal({
        title: "Oops",
        text: "Re-Enter"+eneteredOtp,
      });
    }
  }
</script>

</body>
</html>
