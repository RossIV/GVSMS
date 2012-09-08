<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>
<?php include("config.inc.php"); echo $company; ?>
SMS System | Drop Member</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?PHP
         error_reporting(E_ALL);
         include("config.inc.php");
         $i=0;
         $Value2=$_POST['Value2'];
         $Value1=$_POST['Value1'];
         mysql_connect($server,$username,$Value1) or die ("Are you sure you typed the correct password?<br />Please Press Your Browser's Back Button to try again");
         
         mysql_select_db($database) or die(mysql_error());
         ?>
<?php
         $getUser_sql = "SELECT * FROM numbers WHERE grp='$Value2'";
         $getUser = mysql_query($getUser_sql);
         ?>
<div id="container">
  <div id="header">
    <h1><a href="index.php">
      <?php include("config.inc.php"); echo $company; ?>
      SMS Notification System</a></h1>
  </div>
  <div id="wrapper">
    <div id="content">
      <form id="dropform" method="post" action="dbdrop3.php">
        <table border="0" cellspacing="0" cellpadding="3" width="500" align="left">
          <input type="hidden" name="Value2" value="<?php echo $Value2 ?>" />
          <input type="hidden" name="Value1" value="<?php echo $Value1 ?>" />
          <tr>
            <td></p></td>
          </tr>
          <tr>
            <th width="210" align="right" class="body-text">Select person to be removed from <?php echo $Value2 ?> Group:</th>
            <td><select name="Value3">
                <option selected="selected" value="null">Select</option>
                <?php while ($row = mysql_fetch_array($getUser)) {?>
                <option value="<?php echo $row['name']; ?>"> <?php echo $row['name']; ?> </option>
                <?php 
                        } ?>
              </select></td>
          </tr>
          <tr align="right">
            <td colspan="2" align="center"><input type="submit" value="Proceed" name="action" /></td>
          </tr>
        </table>
      </form>
    </div>
    <div id="navigation">
      <ul>
        <li><a href="index.php">Compose Message</a></li>
        <li><a href="dbview.php">View Database</a></li>
        <li><a href="dbadd.php">Add Member</a></li>
        <li><a href="dbdrop.php"><span style="BACKGROUND-COLOR: #ffff00">Drop Member</span></a></li>
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