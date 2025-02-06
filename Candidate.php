<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("location:Login.php");
}
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
	<div class="header">
		<div class="navbar">
			<ul>
				<li><a href="Index.php">Home</a></li>
				<li><a href="Candidate.php">Candidate</a></li>
				<li><a href="Grade.php">Grade</a></li>
				<li><a href="#">View</a>
					<div class="submenu">
						<ul>
							<li><a href="VCandidate.php">Candidate</a></li>
							<li><a href="VGrade.php">Grade</a></li>
						</ul>
					</div>
				</li>
				<li><a href="#">Report</a>
					<div class="submenu">
						<ul>
							<li><a href="Decision.php">Decision</a></li>
							<li><a href="Category.php">Category</a></li>
							<li><a href="Single.php">Candidate</a></li>
						</ul>
					</div>
				</li>
				<li><a href="Logout.php">LogOut</a></li>
			</ul>
		</div>
	</div>
	<div class="content">
		<br><br>
		<center>
			<form method="POST" action="Candidate.php">
				<h2>Candidate Registeration</h2>
				Candidate Id:<br>
				<input type="text" name="id" placeholder="Candidate Id" maxlength="16" required><br><br>
				First Name:<br>
				<input type="text" name="Fname" placeholder="First Name" required><br><br>
				Last Name:<br>
				<input type="text" name="Lname" placeholder="Last Name" required><br><br>
				Gender:<br>
				<select name="Gender">
					<option>Choose Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select><br><br>
				DOB:<br>
				<input type="date" name="Dob"required><br><br>
				Exam Date:<br>
				<input type="date" name="Exam"><br><br>
				Phone Number:<br>
				<input type="number" name="phone" placeholder="Phone Number"><br><br>
				<input type="submit" name="ok"value=" register">
			</form>
		</center>
		<?php
		if (isset($_POST['ok'])) {
        $link=mysqli_connect("localhost","root","","rdl");
        $Id=$_POST['id'];
        $Fname=$_POST['Fname'];
        $Lname=$_POST['Lname'];
        $Gender=$_POST['Gender'];
        $Dob=$_POST['Dob'];
        $Exam=$_POST['Exam'];
        $phone=$_POST['phone'];
        if (strlen($Id) > 16 OR strlen($Id) < 16) {
        	echo '<script type=text/javascript>alert("Please Check Natinal Id");</script>';
        }
        if (strlen($phone) > 10 OR strlen($phone) < 10) {
        	echo '<script type=text/javascript>alert("Please Check Phone Number");</script>';
        }
        else{
         $sel="SELECT * FROM Candidate";
         $sql=mysqli_query($link,$sel);
         $row=mysqli_fetch_array($sql);
         if ($Id!=$row['CandidateNationalId']) {
         	if ($phone!=$row['PhoneNumber']) {
         	$sel1="SELECT datediff('$Exam','$Dob') As Dt FROM candidate";
         	$dis=mysqli_query($link,$sel1);
         	$res=mysqli_fetch_array($dis);
         if ($res['Dt'] >=6570) {
           $ins="INSERT INTO candidate SET CandidateNationalId='$Id',FirstName='$Fname',LastName='$Lname',Gender='$Gender',DOB='$Dob',ExamDate='$Exam',PhoneNumber='$phone' ";
             $dis=mysqli_query($link,$ins);
            if ($dis) { 
            echo "<script>alert('Insertion Successfully')</script>";	
        	 }
        	 else{
        	 	echo "<script>alert('Insertion Fail')</script>";
        	 }
        	}
        	 else{
        	 	echo "<script>alert('You Are Under 18')</script>";
        	 }}
         	else{
         		echo "<script>alert('Change Phone Number')</script>";
         	}
         	}
         	else{
         		echo "<script>alert('Change Natinal Id')</script>";
         	}
         }
    } 
		?>
	</div>
	<br><br>
	<div class="footer">
		<br>
		<center>&copy Rwanda Driving Licence</center>
	</div>
</body>
</html>