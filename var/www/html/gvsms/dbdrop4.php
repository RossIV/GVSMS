<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Refresh" content="5;url=dbdrop.php" />
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
$dbpassword=$_POST['Value1'];
$name=$_POST['Value3'];
$group=$_POST['Value2'];
$number=$_POST['Value4'];
$con = mysql_connect("localhost","$username","$dbpassword");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("$database",$con);

$sql="DELETE FROM numbers WHERE name='$name' AND number='$number' AND grp='$group'";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record deleted<br>\n";
echo "The Details of your modifications are:<br>\n";
echo "DELETED $name with a phone number of $number from $group<br>\n";

mysql_close($con)
?>
    </div>
    <div id="navigation">
      <ul>
        <li><a href="index.php">Compose Message</a></li>
        <li><a href="dbview.php">View Database</a></li>
        <li><a href="dbadd.php">Add Member</a></li>
        <li><a href="dbdrop.php"><span style="BACKGROUND-COLOR: #ffff00">Drop Member</span></a></li>
        <li><a href="ty/">Switch to TeleYapper Database</a></li>
      </ul>
    </div>
    <div id="extra">
      <p><strong><font color="red">WARNING!</font></strong> All changes made using this tool are <i>final </i>and can <i>not</i> be undone.</p>
    </div>
    <div id="footer">
      <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="https://github.com/RossIV/GVSMS">1.5</a></p>
    </div>
  </div>
</div>
</body>
</html>