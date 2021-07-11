<?php
session_start();
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$conn=mysqli_connect("localhost","root","","snw");
if(!$conn){
 	die("connection failed".mysqli_connect_error());
}

$res = array();
$usn = $_SESSION['Email'];
$num = $start = isset($_GET['num']) ? $_GET['num'] : null;
if($num){
    $show = "SELECT name FROM sign_up where email != '$usn'";
    $sh = $conn->query($show);
    while($ro=$sh->fetch_assoc()){
        $res['items'][]=$ro;
    }
}

echo json_encode($res);

?>