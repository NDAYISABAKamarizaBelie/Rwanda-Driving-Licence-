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
			<form method="POST" action="SReport.php">
				<h2>Candidate Report</h2>
				Candidate National Id:<br>
				<select name="Id">
					<option>Choose Candidate Id</option>
					<?php 
		             $link=mysqli_connect("localhost","root","","rdl");
		             $sel="SELECT Distinct(CandidateNationalId) FROM Grade";
		             $res=mysqli_query($link,$sel);
		             while ($row=mysqli_fetch_array($res)) {
					?>
					<option value="<?php echo $row['CandidateNationalId'];?>"><?php echo $row['CandidateNationalId'];?></option>
				<?php } ?>
				</select><br><br>
				<input type="submit" name="ok"value=" register">
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