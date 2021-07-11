<html>
<head>
	<style>

 @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

input[type=submit] {
	border-radius: 20px;
	border: 1px solid #67e6e1;
	background-color: #67e6e1;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}
button {
	border-radius: 20px;
	border: 1px solid #67e6e1;
	background-color: #67e6e1;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #67e6e1;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 900px;
	max-width: 100%;
	min-height: 650px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background: #d941ff;
	background: -webkit-linear-gradient(to right, #FF4B2B, #d941ff);
	background: linear-gradient(to right, #FF4B2B, #d941ff);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
.ok{
	margin-top:0px;
	margin-left:0px;
}
#ok{
	margin-left:-87px;
	}
.bd{
	margin-top:0px;
	margin-left:-150px;
}
#bd{
	margin-left:-100px;
	}
	

    </style>
	</head>
<body>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form name="f1" action="sign_up.php" method="POST" onsubmit="return(matchpass()&&Validate()&&phone())">
			<h1>Create Account</h1>
			<input type="text" placeholder="Name" name="name" id="name" minlength="2" maxlength="25" required>
			<div class="bd"><label id="bd" for="DOB">Select DOB:</label></div>
			<input type="date" id="date" name="date" placeholder="DOB" onblur="valAge()" required>
			<div class="ok">
			<label id="ok" for="Gender">Select Gender:</label>
			<select name="gender" id="gender">
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
			  <option value="Other">Other</option>
			</select></div>
			<input type="text" name="num" pattern=".{10}" maxlength="10" placeholder="Enter 10 digit Mobile Number" required>
			<input type="email" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$" name="Email" placeholder="Email" required>
			<input type="password" name="password" placeholder="Password" minlength="6" maxlength="20" required>
			<input type="password" name="password2" placeholder="Confirm Password" minlength="6" maxlength="20" required>
			<input class="button" type="submit" value="Sign up" name="sign_up">
			
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form name="f2" action="login.php" method="POST" onsubmit="return Email()">
			<h1>Sign in</h1><br>
			<input type="text" name="Email" id="Email" placeholder="Email" required>
			<input type="password" placeholder="Password" name="password" required>
			<input class="button" type="submit" value="Sign In">
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">  
// function matchpass(){  )">
// var firstpassword=document.f1.password.value;  
// var secondpassword=document.f1.password2.value;  
  
// if(firstpassword==secondpassword){  
// return true;  
// }  
// else{  
// alert("password must be same!");  
// return false;  
// }  
// }  
// function Validate() 
// {
    // var val = document.f1.name.value;
    
    // if (!val.match(/^[a-zA-Z ]+$/)) 
    // {
        // alert('Only alphabets are allowed in Name Field');
        // return false;
    // }
    
    // return true;
// }
// function phone(){
// var val = document.f1.num.value;
// if(isNaN(val))
// {
// alert("Enter the valid Mobile Number(Like : 9566137117)");
// document.f1.num.focus();
// return false;
// }
// return true;
// }
// function ValidateEmail()
// {
// var val = document.f1.Email.value;
// var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
// if(val.value.match(mailformat))
// {
// document.f1.Email.focus();
// return true;
// }
// else
// {
// alert("You have entered an invalid email address!");
// document.f1.Email.focus();
// return false;
// }
// }
// date.max = new Date().toISOString().split("T")[0];
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
             window.open('sign_up_page.php', '_self');
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
<script src="javascriptval.js"></script>
<script src="main.js"></script>
</body>
</html>