<?php
session_start();
	include("connection.php");
    include("functions.php");
    $user_data = check_login($con);
	$user_name = $user_data['user_name'];
	$bio1 = $user_data['bio'];
	$linkedin_url1 = $user_data['linkedin_url'];
	$twitter_url1 = $user_data['twitter_uname'];
	

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//something was posted
		$bio = $_POST['bio'];
		$linkedin_url = $_POST['linkedin_url'];
        $twitter_url = $_POST['twitter_url'];
		if($bio==null){
			$bio = $bio1;
		}
		if($linkedin_url==null){
			$linkedin_url = $linkedin_url1;
		}
		if($twitter_url==null){
			$twitter_url = $twitter_url1;
		}
			$query = "UPDATE users SET bio='$bio', linkedin_url='$linkedin_url', twitter_uname='$twitter_url' where user_name='$user_name';";
			mysqli_query($con,$query);
			header("Location: profile.php");
			die(); 		
		
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	
	<nav class="navbar navbar-light bg-dark justify-content-between" >
		<a style="color:white" class="navbar-brand" href="index.php">Home</a>
		<a style="color:white" class="navbar-brand" href="signup.php">Sign Up</a>
		<a style="color:white" class="navbar-brand" href="login.php">Login</a>
		<a style="color:white" class="navbar-brand" href="logout.php">Logout</a>
		<a style="color:white" class="navbar-brand" href="profile.php">View profile</a>
		<a style="color:white" class="navbar-brand" href="editProfile.php">Edit profile</a>
		<a style="color:white" class="navbar-brand" href="news.php" target="_blank">News</a>
		<a style="color:white" class="navbar-brand" href="bookmark.php" target="_blank">Bookmarks</a>

	</nav>

	<style>
		@import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		body{
			margin:0;
			padding:0;
			font-family:sans-serif;
			background:url("images/login-signup-bg.jpg") no-repeat;
			background-size:cover;
			opacity:1;
		}
	</style>

	<div class = "login-box">
		<form method = "POST">
			<h1>Edit Profile</h1>

			<div class = "textbook">
				<input id = "text" type="text" name="bio" placeholder="add bio">
			</div>
			<div class = "textbook">
				<input id = "text" type="text" name="linkedin_url" placeholder="linkedin user name">
			</div>
			<div class = "textbook">
				<input id = "text" type="text" name="twitter_url" placeholder="twitter user name">
			</div>
			
			<input class = "btn" type="submit" value="Save changes" >
		</form>
    <div>

</body>
</html>