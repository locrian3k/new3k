<html>
<head>
<title>Telnet Client</title>
<?php
include("common.php");
echo $css;
?>
<script language="JavaScript">

function startchat() {
	var servernumber = document.input.servernumber.value;
	var url = "chat.php?servernumber="+servernumber;
	if (document.input.newwin.value) {
	    window.open(url, 'chat', 'height=450,width=720,location=no,menubar=no,toolbar=no,scrollbars=auto');
	} else {
	    window.location.href=url;
	}
}

</script>
</head>
<body bgcolor="<?php echo "$page_bg"; ?>" text="<?php echo "$page_fg"; ?>">

<b>Telnet Client</b><br>

<form action="javascript: startchat();" name="input">
<table cellspacing="0" cellpadding="2">
	<tr>
	<td>
	    Server:
	</td>
	<td>
	    <select name="servernumber">
			<option value="0">Cubanbar (cubanbar.sci.kun.nl:1234)</option>
			<option value="1">Ncohafmuta (talker.com:2200)</option>
		</select>
	</td>
    </tr>
	
	<tr><td></td><td align="right">
	    <input type="submit" value="chat!">
	</td></tr>
    <tr>
	<td>&nbsp;</td>
	<td colspan="2">
	    <input type="hidden" name="newwin" value="true">
	</td>
    </tr>
</table>
</form>
</body>
</html>
