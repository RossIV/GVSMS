<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>GVoice SMS System | Drop Member</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?PHP
error_reporting(E_ALL);
include("config.inc.php");
$i=0;
$Value2=$_POST['Value2'];
$Value1=$_POST['Value1'];
$Value3=$_POST['Value3'];
mysql_connect($server,$username,$Value1) or die ("Are you sure you typed the correct password?<br />Please Press Your Browser's Back Button to try again");

mysql_select_db($database) or die(mysql_error());
?>
<?php
$getUser_sql = "SELECT * FROM numbers WHERE name='$Value3'";
$getUser = mysql_query($getUser_sql);
?>
<h2 align="center" class="head-text">Google Voice SMS Messaging</h2>
<form id="dropform" method="post" action="dropsubmit.php">
          <table border="2" cellspacing="0" cellpadding="3" width="600" align="center">
            <tr>
              <th align="right" class="body-text">Searching <?php echo $Value2 ?> </th>
<input type="hidden" name="Value2" value="<?php echo $Value2 ?>">
 <input type="hidden" name="Value1" value="<?php echo $Value1 ?>">
             
</p>
 <tr>
            <th align=right class="body-text">Name of person to remove:<br> <?php echo $Value3 ?></th>
            <td> <input type="hidden" name="Value3" value="<?php echo $Value3 ?>">
</td>
<?php while ($row = mysql_fetch_array($getUser)) {
$Value4=$row['number'];}?>

          </tr>

          <tr>
            <th align=right class="body-text">10-digit phone number to remove:<br><?php echo $Value4 ?></th>
 <input type="hidden" name="Value4" value="<?php echo $Value4 ?>">
          </tr>
          <tr align=right>
            <td colspan="2" align="center"><input type="submit" value="Drop Member" name="action"></td>
          </tr>
        </table>
</form>


<table border="0" cellspacing="0" cellpadding="1" width="400" align="center">
    </table>
     <div id="footer">
    <p>The Google Voice SMS Scipt was originally written by<a href="mailto:ross@rosslindsay.com">Ross Lindsay,</a>and is now maintained by the Project Lead Developers,<a href="http://twilightzoneproductions.com/">Michael Heckman</a>and Ross Lindsay. System/Module version<a href="http://www.pbxinaflash.com/forum/showthread.php?t=10014">1.5</a></p>
  </div>
  </div>
</body>
</html>
