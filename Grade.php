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
			<form method="POST" action="Grade.php">
				<h2>Grade Registeration</h2>
				Candidate Id:<br>
				<select name="Id">
					<option>Choose Candidate Id</option>
					<?php 
		             $link=mysqli_connect("localhost","root","","rdl");
		             $sel="SELECT * FROM Candidate";
		             $res=mysqli_query($link,$sel);
		             while ($row=mysqli_fetch_array($res)) {
					?>
					<option value="<?php echo $row['CandidateNationalId'];?>"><?php echo $row['CandidateNationalId'];?>||<?php echo $row['FirstName']."&nbsp".$row['LastName'];?></option>
				<?php } ?>
				</select><br><br>
				LicenseExamCategory:<br>
				<select name="Category">
					<option>Choose License Category</option>
					<option value="A Category">A Category</option>
					<option value="B Category">B Category</option>
					<option value="C Category">C Category</option>
					<option value="D Category">D Category</option>
					<option value="E Category">E Category</option>
					<option value="Provisional">Provisional</option>
				</select><br><br>
				ObtainedMarks/20:<br>
				<input type="number" name="marks" placeholder="ObtainedMarks/20" required><br><br>
				<input type="submit" name="ok"value=" register">
			</form>
		</center>
		<?php
		if (isset($_POST['ok'])) {
		$link=mysqli_connect("localhost","root","","rdl");
		$id=$_POST['Id'];
		$Category=$_POST['Category'];
		$Marks=$_POST['marks'];
		if ($Marks<12 AND $Marks>0) {
        $ins="INSERT INTO grade SET CandidateNationalId='$id',LicenseExamCategory='$Category',ObtainedMarks='$Marks',Decision='Fail'";
        $dis=mysqli_query($link,$ins);
        }
        elseif ($Marks>=12 AND $Marks<=20) {
        $ins1="INSERT INTO grade SET CandidateNationalId='$id',LicenseExamCategory='$Category',ObtainedMarks='$Marks',Decision='Pass'";
        $dis1=mysqli_query($link,$ins1);
        }
        else{
        	echo "<script>alert('Incorrect Marks'); Window.location='VGrade.php';</script>";
        }
		if ($dis || $dis1) {
			echo "<script>alert('Insertion Successfully')</script>";
			header("location:VGrade.php");
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