<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
<style>
body
{
background-image: url("https://img.freepik.com/free-vector/green-sand-paper_53876-86281.jpg?size=626&ext=jpg");
background-position: center; 
background-repeat: no-repeat; 
background-size: cover;
color: black;
font-size: 25px;
font-weight: bold;
font-family: 'Josefin Sans', sans-serif;
}

input[type=submit] {
	border-radius: 20px;
	border: 1px solid #ff5733;
	background-color: #ff5733;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	width: 20%;
	}
input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 40%;
    text-align: center;
}
form { 
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	
	text-align: center;
}
</style>
<script src="javascriptval.js"></script>
</head>
<body>
<h2><center>Account Information</center></h2><a href="home.php" style="margin-left: 1250px; background-color: #FFCDD2; border: 1px solid black;
padding: 10px; color: black; text-decoration:none;">Back</a>
<hr />
<p><center>UPLOAD YOUR PROFILE PHOTO:</center></p>
<form action="insert-bac.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img" id="img">
        <button type="submit" class="btn btn-primary" value="Insert" style="background-color: #FFCDD2; border: 1px solid black; padding:10px;">Submit</button>
</form>
<hr />
<form name="chngpwd" action="" method="post" onSubmit="return valid();">
<p>CHANGE YOUR PASSWORD:</p> <br />
Your Old Password: <input type="text" name="opwd" id="old_password" size="40"><br />
Your New Password: <input type="text" name="npwd" id="password" size="40"><br />
Repeat Password  : <input type="text" name="cpwd" id="confirm_pwd" size="40"><br />
<input type="submit" name="senddata" id="senddata" value="Update Information">
</form>
<hr />
    <?php
  include 'db.php';
  session_start();
  if($_SESSION['Email'] == ""){
		header("location:sign_up_page.php");
	}
$id=$_SESSION['Email'];
$query=mysqli_query($conn,"SELECT * FROM sign_up where email='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>
<form action="" name="f1" method="post" >
<p>UPDATE YOUR PROFILE INFO:</p> <br />
Name: <input type="text" name="name" id="name" size="40" value="<?php echo $row['name']; ?>" onblur="Validate()" required ><br>
Mobile Number: <input type="text" name="num" pattern=".{10}" maxlength="10" size="40" value="<?php echo $row['m_no']; ?>" onblur="phone()" required><br />
DOB: <input type="date" id="date" name="date" placeholder="DOB" value="<?php echo $row['dob']; ?>" onblur="valAge()" required><br />
Email: <input type="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$" name="Email" size="40" value="<?php echo $row['email']; ?>" <br />
<label for="gender">Gender:</label>  
<input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>"><br>


<hr />
<input type="submit" name="updateinfo" id="updateinfo" value="Update Information">
</form>
   
<form action="" method="post">
<p>DELETE ACCOUNT:</p> 
<input type="submit" name="closeaccount" id="closeaccount" value="Delete My Account">
</form>
<hr />
</body>
</html>
 <?php
    if(isset($_POST['updateinfo'])){
        $id=$_SESSION['Email'];
      $Name = $_POST['name'];
	  $numb=$_POST['num'];
     $gender = $_POST['gender'];
        $Email = $_POST['Email'];
        $dob=$_POST['date'];
      $query = "UPDATE sign_up SET name = '$Name',
                       email = '$Email', gender= '$gender', dob='$dob', m_no=$numb
                      WHERE email = '$id'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
    </script>
	<?php
	}
    ?>
<?php
include("db.php");
if(isset($_POST['senddata']))
{  
 $oldpass=($_POST['opwd']);
 $useremail=$_SESSION['Email'];
 $newpassword=($_POST['npwd']);
$sql = "UPDATE sign_up SET password='$newpassword' WHERE email='$useremail'";
if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
}
?>
<script >
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>
<?php

    if(isset($_POST['closeaccount'])){
        $id=$_SESSION['Email'];
        $query= "DELETE FROM sign_up where email='$id'";
        $result=mysqli_query($conn, $query) or die(mysqli_error($conn));
        if($query)
{
    mysqli_close($query); // Close connection
    header("location:sign_up_page.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
    }
?>



<script>
 
function Validate() 
{
    var val = document.f1.name.value;
    
    if (!val.match(/^[a-zA-Z ]+$/)) 
    {
        alert('Only alphabets are allowed in Name Field');
        return false;
    }
    
    return true;
}
function phone(){
var val = document.f1.num.value;
if(isNaN(val))
{
alert("Enter the valid Mobile Number(Like : 9566137117)");
document.f1.num.focus();
return false;
}
return true;
}

date.max = new Date().toISOString().split("T")[0];

function valAge() 
 {
    var dateString = document.f1.date.value;
    if(dateString !="")
    {
         var today = new Date();
        var birthDate = new Date(dateString); //format is mm.dd.yyyy
         var age = today.getFullYear() - birthDate.getFullYear();

         if(age < 16 || age > 100)
         {
             alert("Age "+age+" is restrict");
			document.f1.date.value="";
         } 
         else 
         {
             //alert("Age "+age+" is allowed");
         }
     } 
    else 
    {
         alert("please provide your date of birth");
     }
 }
</script>