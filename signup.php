<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$_SESSION['index'] = 1;
 ?>

<!DOCTYPE html>

<html>

<head>

  <title>SignUp</title>
  <link rel ="stylesheet" href ="signup_css.css">
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

    <p id="circle"><strong><img id="img3" src="startup.png" height="50px" width="50px"></strong></p>

    <div class="login_form" id="loglog">
      <form id="log_form">
        <center>
          <input type="number" id="log_form_number" name="_number" placeholder="PhoneNumber" required /><br /><br /><br>
          <input type="button" id="btn3" onclick="sendOtp('verifyNumber.php')" name="but1" value="Send OTP" />
        </center>
      </form>
  </div>
</div>

<script>
function sendOtp(action) {
    if((document.getElementById('log_form_number').value).toString().length != 12){
      swal({
       title: "Oops",
       text: "Enter a vaid Contact number",
     });
    }
    else{

      var opacityChange = document.getElementById('loglog').style.opacity = "0.91"

      var subForm = document.getElementById('log_form');
      subForm.action = action;
      subForm.method = 'post';
      subForm.submit();
    }
  }
</script>

</body>
</html>
