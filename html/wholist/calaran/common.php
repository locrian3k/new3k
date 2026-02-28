<?php

/********************************************************************************
 * Server variables: MySQL, Telnet
*********************************************************************************/

$mysql_host = "localhost";
$mysql_user = "";
$mysql_pass = "";
$mysql_db = "";

$serv_addr[0] = "3k.org";		 	// the telnet server dns or ip
$serv_name[0] = "3Kingdoms"; 			// !! the telnet server name
$serv_port[0] = 3000;				// the telnet server port, 

/********************************************************************************
 * Layout variables: Colors, fonts, CSS
*********************************************************************************/

$fontsize = 10;		// the font size of all the pages
$fontfamily = "'geneva', 'verdana', 'helvetica', 'lucida', 'arial'";	// the font family(s) of all the pages. *! Within the dubble quotes, supply single quotes around each family !*

$page_bg  = "#cccccc"; 		// page background color
$chan_bg  = "#000000"; 		// channel frame background color
$chan_fg  = "#ffffff"; 		// channel frame foreground color
$input_bg = "#000000"; 		// background color of the input text, the buttons, and the color chooser
$table_border = "#3322FF"; 	// border color of the table
$page_fg  = "#ffffff"; 		// page foreground/text color

/* The css part that gets included on every page, add ur own wishes here ;) */
$css = <<<EOF
<style type="text/css">

body,tr,td,iframe {
    font-family: $fontfamily;
    font-size: {$fontsize}pt;
}
</style>

EOF;

?>