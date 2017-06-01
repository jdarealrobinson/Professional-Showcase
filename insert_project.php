<?php

define("IN_CODE", 1);
include 'connectdb_senior_cap.php';

$con=mysqli_connect($dbhostname,$dbusername,$dbpassword,$dbname)
        or die("<br>Cannot connect to DB:$dbname on $dbhostname\n");


$project_Name = mysqli_real_escape_string($con, $_POST['project_Name']);
$group_Names = mysqli_real_escape_string($con, $_POST['group_Names']);
$sme = mysqli_real_escape_string($con, $_POST['sme']);
$grad_Year = mysqli_real_escape_string($con, $_POST['grad_Year']);
$description = mysqli_real_escape_string($con, $_POST['description']);
$knowledge = mysqli_real_escape_string($con, $_POST['knowledge']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$phone = mysqli_real_escape_string($con, $_POST['phone']);
$pic = mysqli_real_escape_string($con, $_POST['pic']);
$link = mysqli_real_escape_string($con, $_POST['link']);

$query = "select projectName from 2017SCap1.Projects where projectName ='$project_Name'";
$result = mysqli_query($con, $query);
$row = mysqli_num_rows($result);
if($row > 0)
{
	echo "<br>Project name is already taken!";
	echo "<br>Please enter a different project name.";
	echo "<br><br>";
	echo "<a href='add_project.php'>Click here to return to previous page.</a><br>";
}
else
{
	$usertable = "$dbname.Projects";
	$query2 = "insert into " . $usertable." (projectName, names, SME, gradYear, description, knowledgeRequired, email, phone, photo, sourceCode) values ('$project_Name', '$group_Names', '$sme', '$grad_Year', '$description', '$knowledge', '$email', '$phone', '$pic', '$link')";
	$result = mysqli_query($con, $query2);

	echo "<br>Successful query: $query2";
	echo "<br><br>";
	echo "<a href='projects.php'>Click here to view projects.</a><br><br>";
}

mysqli_free_result($result2);
mysqli_close($con);
?>
