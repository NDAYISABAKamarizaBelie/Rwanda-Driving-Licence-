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
			<form method="POST" action="Update.php">
				<?php
		$link=mysqli_connect("localhost","root","","rdl");
		$id=$_GET['upd'];
		$sel="SELECT * FROM Candidate WHERE CandidateNationalId='$id'";
		$res=mysqli_query($link,$sel);
		while ($row=mysqli_fetch_array($res)) {
		?>
				<h2>Candidate Registeration</h2>
				Candidate Id:<br>
				<input type="text" name="id" placeholder="Candidate Id" maxlength="16" required value="<?php echo $row['CandidateNationalId'];?>"><br><br>
				First Name:<br>
				<input type="text" name="Fname" placeholder="First Name" required value="<?php echo $row['FirstName'];?>"><br><br>
				Last Name:<br>
				<input type="text" name="Lname" placeholder="Last Name" required value="<?php echo $row['LastName'];?>"><br><br>
				Gender:<br>
				<select name="Gender">
					<option>Choose Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select><br><br>
				DOB:<br>
				<input type="date" name="Dob"required value="<?php echo $row['DOB'];?>"><br><br>
				Exam Date:<br>
				<input type="date" name="Exam" value="<?php echo $row['ExamDate'];?>"><br><br>
				Phone Number:<br>
				<input type="number" name="phone" placeholder="Phone Number" maxlength="12" required value="<?php echo $row['PhoneNumber'];?>"><br><br>
				<input type="submit" name="ok" value=" register">
			<?php } ?>
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
        $upd="UPDATE Candidate SET FirstName='$Fname',LastName='$Lname',Gender='$Gender',DOB='$Dob',ExamDate='$Exam',PhoneNumber='$phone' WHERE CandidateNationalId='$Id'";
        $dis=mysqli_query($link,$upd);
        if ($dis) { 
            echo "<script>alert('Update Successfully');</script>";	
            header("location:VCandidate.php");
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