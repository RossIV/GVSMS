<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php include("config.inc.php"); echo $company; ?> SMS System | Drop Member</title>
<link rel="stylesheet" type="text/css" href="styles.css" />

</head>
<body>
<?PHP
error_reporting(E_ALL);
include("config.inc.php");
$i=0;

mysql_connect($server,$username,$password);

mysql_select_db($database) or die(mysql_error());
?>
<div id="container">
  <div id="header">
    <h1><a href="index.php">
      <?php include("config.inc.php"); echo $company; ?>
      SMS Notification System</a></h1>
  </div>
  <div id="wrapper">
    <div id="content">
      <?php 
mysql_connect($server,$username,$password);

mysql_select_db($database) or die(mysql_error());
?>
      <?php
$getUser_sql = 'SELECT DISTINCT grp FROM numbers';
$getUser = mysql_query($getUser_sql);
?>
      <form id="dropform" method="post" action="dbdrop2.php">
        <table border="0" cellspacing="0" cellpadding="3" width="500" align="left">
          <tr>
            <th width="210" align="right" class="body-text">Group of member to be dropped:</th>
            <td width="378" class="body-text"><p>
                <select name="Value2">
                  <option selected="selected" value="null">Select</option>
                  <?php while ($row = mysql_fetch_array($getUser)) {?>
                  <option value="<?php echo $row['grp']; ?>"> <?php echo $row['grp']; ?></option>
                  <?php } ?>
                </select>
              </p></td>
          </tr>
          <tr>
            <th align="right" class="body-text">Database Password:</th>
            <td><input type="password" name="Value1" />
              <span class="body-text"></span></td>
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
    <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="http://www.pbxinaflash.com/forum/showthread.php?t=10014">1.5</a></p>
    </div>
  </div>
</div>
</body>
</html>