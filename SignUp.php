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
		<form method="POST" action="SignUp.php">
		<h2>Registeration</h2>
		<input type="text" name="User"placeholder="UserName" required><br><br>
		<input type="password" name="pass" placeholder="Password" required><br><br>
		<input type="password" name="Cpass" placeholder="Comfrim Password"><br><br>
		<input type="submit" name="ok" value="SignUp"><br>
		Already Have Account <a href="Login.php">LogIn</a>
	<?php
	if (isset($_POST['ok'])) {
	 $con=mysqli_connect("localhost","root","","rdl");
	 $user=$_POST['User'];
	 $pass=$_POST['pass'];
	 $cpass=$_POST['Cpass'];
	 $sel="SELECT * FROM admin WHERE AdminName='$user'";
	 $dis=mysqli_query($con,$sel);
	 $num=mysqli_num_rows($dis);
	 if ($pass!=$cpass) {
	 echo "<script>alert('Password Incorrect')</script>";	
	 }
	 elseif ($num==1) {
	  echo "<script>alert('User Already Exist')</script>";	
	 }
	 else{
	 $ins="INSERT INTO admin SET AdminName='$user',Password='$pass'";
	 $res=mysqli_query($con,$ins);
	}
	if ($res) {
		echo "<script>alert('Insertion Successfully')</script>";
		header("location:Login.php");
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