<?php

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
  else{
    //echo "<script>alert('Connected Successfully')</script>";
  }

  $sql = "SELECT*FROM registration_details WHERE phone_number_id=$_GET[number]";
  if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        $num1 = $row['nominee_1'];
        $num2 = $row['nominee_2'];
        $num3 = $row['nominee_3'];
      }
      //echo $num3;

      $location = $_GET['lat'] . PHP_EOL . $_GET['lon'];
      //echo $location;

      include ( "NexmoMessage.php" );
      $nexmo_sms = new NexmoMessage('d10be4da', 'b4f858e8c938dd6c');
      $info = $nexmo_sms->sendText( $num1, 'MyApp', $location );
      $info = $nexmo_sms->sendText( $num2, 'MyApp', $location );
      $info = $nexmo_sms->sendText( $num3, 'MyApp', $location );
      // Close result set

      echo "<script>alert('Location sent');
      location.href='pro.php';</script>";
      mysqli_free_result($result);
    } else{
      //sleep(5)
;      echo "<script>alert('No records matching your query were found.')</script>";
    }
  } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
  $conn->close();

  //sleep(5);

  //echo "You are being redirected" . "<script>location.href = 'localhost/Project/pro.php';";
//}
?>

<script>
  //setTimeout(continueExecution, 5000)
  location.href = 'pro.php';
</script>
