<!DOCTYPE html>

<?php
	require "database.php";
	$conn = connectDB();
	if(isset($_POST['username'])){
		if(login($_POST['username'], $_POST['password'])) {
			session_start();
			$_SESSION["userlogin"] = $_POST['username'];
			header("Location: index.php");
		}
	}
	
	function login($username, $password) {
		$conn = connectDB();
		
		$sql = "SELECT username, password FROM user WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0){
			$conn->close();
			return true;
		}
		$conn->close();
		return false;
	}	
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign In</title>

    <link rel= "stylesheet" type= "text/css" href= "resources/css/Tugas3.css">
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body style= "background-image:url(resources/img/starfield.jpg)">

    <div class="container">

      <form class="form-signin" method="POST" action="login.php">
        <h2 class="form-signin-heading">Glenn's Blog</h2>
        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div>
        <a href= "register.php">Forget password</a>
        </div>
		<input class="btn btn-lg btn-primary btn-block" type="submit" value="Sign In">
      </form>
    </div>
  </body>
</html>