<?php
session_start();   
$servername='localhost';
$username='root';
$password='';
$dbname='snw';


// Get values from form and store in variables
$usn=$_SESSION["name"];
$email=$_SESSION["Email"];
$img = $_POST["img"];
$imgabout = $_POST["imgabout"];

// Get image content
$file = addslashes(file_get_contents($_FILES['img']['tmp_name']));

// connection object
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
echo "<br>";

// Insert
$sql = "INSERT INTO sharedposts (username, sharedImage, caption, email) VALUES('$usn', '$file', '$imgabout','$email')";

// Execute query
if($conn->query($sql) === TRUE){
    echo "New record inserted";
} else{
    echo "Error: "."<br>".$conn->error;
}

// Redirect to display.php
header("Location: home.php");

$conn->close();
?>