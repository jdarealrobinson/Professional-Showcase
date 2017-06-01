<?php


include 'connectdb_senior_cap.php';

$con = mysqli_connect($dbhostname, $dbusername, $dbpassword, $dbname) or die("<br>Cannot connect to DB:$dbname on $dbhostname\n");

$query = "select projectName, names, SME, gradYear, description, knowledgeRequired, email, phone, photo, sourceCode from $dbname.Projects ";
$result = mysqli_query($con, $query);


        if(mysqli_num_rows($result) > 0)
        {
                echo "<b>Product List</b>";
                echo "<table border = 1>\n";
                echo "<tr><td>
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
                        $project_Name = $row["project_Name"];
                        $group_Names = $row["group_Names"];
                        $sme = $row["sme"];
                        $grad_Year = $row["grad_Year"];
                        $description = $row["description"];
                        $knowledge = $row["knowledge"];
                        $email = $row["email"];
                        $phone = $row["phone"];
                        $pic = $row["pic"];
                        $link = $row["link"];
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
