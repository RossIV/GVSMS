//Script adapted from Javascriptkit.com
var formerrormsg="Please wait for the first message(s) to send before sending more."

function checksubmit(submitbtn){
submitbtn.form.submit()
checksubmit=blocksubmit
return false
}

function blocksubmit(){
if (typeof formerrormsg!="undefined")
alert(formerrormsg)
return false
}
