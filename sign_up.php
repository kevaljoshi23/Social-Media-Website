<?php

		$conn=mysqli_connect("localhost","root","","snw");
if(!$conn){
     die("connection failed".mysqli_connect_error());
 }

$result = array();
$name = isset($_POST['name']) ? $_POST['name'] : null;
$dob = isset($_POST['date']) ? $_POST['date'] : null;
$m_no = isset($_POST['num']) ? $_POST['num'] : null;
$email = isset($_POST['Email']) ? $_POST['Email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$gender = isset($_POST['gender']) ? $_POST['gender'] : null;

if(!empty($name) && !empty($m_no) && !empty($email)){
    $sql = "INSERT INTO sign_up(name, dob, gender, m_no, email, password) VALUES ('$name', '$dob', '$gender', '$m_no', '$email', '$password')";
$result['send_status']=$conn->query($sql);
echo "<script>window.open('sign_up_page.php', '_self')</script>";
}
else{
	echo "Registration Unsuccessful";
}
		
?>