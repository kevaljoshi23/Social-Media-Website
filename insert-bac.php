<?php
session_start();
$servername='localhost';
$username='root';
$password='';
$dbname='snw';


// Get values from form and store in variables
$usn=$_SESSION["Email"];
//$img=$_POST["img"];


// Get image content
$file = addslashes(file_get_contents($_FILES['img']['tmp_name']));

// connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
//echo "<br>";

// Insert
$sql = "UPDATE sign_up SET photo='$file' where email='$usn'";

// Execute query
if(mysqli_query($conn,$sql)){
    //echo "New record inserted";
    header("Location: account_info.php");
} else{
    echo "Error:File too large ";
}

// Redirect to home.php
//header("Location: home.php");

$conn->close();
?>
