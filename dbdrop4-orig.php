<html>
<head>
<META HTTP-EQUIV="refresh" CONTENT="5;url=dbdrop.php">
</head>
<body>

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

</body>
</html>
