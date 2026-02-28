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

$id = $HTTP_GET_VARS['id'];
$server_number = $HTTP_GET_VARS['servernumber'];

echo <<<EOF
<html>
<head>
<title>Telnet Client Output</title>
$css
</head>
<body bgcolor="$chan_bg" text="$chan_fg"><pre>

EOF;

@set_time_limit(3600); // ten minutes execution time, when user says or does something, this is reset with 10 min.
/* ** ** set_time_limit() doesn't seem to have any effect whatsoever... ** ** */

register_shutdown_function("destruct_session");

echo <<<EOF
<script language="JavaScript"><!--; parent.scrl(1); //--></script>
<br>Connecting to $serv_addr[$server_number]...

EOF;

$socket = fsockopen($serv_addr[$server_number], $serv_port[$server_number], $errno, $errstr);

if ($socket < 0) { echo "failed... $errno: $errstr"; return; }
else { echo "Connected."; }

socket_set_blocking($socket, false);

echo "<br>";
echo "<script language='JavaScript'>\n<!--;\n parent.scrl(1);\n //-->\n</script>";
flush(); //output this;

$out = "";
$signontime = time();

function output(&$argument) {

	$argument = ereg_replace("\x1b\[[0-9]?[0-9]?;?[0-9]?[0-9]?[A-Za-z]", "", $argument); // get the asci color codes out: esc[#;#m etc., not a clean pattern...
	
	$translations = array( //additional translations
		chr(27) =>"",
		"ящ" => "",
		);

	$argument = strtr($argument, $translations);

	$argument = wordwrap($argument, 80, "\n"); //word wrap at 80

	echo $argument, "\n";
}

function destruct_session() {
    global $socket, $signontime, $signofmsg;

    mysql_query("DELETE FROM phpchat WHERE id = '$id'");

    $signofftime = time();
    $onlinetime = $signofftime-$signontime;
    $d1 = (floor($onlinetime/3600) < 10) ? "0".floor($onlinetime/3600) : floor($onlinetime/3600);
    $rest = $onlinetime%3600;
    $d1 .= (floor($rest/60) < 10) ? ":0".floor($rest/60) : ":".floor($rest/60);;
    $rest = $rest%60;
    $d1 .= ($rest < 10) ? ":0".$rest : ":".$rest;

	if (!$signofmsg) {
		echo "Signed on at: " . date("H:i:s d-m-Y", $signontime) . ", Signed off at: " . date("H:i:s d-m-Y", $signofftime) . "<br>";
    	echo "Online time: $d1 ($onlinetime seconds)";
		$signofmsg = 1; // to prevent showing this message twice
	}
}

$link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
mysql_select_db($mysql_db);

while($socket) {
    $out = fgets($socket, 4096);
    $out = rtrim($out);
    if (strlen($out) > 1) {
		output($out);
	}
    /**********************************************************************************************/
    $result = mysql_query("SELECT commando,tijd FROM phpchat WHERE id = $id ORDER BY tijd");
    echo mysql_error();
    $a = 0;
    while ($rij = @mysql_fetch_assoc($result)) {
	$a++;
	mysql_query("DELETE FROM phpchat WHERE id = $id AND tijd = {$rij['tijd']} LIMIT 1");
	echo mysql_error();

	fputs($socket, "{$rij['commando']}\r\n");
	
	if (rtrim($rij['commando']) == ".quit") {
	    echo "<font color='$ircColors[4]'>Disconnected...</font><br>\n";
	    break 2;
	}
	}
    if ($a > 0) { @set_time_limit(3600); /* ten minutes extra to say sth */ }

    /**********************************************************************************************/

    if (connection_aborted()) {
	echo "<font color='red'>Disconnected...</font><br>\n";
	break 2;
    }
    flush(); //output this...
    usleep(2500); // give cpu some rest... 200 ms?
}
destruct_session();

?>
</pre>
</body>
</html>