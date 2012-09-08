<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
<?php include("config.inc.php"); echo $company; ?>
SMS System | Search Database</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
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
      <!--BEGIN CODE-->
      <form name="search" method="post" action="dbsearch.php">
        <table border="0" cellspacing="0" cellpadding="3" width="500" align="center">
          <tr>
            <td colspan="2" class="body-text"><b>Are you looking for someone in particular?</b></td>
          </tr>
          <tr>
            <th align="left" class="body-text">Name</th>
            <td class="body-text"><input type="text" name="find" />
              <input type="hidden" name="searching" value="yes" />
              <input type="submit" name="search" value="Search" /></td>
        </table>
      </form>
<?php

$find=$_POST['find'];

include("config.inc.php");
mysql_connect("localhost",$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM numbers WHERE name like '%$find%' ORDER BY name, grp";

$result=mysql_query($query);

$num=mysql_numrows($result);

mysql_close();
?>
      <!--Results Table-->
      <table border="1" align="center" cellspacing="2" cellpadding="2">
        <tr>
          <th><font face="Arial, Helvetica, sans-serif" >Name</font></th>
          <th><font face="Arial, Helvetica, sans-serif" >Number</font></th>
          <th><font face="Arial, Helvetica, sans-serif" >Group</font></th>
        </tr>
        <?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"name");
$f2=mysql_result($result,$i,"number");
$f3=mysql_result($result,$i,"grp");

?>
        <tr>
          <td><font face="Arial, Helvetica, sans-serif" ><?php echo $f1; ?></font></td>
          <td><font face="Arial, Helvetica, sans-serif" ><?php echo $f2; ?></font></td>
          <td><font face="Arial, Helvetica, sans-serif" ><?php echo $f3; ?></font></td>
        </tr>
        <?php
$i++;
}
?>
      </table>
      <br />
      <br />
      <!--END CODE--> 
    </div>
  </div>
  <div id="navigation">
<ul>
      <li><a href="index.php">Compose Message</a></li>
      <li><a href="dbview.php"><SPAN style="BACKGROUND-COLOR: #ffff00">View Database</span></a></li>
      <li><a href="dbadd.php">Add Member</a></li>
      <li><a href="dbdrop.php">Drop Member</a></li>
      <li><a href="ty/">Switch to TeleYapper Database</a></li>
    </ul>
  </div>
<div id="footer">
    <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="https://github.com/RossIV/GVSMS">1.5</a></p>
  </div>
</div>
</body>
</html>
