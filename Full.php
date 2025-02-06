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
		<table border="1">
			<h2>License Category Grade Report</h2>
			<tr>
				<th>CandidateNationalId</th><th>License Exam Category</th><th>Obtained Marks/20</th><th>Decision</th>
			</tr>
			<?php
			if (isset($_POST['ok'])) {
			$link=mysqli_connect("localhost","root","","rdl");
			$Category=$_POST['Id'];
			$sel="SELECT * FROM Grade WHERE LicenseExamCategory='$Category'";
			$res=mysqli_query($link,$sel);
			while ($row=mysqli_fetch_array($res)) {
			?>
			<tr>
				<td><?php echo $row['CandidateNationalId'];?></td>
				<td><?php echo $row['FirstName'];?></td>
				<td><?php echo $row['LastName'];?></td>
				<td><?php echo $row['Gender']?></td>
				<td><?php echo $row['DOB']?></td>
				<td><?php echo $row['ExamDate']?></td>
				<td><?php echo $row['PhoneNumber']?></td>
				<td><?php echo $row['LicenseExamCategory'];?></td>
				<td><?php echo $row['ObtainedMarks'];?></td>
				<td><?php echo $row['Decision'];?></td>
		   </tr>
		<?php } }?>
		</table>
	    </center>
	</div>
	<br><br>
	<div class="footer">
		<br>
		<center>&copy Rwanda Driving Licence</center>
	</div>
</body>
</html>