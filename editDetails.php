<?php

session_start();

?>


<!DOCTYPE html>

<html>

<head>
  <title>Edit Details || SOS</title>
  <link rel="stylesheet" href="editDetails.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:500|Dosis:300|Roboto+Slab|Open+Sans:400i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
          <a href="#">Working</a>
        </div>
      </div>
    </div>

</body>

</html>

<?php

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

      echo '
        <p id="circle"><strong><img id="img3" src="startup.png" height="50px" width="50px"></strong></p>
          <div class="login_form" id="loglog" style="height:580px; padding-top:80px;">
            <form id="registration_form" method="POST" action="#">
              <center>
                <input type="text" value='.$row['name'].' placeholder="Name" name="user_name"><br><br>
                <input type="text" value='.$row['phone_number_id'].' placeholder="PhoneNumber" name="phoneNumber"><br><br>
                <input type="number" value = '.$row['nominee_1'].' placeholder="Nominee 1" name="nominee_1"><br><br>
                <input type="number" value = '.$row['nominee_2'].' placeholder="Nominee 2" name="nominee_2"><br><br>
                <input type="number" value = '.$row['nominee_3'].' placeholder="Nominee 3" name="nominee_3"><br><br>
                <input type="number" value = '.$row['aadhar'].' placeholder="Aadhar ID" name="aadhar"><br><br>
                <input type="number" value = '.$row['user_password'].' placeholder="Password" name="pwd"><br><br><br>
                <input type="Submit" value = "Update" id="subbtn" name="subbtn">
                </center>
              </form>
            </div>';
        //$phone_number = $row['phone_number_id'];
        //$password = $row['user_password'];
        //echo("Error description: " . $row['user_password']);
}

if(isset($_POST['subbtn'])){
  if(mysqli_query($conn, "UPDATE registration_details SET user_password = '$_POST[pwd]',phone_number_id = '$_POST[phoneNumber]', nominee_1 = '$_POST[nominee_1]', nominee_2 = '$_POST[nominee_2]', nominee_3 = '$_POST[nominee_3]', aadhar = '$_POST[aadhar]', name = '$_POST[user_name]'  WHERE phone_number_id = '$_SESSION[phoneNum]'")){
  $_SESSION['record_status'] = 1;
  echo '
      <script>
        location.href = "afterLogIn.php";
      </script>
      ';
}
}
 ?>
