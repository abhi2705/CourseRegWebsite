<?PHP
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>A</title>
      <link rel="STYLESHEET" type="text/css" href="style/fg_membersite.css">
</head>
<body>

<?php



//Connect to mysql server
	$link = mysql_connect('localhost','collegen_mech','[O1pW{p42xHD');
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db('collegen_nitkmech');
	if(!$db) {
		die("Unable to select database");
	}
	
	
	$email = $fgmembersite->UserEmail(); ?>


<div id='fg_membersite_content'>
<p><center>
<h2> National Institute of Technology Karnataka, Surathkal </h2>
<h3> Course Registration Form: </h3>



<?php
$query = "SELECT * FROM mechdept WHERE email='$email'"; 
$result = mysql_query($query);




while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results

echo "<table border='2' cellpadding='4' cellspacing='2'>";
echo "<tr><td>Name</td><td>".$row['name']."</td></tr><tr><td>Roll No.</td><td>".$row['username']."</td></tr><tr><td>Phone No.</td><td>".$row['phone_number']."</td></tr><tr><td>Fee Receipt No</td><td>"
.$row['feereceipt']."</td></tr>";

echo "</table>";

echo "<table border='2' cellpadding='4' cellspacing='2'>"; // start a table tag in the HTML
echo "<br><tr><td><b>Course(Core/Elective) </b></td><td><b>Course Code | Course Title</b></td><td><b>Instructor's Sign &nbsp; &nbsp; &nbsp;</b></td></td></tr><tr><td>Elective1 </td><td>" . $row['elective1'] . "<br></td></tr><tr><td>Elective2 </td><td>" 
. $row['elective2'] ."<br></td></tr><tr><td>Elective3 </td><td>" . $row['elective3'] ."<br></td></tr><tr><td>Core1 </td><td>" . $row['core1'] . "<br></td>
</tr><tr><td>Core2 </td><td>" . $row['core2'] ."<br></td></tr><tr><td>Core3 </td><td>" . $row['core3'] ."<br></td>
</tr><tr><td>Core4 </td><td>" . $row['core4'] ."<br></td></tr>";  
}
echo "</table>"; //Close the table in HTML




mysql_close();

?>


</p>




<table border='1' cellpadding='25' cellspacing='4'>

<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td></td><td></td></tr>
<tr>
<td>Sign. of Student</td>
<td>Sign. of Faculty Advisor </td>
<td>Sign of HOD with Seal </td>
</tr>
</table>

<p>
<a href='login-home.php'>Home</a>
</p>
</div>
</body>
</html>
