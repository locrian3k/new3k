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
$tijd = time();
$cmd = $HTTP_GET_VARS['cmnd'];
$command = $cmd;


$link = mysql_connect($mysql_host, $mysql_user, $mysql_pass);
mysql_select_db($mysql_db);
$bgcolor = "#00FF00";

//debug

if ($command && $id) { mysql_query("INSERT INTO phpchat VALUES($id, $tijd, '$command')"); }
if (mysql_errno() > 0) { $bgcolor = "#FF0000"; }

echo <<<EOF
<html>
<head><title>passed command</title>
</head><body bgcolor="$bgcolor"></body></html>
EOF;
?>