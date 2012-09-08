<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
<?php include("config.inc.php"); echo $company; ?>
SMS System</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<meta http-equiv="refresh" content="30;url=index.php" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/maxlength.js"></script>
<script type="text/javascript" src="js/doublesubmit.js"></script>
<script type="text/javascript" src="js/hidediv.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript">
var updateresponse = "";
</script>
</head>
<body>
<div align="center">
<div id="container">
  <div id="header">
    <h1><a href="index.php">
      <?php include("config.inc.php"); echo $company; ?> SMS Notification System</a></h1>
  </div>
  <div id="wrapper">
    <div id="content">
      <?PHP
error_reporting(E_ALL);
include("config.inc.php");
$group=$_POST['group'];
$message=$_POST['message'];
$number=$_POST['number'];
$name=$_POST['name'];
$i=0;

if ($group == "all"){
mysql_connect($server,$username,$password);

mysql_select_db($database) or die(mysql_error());


$SQL = "SELECT * FROM numbers";
$result = mysql_query($SQL);
$num = mysql_num_rows($result);
?>
      <script type="text/javascript">

        var num = '<?php echo $num; ?>';
        num = num - 1;

</script>
      <?php
while ($i < $num) {
        $phonenumber=mysql_result($result,$i,"number");

        $name=mysql_result($result,$i,"name");

        ?>
      <script type="text/javascript">
        new Ajax.Request('sms2.php',
          {
            method:'get',
                parameters: {number: '<?php echo $phonenumber; ?>', message: '<?php echo $message; ?>', name: '<?php echo $name; ?>'},
                onSuccess: function(transport){
                    var response = transport.responseText || "no response text";
                    updateresponse += response + "\n\n";
                    //alert("Success! \n\n" + response);
                    var ijava = '<?php echo $i; ?>';
                    if (num == ijava)
                        {
			     updateresponse += "All messages have been successfully sent.<br/>";
                       updateresponse += "<input type=button value='Back' onClick='history.go(-1)'>";
                        }
               	    $('updateresponsediv').update(updateresponse);
		},
            onFailure: function(){ alert('Something went wrong...') }
          });
        </script>
      <?php
        $i++;}

print "The following message is being sent to $group<br>\"$message\"\n";

mysql_close();

}


if ($group == "manual"){
     $runcommand = '/usr/bin/gvoice -e ' . $gvoiceuser . ' -p ' . $gvoicepass . ' send_sms ' . $number . " " . $message . ' &';
   print  "Sending message to: $number<br>\n";
     exec($runcommand);
 print "Successfully sent to: $number<br>\n";
   }

else {

mysql_connect($server,$username,$password);

mysql_select_db($database) or die(mysql_error());


$SQL = "SELECT * FROM numbers WHERE grp = '$group'";
$result = mysql_query($SQL);
$num = mysql_num_rows($result);
?>
      <script type="text/javascript">

        var num = '<?php echo $num; ?>';
        num = num - 1;

</script>
      <?php
while ($i < $num) {
        $phonenumber=mysql_result($result,$i,"number");
        $name=mysql_result($result,$i,"name");

        ?>
      <script type="text/javascript">
        new Ajax.Request('sms2.php',
          {
            method:'get',
                parameters: {number: '<?php echo $phonenumber; ?>', MESSAGE: '<?php echo $message; ?>', name: '<?php echo $name; ?>'},
                onSuccess: function(transport){
                    var response = transport.responseText || "no response text";
                    updateresponse += response + "\n\n";
                    //alert("Success! \n\n" + response);
                    var ijava = '<?php echo $i; ?>';
                    if (num == ijava)
                        {
			     updateresponse += "All messages have been successfully sent.<br/>";
                       updateresponse += "<input type=button value='Back' onClick='history.go(-1)'>";
                        }
               	    $('updateresponsediv').update(updateresponse);
		},
            onFailure: function(){ alert('Something went wrong...') }
          });
        </script>
      <?php
        $i++;}

print "The following message is being sent to $group<br>\"$message\"\n";

mysql_close();

}


?>
      <div id="updateresponsediv"></div>
    </div>
  </div>
  <div id="navigation">
    <p><strong></strong></p>
    <ul>
      <li><a href="index.php"><SPAN style="BACKGROUND-COLOR: #ffff00">Compose Message</span></a></li>
      <li><a href="dbview.php">View Database</a></li>
      <li><a href="dbadd.php">Add Member</a></li>
      <li><a href="dbdrop.php">Drop Member</a></li>
    </ul>
  </div>
  <div id="extra"> </div>
  <div id="footer">
    <p>The Google Voice SMS Notification System was originally written by Ross Lindsay, and is now maintained by the Project Lead Developers, Daniel Dugger and Ross Lindsay. Module version<a href="https://github.com/RossIV/GVSMS">1.5</a></p>
  </div>
</div>
</body>
</html>
