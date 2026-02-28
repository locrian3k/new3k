<?php
    if (preg_match("/Mozilla\/\d.+Compatible; MSIE/i", $HTTP_SERVER_VARS['HTTP_USER_AGENT']) && !preg_match("/Opera/i", $HTTP_SERVER_VARS['HTTP_USER_AGENT'])) {
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
    } else {
        header('Expires: 0');
        header('Pragma: no-cache');
    }
include("common.php");
echo <<<EOF
<html>
<head>
<title>Telnet Client</title>
$css
<script language="JavaScript"><!--;

EOF;
$id = time();
$servernumber = $HTTP_GET_VARS['servernumber'];

echo <<<EOF
id = $id;

EOF;
?>

commandHist = new Array();
commandNr = 0;

function send() {
    var cmd = document.input.command.value;
    var a = commandHist.unshift(cmd);
    if (a > 20) {
	commandHist.pop();
    }
    commandNr = 0;
    cmd = escape(cmd);
    self.passcmnd.location = "pcmnd.php?id="+id+"&cmnd="+cmd;
    document.input.command.value=""; // empty
//    alert("hey");
}

interID = -1;

function scrollen() {
    self.out.scrollBy(0,25)
}
function scrl(what) {
    if (what == 1) {
	if (interID == -1) {
	    clearInterval(interID);
	    interID = -1;
	    interID = setInterval("scrollen()", 250); // scroll down every 250 ms;
	}
    } else {
	clearInterval(interID);
	interID = -1;
    }
}

function displayCommand(relElem) {
    commandNr += relElem;
    if (commandNr < 0) { commandNr = commandHist.length-1; }
    if (commandNr >= commandHist.length) { commandNr = 0; }
    document.input.command.value = commandHist[commandNr];
}
//--></script>

</head>
<body bgcolor="<?php echo "$page_bg"; ?>" text="<?php echo "$page_fg"; ?>">

<table cellspacing="1" cellpadding="0" bgcolor="<?php echo $table_border; ?>">
    <tr>
	<td bgcolor="<?php echo $chan_bg; ?>">
	    <iframe frameborder="0" height="350" width="700" name="out" src="main.php?<?php echo "id=$id&servernumber=$servernumber&"; ?>" valign="bottom" marginwidth="0" marginheight="0">Sorry your browser doesn't support this :S</iframe>
	</td>
	<td bgcolor="<?php echo $chan_bg; ?>" width="0" valign="top" align="center">
	</td>
    </tr>
    <tr>
	<td align="center" bgcolor="<?php echo $input_bg; ?>">
	    <form name="input" onSubmit="send();return false;" style="margin:0pt; padding:0pt;">
	    <input type="text" name="command" size="68"><input type="button" value="Send" onClick="send()">
	    <iframe frameborder="0" height="5" width="5" src="pcmnd.php" name="passcmnd" marginwidth="0" marginheight="0"></iframe>
	    <input type="button" value="<" onClick="displayCommand(1)" style="width: 10pt; height: 16pt;">
	    <input type="button" value=">" onClick="displayCommand(-1)" style="width: 10pt; height: 16pt;">
	    </form>
	</td>
	<td bgcolor="<?php echo $input_bg; ?>" rowspan="2" align="right">
	    <table width="100%" cellspacing="0" cellpadding="0">
		<tr><td valign="top">
			<br>
		</td><td align="right" valign="top">
		    <br>
		</td></tr>
	    </table>
	</td>
    </tr>
    <tr>
	<td align="center" bgcolor="<?php echo $input_bg; ?>" valign="middle">
	    <table width="100%" cellspacing="0" cellpadding="0"><tr><td>
	    Auto Scrolling:
	    <input type="button" value="Stop" onClick="scrl(0)">
	    <input type="button" value="Start" onClick="scrl(1)">
	    <!-- color chooser table -->
	    </td><td align="right">
	    </td></tr></table>
	    <!-- end -->
	</td>
    </tr>
</table>

</body>