<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$conn=mysqli_connect("localhost","root","","snw");
if(!$conn){
 	die("connection failed".mysqli_connect_error());
 }

$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$sender = isset($_POST['sender']) ? $_POST['sender'] : null;
$receiver = isset($_POST['receiver']) ? $_POST['receiver'] : null;

if(!empty($message) && !empty($sender) && !empty($receiver)){
    $sql = "INSERT INTO posts(message, sender, receiver) VALUES ('$message', '$sender', '$receiver')";
    $result['send_status']=$conn->query($sql);
}

$start = isset($_GET['sender']) ? $_GET['sender'] : null;
$rece = isset($_GET['receiver']) ? $_GET['receiver'] : null;
$count = isset($_GET['count']) ? intval($_GET['count']) : intval(0);
$s="SELECT * FROM posts where id>'$count' and ((sender='$start' and receiver = '$rece') or (sender='$rece' and receiver='$start')) ";
$items = $conn->query($s);
while($row = $items->fetch_assoc()){
    $result['items'][]=$row;
}

$conn->close();

echo json_encode($result);
?>