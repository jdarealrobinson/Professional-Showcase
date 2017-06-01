<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <title>Website</title>
     <link href="styles.css" rel="stylesheet">
</head>
<body>
 <div class="navheader">
		
 		
  		<a href="Home.html"><img src="p.gif" style="width:260px; height:75px ;"/></a>

  			 <nav class="tabs" align="center">

  			
    			<a href="Home.html">Home</a>
   			 	<a href="projects.php">Projects</a>
    			<a href="CapstoneDays.html">Capstone Days</a>
    			<a href="About.html">About</a>
    		

		</nav>

		
 		
 	</div>
 	
 	<div class="content">
        <img src="CodingPic.jpeg" alt="divPic" align="center" width="1000" height="300"/>
        <div class="projectNav">
        <nav>
          <a href="projects.php">Project List</a>
          <a href="submissionForm.html">Project Submission Form</a>
        </nav>
  </div>
  
  <div><?php


include 'connectdb_senior_cap.php';

$con = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname) or die("<br>Cannot connect to DB:$dbname on $dbhostname\n");

$query = "select projectName, names, SME, gradYear, description, knowledgeRequired, email, phone, photo, sourceCode from $dbname.Projects ";
$result = mysqli_query($con, $query);


        if(mysqli_num_rows($result) > 0)
        {
                echo "<b>Project List</b>
                      <table border = 1>\n";
                echo  "<tr><td>
                      <b>Project Name<td></b>
                      <b>Group Members<td></b>
                      <b>SME<td></b>
                      <b>Graduation Year<td></b>
                      <b>Description<td></b>
                      <b>Knowledge Required</b><td>
                      <b>Email</b><td>
                      <b>Phone</b><td>
                      <b>Picture</b><td>
                      <b>Source Code</tr> \n";
                while($row = mysqli_fetch_array($result))
               {
                        $project_Name = $row["projectName"];
                        $group_Names = $row["names"];
                        $sme = $row["SME"];
                        $grad_Year = $row["gradYear"];
                        $description = $row["description"];
                        $knowledge = $row["knowledgeRequired"];
                        $email = $row["email"];
                        $phone = $row["phone"];
                        $pic = $row["photo"];
                        $link = $row["sourceCode"];
                        echo "<tr><td>$project_Name<td>$group_Names<td>$sme<td>$grad_Year<td>$description<td>$knowledge<td>$email<td>$phone<td>$pic<td>$link";
                }
        echo "</table>\n";
        }

else
{
        echo "<br>No Results!\n";
}

mysqli_free_result($result);
mysqli_close($con);
?>
</div>
	
</body>
</html>
