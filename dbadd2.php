<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<META HTTP-EQUIV="refresh" CONTENT="5;url=dbadd.php">
      <title><?php include("config.inc.php"); echo $company; ?> SMS System | Drop Member</title>
      <link rel="stylesheet" type="text/css" href="styles.css" />
   </head>
   <body>
      <div id="container" />
      <div id="header">
         <h1><a href="index.php"><?php include("config.inc.php"); echo $company; ?> SMS Notification System</a></h1>
      </div>
      <div id="wrapper" />
      <div id="content" />


<?php
include("config.inc.php");
$dbpassword=$_POST['Value1'];
$name=$_POST['Value3'];
$group=$_POST['Value2'];
$number=$_POST['Value4'];
$groupadd=$_POST['groupadd'];


$con = mysql_connect("localhost","$username","$dbpassword");
if (!$con)
  {
  die();
  }

mysql_select_db("$database",$con);

if ($group == "manual"){
     
$sql="INSERT INTO numbers (name,number,grp)
VALUES
('$name','$number','$groupadd')";

if (!mysql_query($sql,$con))
  {
  die();
  }
echo "1 record added<br>\n";
echo "The Following Modifications were made:<BR>\n";
echo "ADDED NEW CALL GROUP $groupadd<br>\n";
echo "ADDED $name with phonenumber $number to $groupadd<b>\n";
}

else {

$sql="INSERT INTO numbers (name,number,grp)
VALUES
('$name','$number','$group')";

if (!mysql_query($sql,$con))
  {
  die();
  }
echo "1 record added<br>\n";
echo "The Following Modifications have been made:<br>\n";
echo "ADDED $name with the phone number $number to $group!<br>\n";
}


mysql_close($con)
?>
  </div>
<div id="navigation">
			   <ul>
				  <li><a href="index.php">Compose Message</a></li>
				  <li><a href="dbview.php">View Database</a></li>
				  <li><a href="dbadd.php"><span style="background-color: #ffff00">Add Member</span></a></li>
				  <li><a href="dbdrop.php">Drop Member</a></li>
			   </ul>
			</div>
			<div id="extra">
			</div>
<div id="footer">
        <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Michael Heckman and Ross Lindsay. System/Module version<a href="http://www.pbxinaflash.com/community/index.php?threads/google-voice-sms-script.10014/">1.5</a></p>
  </div>


</div></div></body></html>