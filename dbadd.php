<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	  <title><?php include("config.inc.php"); echo $company; ?> SMS System | Add Member</title>
	  <link rel="stylesheet" type="text/css" href="styles.css" />
	  <script type="text/javascript" src="hidediv.js"></script>
   </head>
   <body>
<?php
error_reporting(E_ALL);
include("config.inc.php");
$i = 0;
mysql_connect($server, $username, $password);
mysql_select_db($database) or die(mysql_error());
?>
<?php
$getUser_sql = 'SELECT DISTINCT grp FROM numbers ';
$getUser	 = mysql_query($getUser_sql);
?>
	  <div id="container">
		 <div id="header">
			<h1><a href="index.php"><?php include("config.inc.php"); echo $company; ?> SMS Notification System</a></h1>
		 </div>
		 <div id="wrapper">
			<div id="content">
			   <form id="addform" method="post" action="dbadd2.php">
				  <table border="0" cellspacing="0" cellpadding="3" width="500" align="left">
					 <tr>
						<th width="244" align="right" class="body-text">Group to whom member should be added:</th>
						<td width="244" class="body-text">
						   <p>
							  <select name="Value2" onChange="showDiv(this.value);">
								 <option selected value="">Select</option>
								 <option value="manual">Create New Group</option>
<?php
while ($row = mysql_fetch_array($getUser)) {
?>
								 <option value="<?php echo $row['grp']; ?>"><?php echo $row['grp'];?></option>
<?php
}
?>
							  </select>
						   </p>
						</td>
					 </tr>
					 <tr id="manual" class="hiddenDiv">
						<th align="right" class="body-text">Name of group to create:</th>
						<td><input type="text" name="groupadd" /></td>
					 </tr>
					 <tr>
						<th align="right" class="body-text">Name of person to add:</th>
						<td><input type="text" name="Value3" /></td>
					 </tr>
					 <tr>
						<th align="right" class="body-text">10-digit Phone Number to add:</th>
						<td><input name="Value4" type="text" maxlength="10" /></td>
					 </tr>
					 <tr>
						<th align="right" class="body-text">What is the database password?</th>
						<td>
						   <input type="password" name="Value1" />
						</td>
					 </tr>
					 <tr align="right">
						<td colspan="2" align="center"><input type="submit" value="Add Number" name="action" /></td>
					 </tr>
				  </table>
				 <br>
			   </form>
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
			       <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Michael Heckman and Ross Lindsay. System/Module version<a href="http://www.pbxinaflash.com/community/index.php?threads/google-voice-sms-script.10014/">1.5</a></p>			</div>
		 </div>
	  </div>
   </body>
</html>