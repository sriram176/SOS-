<?php

session_start();

?>

<!DOCTYPE html>

<html>

<head>

  <title>Login</title>
  <link rel ="stylesheet" href ="login_css.css">
  <link rel="icon" type="image/png" href="favicon.ico" sizes="32x32" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:400|Open+Sans:400i" rel="stylesheet">
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

        <button type="button" id="btn1" onclick="location.href = 'signup.php';">Sign Up</button>
        <!--<button type="button" id="btn" onclick="location.href = 'login.php';">Sign Up</button>-->
      </div>
    </div>

    <p id="circle"><strong><img id="img3" src="startup.png" height="50px" width="50px"></strong></p>

    <div class="login_form">
      <form id="log_form" method="POST" action="#">
        <center>
          <input type="text" id="log_form_text" name="name1" placeholder="Username" required/><br /><br />
          <input type="password" id="password" name="number1" placeholder="Password" required><br /><br />
          <input type="submit" name="sub" value="Log In">
        </center>
      </form>
    </div>
  </div>
</body>
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

$sql_entry = mysqli_query($conn,"SELECT * FROM registration_details");

while($row = mysqli_fetch_assoc($sql_entry))
    {
        $phone_number = $row['phone_number_id'];
        $password = $row['user_password'];

        if($_POST['name1'] == $phone_number){
          $_SESSION["phoneNum"] = $phone_number;
          $_SESSION['logout'] = 0;
         if($_POST['number1'] == $password) {
          echo "<script>
                location.href = 'afterLogIn.php';
               </script>";
         }
         else {
           echo "<script>
                 alert('INVALID USERNME OR PASSWORD');
                 </script>";
         }
      }
      else{
        echo "<script>
              alert('INVALID USERNME OR PASSWORD');
              </script>";
      }
    }
  $conn->close();
}
 ?>
