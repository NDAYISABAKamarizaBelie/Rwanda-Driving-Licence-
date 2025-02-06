<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RDL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header"></div>
	<div class="content">
		<br><br>
	<center>
		<form method="POST" action="Login.php">
		<h2>LogIn Form</h2>
		<input type="text" name="User"placeholder="UserName" required><br><br>
		<input type="password" name="pass" placeholder="Password" required><br><br>
		<input type="submit" name="ok" value="LogIn"><br>
		Create New Account <a href="SignUp.php">SignUp</a>
	<?php
	if (isset($_POST['ok'])) {
	 $con=mysqli_connect("localhost","root","","rdl");
	 $user=$_POST['User'];
	 $pass=$_POST['pass'];
	 $sel="SELECT * FROM admin WHERE AdminName='$user' AND Password='$pass'";
	 $dis=mysqli_query($con,$sel);
	 $num=mysqli_num_rows($dis);
	 $row=mysqli_fetch_array($dis);
	 if ($dis==1) {
	 $_SESSION['login']=$row['AdminName'];
	 header("location:index.php");
	 }
	 else{
	  echo "<script>alert('User Doesn`t Exist');</script>";	
	 }
     }
    ?>
    </form>
    </center>
	</div>
	<br><br>
	<div class="footer">
		<br>
		<center>&copy Rwanda Driving Licence</center>
	</div>
</body>
</html>