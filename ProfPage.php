<?php
    session_start();
	if($_SESSION['Email'] == ""){
		header("location:sign_up_page.php");
	}
    include 'db.php';
?>
<html>
<title>Profile Page</title>
<head>
<link type="text/css" rel="stylesheet" href="ProfPage.css" />
<link type="text/css" rel="stylesheet" href="homeP.css" />
<link href="https://fonts.googleapis.com/css2?family=Quantico:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<div class="head">
<div class="ok">WeConnect</div>
<div id="profile" class="head"><a href="">Profile</a></div>
<div id="profile1" class="head">|</div>
<div id="home" class="head"><a href="home.php">Home</a></div>
<div id="profile2" class="head">|</div>
<div id="news" class="head"><a href="news.php">Trending News</a></div>
<div id="message" class="head" ><a href="chat.php"><img src="chat.png"/></a></div>
<div id="logout" class="head" ><a href="logout.php"><img src="lo.png"/></a></div>
</div>

<div class="phead">
</div>

<div class="coverpad">
</div>
<div class="coverpadx"><img src="coverx.jpg" width="850px" height="310px"/>
</div>

<div class="pp"></div>
<div class="ppx">
<?php
                $conn = mysqli_connect("localhost","root","","snw");
				$user=$_SESSION['Email'];
                $sql = "SELECT * FROM sign_up where email LIKE '$user' ";
                $result = $conn->query($sql);
				if ($result){
                while($res = $result->fetch_assoc()){
                   if($res['photo']){
					echo '<img class="op"    style=" width: 149px;
    height: 149px; margin-left: -4px;margin-top: -4px;" src="data:image/jpeg;base64,'.base64_encode($res['photo']).'"/>';
				   }else{
					echo '<img class="op" style=" width: 145px;
    height: 145px;" src="profile.png"/>';
				}
                    
                }
				}
            ?>
			</div>

<div class="usna" style="font-family: tahoma; font-size: 35px; color: black; white-space:nowrap;"><?php echo $_SESSION["name"]?>
<div id="l19" style="margin-top:5px; margin-left:-5px;"><a href="account_info.php" style="font-family: tahoma; font-size: 20px; color: black; padding:2px;">Edit Profile</a></div>
</div>



<div class="postx">
</div>
<div class="postx1">
<div id="col"class="postx">Add photos/videos<hr>
<form action="insert-back.php" method="post" enctype="multipart/form-data">
    Add Image<pre><input type="file" name="img" id="img"></pre>
    Add Description<pre><textarea name="imgabout" id="imgabout" placeholder="description" rows="3" cols="50"></textarea></pre>
    <button type="submit" class="btn btn-primary" value="Insert">Submit</button>
</form>
</div>
<div class="posts">
            <?php
                $conn = mysqli_connect("localhost","root","","snw");
				$user=$_SESSION['Email'];
                $sql = "SELECT * FROM sharedposts as sp,sign_up as su where sp.email like '$user' and sp.email=su.email  order by date desc";
                $result = $conn->query($sql);
                while($res = $result->fetch_assoc()){
                    echo "<div class='complete-post' style='width: 750px;height: auto;margin-left: -270px;margin-top: -50px; margin-bottom:90px;'>";
						echo "<div class='post-text'>";
						if($res['photo']){
						echo '<img class="op"    style=" width: 85px;
    height: 85px; margin-left:20px; margin-top:5px; border-radius:50%;" src="data:image/jpeg;base64,'.base64_encode($res['photo']).'"/>';
						}else{
						echo '<img style=" width: 85px;
    height: 85px; margin-left:20px; margin-top:5px; border-radius:50%;" src="profile.png"/>';
						}
                            echo '<h3>'.$res['username'].'</h3>
                                  <p>'.$res['date'].'</p>';
                        echo "</div>";
                        echo '<img class="img-class" src="data:image/jpeg;base64,'.base64_encode($res['sharedImage']).'"/>';
						echo '<h3>'.$res['caption'].'</h3>';
                    echo "<div class='action-button'>";
						echo "<img class='like-button' src='https://img.icons8.com/nolan/64/facebook-like.png'/>";
						echo "<img class='comment-button' src='https://img.icons8.com/nolan/64/topic.png'/>";
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>



<div class="friend-list">
</div>
<div class="slider" style="font-family: 'Quantico', sans-serif;">
<p><h1><center>Users</center></h1></p>
<?php
                $conn = mysqli_connect("localhost","root","","snw");
				$user=$_SESSION['name'];
                $sql = "SELECT name FROM sign_up where name != '$user' ";
                $result = $conn->query($sql);
                while($res = $result->fetch_assoc()){
                   
					echo '<h3 style="margin:10px;">'.$res['name'].'</h3>';
                  
                    
                }
            ?>
</div>

<!--<div class="pos2">
</div>
<div class="pos3">
</div>-->
</div>

<div class="pleft" style=" background-image:url('lap.jpg');
	background-size:100% 100%;
	box-shadow:1px 2px 10px 6px grey;
	animation:slider 25s infinite linear;"></div>



</body>
</html>