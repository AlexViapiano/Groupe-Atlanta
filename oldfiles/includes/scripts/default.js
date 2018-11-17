function SwapImage(name, newimage)
{
	var t = name;
	document[t].src = newimage;
}

function toggleDisplay(divId) {
  var div = document.getElementById(divId);
  div.style.display = (div.style.display=="block" ? "none" : "block");
}
