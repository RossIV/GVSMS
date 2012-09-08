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

mysql_select_db($tydatabase) or die(mysql_error());
?>
<?php
$getUser_sql = 'SELECT DISTINCT grp FROM callees';
$getUser = mysql_query($getUser_sql);
?>
<div id="container">
  <div id="header">
    <h1><a href="index.php">
      <?php include("config.inc.php"); echo $company; ?>
      SMS Notification System (Teleyapper Mode)</a></h1>
  </div>
  <div id="wrapper">
    <div id="content">
      <form id="mainform" method="post" action="sms.php">
        <table border="0" cellspacing="0" cellpadding="3" width="500" align="center">
          <tr>
            <th align="left" class="body-text">Group</th>
            <td class="body-text"><select name="group" onChange="showDiv(this.value);">
                <option selected value="null">Select</option>
				<option value="0">Group 0</option>
				<option value="1">Group 1</option>
				<option value="2">Group 2</option>
				<option value="3">Group 3</option>
				<option value="4">Group 4</option>
				<option value="5">Group 5</option>
				<option value="6">Group 6</option>
				<option value="7">Group 7</option>
				<option value="8">Group 8</option>
				<option value="9">Group 9</option>
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
	  <li><a href="/gvsms/index.php">Switch to Main Database</a></li>
    </ul>
  </div>
<div id="footer">
    <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="https://github.com/RossIV/GVSMS">1.5</a></p>
  </div>
</div>
</body>
</html>
