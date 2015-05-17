<?php header("Refresh: 0.6;url=/index/"); ?>
<html lang="en"><head>
<center><img src="http://i.imgur.com/kpVZbah.png"></center></img>
<br><br><br><center><img src="http://maps.nrel.gov/sites/all/modules/custom_modules/hydra/assets/images/loading_bar.gif
"></center></img>
<script language="JavaScript">
var delay=20;
var currentChar=1;
var destination="[none]";
function type()
{
//if (document.all)
{
var dest=document.getElementById(destination);
if (dest)// && dest.innerHTML)
{
dest.innerHTML=text.substr(0, currentChar)+"<blink>_</blink>";
currentChar++;
if (currentChar>text.length)
{
currentChar=1;
setTimeout("type()", 5000);
}
else
{
setTimeout("type()", delay);
}
}
}
}
function startTyping(textParam, delayParam, destinationParam)
{
text=textParam;
delay=delayParam;
currentChar=1;
destination=destinationParam;
type();
}
</script>     <title>Loading website</title>
	</script>