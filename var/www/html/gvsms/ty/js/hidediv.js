var lastDiv = "";
function showDiv(divName) {

	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}

	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}