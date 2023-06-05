<?php 

include 'config.php';
session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	if(($email =='admin@admin.com')&&($password=='admin')){
		header("Location: admin.php");
	}
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND status='approved'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['id'] = $row['id'];
		$_SESSION['password'] = $row['password'];
		if(($_SESSION['username']=='admin')&&($_SESSION['email']=='admin@admin.com')&&($_SESSION['id']=='15')&&($_SESSION['password']=='21232f297a57a5a743894a0e4a801fc3')){
			$path = $_SERVER['admin'];
			header("location: welcomeadmin.php");
		}
		else{
			header("Location: welcome.php");
		}
		
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong. OR Your account not approved')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style1.css">

	<title>Log in</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
			
		</form><br>
		<center><a href="index.php" class="login-register-text">Home Page</a></center>
	</div>
</body>
</html>