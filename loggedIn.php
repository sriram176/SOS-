<?php
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

$sql_entry = "INSERT INTO registration_details(phone_number_id, name, nominee_1, nominee_2, nominee_3, aadhar, user_password) VALUES ('$_POST[phoneNumber]','$_POST[name]','$_POST[nominee_1]','$_POST[nominee_2]','$_POST[nominee_3]','$_POST[aadhar]','$_POST[password]')";

if ($conn->query($sql_entry) === TRUE) {
    echo "<script>
          alert('Registration Successful');
          </script>
          ";
} else {
    echo "Error: " . $sql_entry . "<br>" . $conn->error;
}
/*if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
}*/
//echo "Connected successfully";

//mysql_select_db("sos", $conn);

$conn->close();
?>


<!DOCTYPE html>

<html>
<head>
</head>

<body>
</body>

<script>location.href = "pro.php";</script>

</html>
