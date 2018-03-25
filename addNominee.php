<!DOCTYPE HTML>

<html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SignUp</title>
  <link rel ="stylesheet" href ="addNominee.css">
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
    <form id="registration_form" method="" action="">
      <center>
        <input id="name" type="text" name="name" placeholder="Name *" required/><br><br>
        <input id="password" type="password" name="pwd" placeholder="Password *" required/><br><br>
        <input id="phoneNumber" type="number" name="phoneNumber" placeholder="PhoneNumber *" required /><br><br>
        <input id="nominee_1" type="number" name="nominee_1" placeholder="Nominee1 *" required /><br><br>
        <input id="nominee_2" type="number" name="nominee_2" placeholder="Nominee2 *" required /><br><br>
        <input id="nominee_3" type="number" name="nominee_3" placeholder="Nominee3 *" required /><br><br>
        <input id="aadhar" type="number" name="aadhar" placeholder="Aadhar ID *" required /><br><br><br>
        <input type="number"  placeholder="Vehicle Number" required /><br><br>
        <input type="number"  placeholder="Pan Card" required /><br><br>
        <input type="number"  placeholder="License Number" required /><br><br>
        <input type="button" onclick="myValidate()" value="Submit" />
      </center>
    </form>
  </div>
</div>

</body>

<script>
function myValidate(){
  var form_name = document.getElementById("name").value;
  var form_phoneNumber = document.getElementById("phoneNumber").value;
  var form_nominee_1 = document.getElementById("nominee_1").value;
  var form_nominee_2 = document.getElementById("nominee_2").value;
  var form_nominee_3 = document.getElementById("nominee_3").value;
  var form_aadhar = document.getElementById("aadhar").value;
  if(form_name == ""){
    //alert(""+form_name);
    swal({
     title: "Oops",
     text: "Enter Name"
   });
  }

  else if(form_phoneNumber.toString().length != 12){
    //alert("Enter a valid Nominee 2 number");
    swal({
     title: "Oops",
     text: "Enter a valid PhoneNumber"
   });
    //alert(""+form_phoneNumber);
  }
  else if(form_nominee_1.toString().length != 12){
    swal({
     title: "Oops",
     text: "Enter a valid Nominee 1 number",
    });
  }
  else if(form_nominee_2.toString().length != 12){
    //alert("Enter a valid Nominee 2 number");
    swal({
     title: "Oops",
     text: "Enter a valid Nominee 2 number",
    });
  }
  else if(form_nominee_3.toString().length != 12){
    //alert("Enter a valid Nominee 3 number");
    swal({
     title: "Oops",
     text: "Enter a valid Nominee 3 number",
    });
  }
  else if(form_aadhar.toString().length != 12){
    //alert("Enter a valid aadhar number");
    swal({
     title: "Oops",
     text: "Enter a valid aadhar number",
   });
 }
  else{
    var subForm = document.getElementById('registration_form');
    subForm.action = "loggedIn.php";
    subForm.method = 'post';
    subForm.submit();
  }
}
</script>
</html>
