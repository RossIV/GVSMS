<html>
<head>
<script type="text/javascript" src="prototype.js"></script>
<script type="text/javascript">
var updateresponse = "";
</script>
</head>
<body>
<?PHP
error_reporting(E_ALL);
include("config.inc.php");
$group=$_POST['group'];
$message=$_POST['MESSAGE'];
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

print "The following message is being sent to everyone in $group!<br>\"$message\"\n";

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

print "The following message is being sent to everyone in $group!<br>\"$message\"\n";

mysql_close();

}


?>

<div id="updateresponsediv"></div>
</body>
</html>
