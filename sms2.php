<?php
include("config.inc.php");
$phonenumber = $_REQUEST['number'];
$message     = $_REQUEST['message'];
$wereon      = $_REQUEST['wereon'];
$total       = $_REQUEST['total'];
$name        = $_REQUEST['name'];
$done        = FALSE;
if ($wereon == $total - 1) {
    $done = TRUE;
    
}


$runcommand = '/usr/bin/gvoice -e ' . $gvoiceuser . ' -p ' . $gvoicepass . ' send_sms ' . $phonenumber . " " . $message . ' &';
exec($runcommand);
if ($done) {
    print "Message Sent To: $name ($phonenumber)\n";
    echo "<br>";
    echo "DONE";
} else {
    print "Message Sent To: $name ($phonenumber)\n";
    
    echo "<br>";
    
}

?>