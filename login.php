<?php
session_start();
$conn=mysqli_connect("localhost","root","","snw");
if(!$conn){
     die("connection failed".mysqli_connect_error());
 }

$result = array();
$Email = isset($_POST['Email']) ? $_POST['Email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$select_user = "select name from sign_up where Email='$Email' AND password='$password'";
		$query= mysqli_query($conn, $select_user);
		$check_user = mysqli_num_rows($query);
		/*$result['send_status']=$conn->query($select_user);*/
		if($check_user == 1){
			$_SESSION['Email'] = $Email;
			$sql="select name from sign_up where Email='$Email' AND password='$password'";
			$result = $conn->query($sql);
			$res = $result->fetch_assoc();
			$_SESSION['name']=$res['name'];
			echo "<script>window.open('home.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Password is incorrect')</script>";
		}
		?>