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
			<h2>View Candidate</h2>
			<tr>
				<th>CandidateNationalId</th><th>FirstName</th><th>LastName</th><th>Gender</th><th>DOB</th><th>Exam Date</th><th>Phone Number</th><th colspan="2">Operation</th>
			</tr>
			<?php
			$link=mysqli_connect("localhost","root","","rdl");
			$sel="SELECT * FROM Candidate";
			$res=mysqli_query($link,$sel);
			while ($row=mysqli_fetch_array($res)) {
			?>
			<tr>
				<td><?php echo $row['CandidateNationalId'];?></td>
				<td><?php echo $row['FirstName'];?></td>
				<td><?php echo $row['LastName'];?></td>
				<td><?php echo $row['Gender'];?></td>
				<td><?php echo $row['DOB'];?></td>
				<td><?php echo $row['ExamDate'];?></td>
				<td><?php echo $row['PhoneNumber'];?></td>
				<td><button><a href="Update.php?upd=<?php echo $row['CandidateNationalId']?>"onclick ="return confirm('Are Sure You Want to Update?')">Update</a></button></td>
				<td><button><a href="Delete.php?del=<?php echo $row['CandidateNationalId']?>"onclick ="return confirm('Are Sure You Want to Delete?')">Delete</a></button></td>
			</tr>
		<?php } ?>
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