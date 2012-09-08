<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
<?php include("config.inc.php"); echo $company; ?>&nbsp;SMS System</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/maxlength.js"></script>
<script type="text/javascript" src="js/doublesubmit.js"></script>
<script type="text/javascript" src="js/hidediv.js"></script>
</head>
<body>
<div align="center">
<?PHP
error_reporting(E_ALL);
include("config.inc.php");
$i=0;

mysql_connect($server,$username,$password);

mysql_select_db($database) or die(mysql_error());
?>
<?php
$getUser_sql = 'SELECT DISTINCT grp FROM numbers ';
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
      <form id="mainform" method="post" action="sms.php">
        <table border="0" cellspacing="0" cellpadding="3" width="500" align="center">
          <tr>
            <th align="left" class="body-text">Group</th>
            <td class="body-text"><select name="group" onChange="showDiv(this.value);">
                <option selected value="null">Select</option>
                <?php while ($row = mysql_fetch_array($getUser)) {?>
                <option value="<?php echo $row['grp']; ?>"> <?php echo $row['grp']; ?></option>
                <?php } ?>
                <option value="all">All Registered Numbers</option>
                <option value="manual">Manual Entry</option>
              </select>
              </p></td>
          <tr id="manual" class="hiddenDiv">
            <th align="left">Manual Number</th>
            <td><input type="text" name="number" title="Enter number with area code, but no +1."> 
            (+1 Not Necessary)</td>
          </tr>
          <tr>
            <th align=left valign="middle">Message</th>
            <td><textarea name="message" cols="44" rows="8" wrap="virtual" data-maxsize="640" data-output="charcount"></textarea>
              <br />
              <div id="charcount" style="width:300px;font-weight:bold;text-align:right"></div>
              <br /></td>
          </tr>
          <tr align=left>
            <td colspan="2" align="center"><input type="submit" value="Send Message" name="action" onClick="return checksubmit(this)"></td>
          </tr>
        </table>
        <br/>
      </form>
    </div>
  </div>
  <div id="navigation">
<ul>
      <li><a href="index.php"><SPAN style="BACKGROUND-COLOR: #ffff00">Compose Message</span></a></li>
      <li><a href="dbview.php">View Database</a></li>
      <li><a href="dbadd.php">Add Member</a></li>
      <li><a href="dbdrop.php">Drop Member</a></li>
    </ul>
  </div>
<div id="footer">
    <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="https://github.com/RossIV/GVSMS">1.5</a></p>
  </div>
</div>
</body>
</html>
