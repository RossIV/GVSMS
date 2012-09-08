<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Refresh" content="5;url=dbadd.php" />
<title>
<?php include("config.inc.php"); echo $company; ?>
SMS System | Drop Member</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<div id="container">
  <div id="header">
    <h1><a href="index.php">
      <?php include("config.inc.php"); echo $company; ?>
      SMS Notification System</a></h1>
  </div>
  <div id="wrapper">
  <div id="content">
  <?php
include("config.inc.php");
$dbpass=$_POST['dbpass'];
$name=$_POST['name'];
$group=$_POST['group'];
$number=$_POST['number'];
$groupadd=$_POST['groupadd'];

$con = mysql_connect("localhost","$username","$dbpass");
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
    <li><a href="ty/">Switch to TeleYapper Database</a></li>
  </ul>
</div>
<div id="footer">
  <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="https://github.com/RossIV/GVSMS">1.5</a></p>
</div>
</div>
</div>
</body>
</html>