<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("location:Login.php");
}
$link=mysqli_connect("localhost","root","","rdl");
$id=$_GET['del'];
$del="DELETE FROM Candidate WHERE CandidateNationalId='$id'";
$res=mysqli_query($link,$del);
if ($res) {
	echo "<script>alter('Delete Successfully'); 
	        Window.location='Vcandidate.php';</script>";
	    }
else {
	echo "<script>alter('Delete Fail')"; 
}
?>