<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "tracker_baza";

/*$server=$_SERVER["HTTP_HOST"]==="http://andibasic.byethost8.com"){
$host="ftp.byethost8.com";
$dbname="b8_21975848_tracker_baza";
$dbuser="b8_21975848";
$dbpass="andibasic";*/

$connId = mysql_connect($server,$username,$password) or die("Cannot connect to server");
$selectDb = mysql_select_db($database,$connId) or die("Cannot connect to database"); 

$result = "CREATE TABLE track(
`id` int(6) NOT NULL auto_increment,
`tm` varchar(20) NOT NULL default '',
`agent` varchar(250) NOT NULL default '',
`ip` varchar(20) NOT NULL default '',
`ip_value` int(11) NOT NULL default '0',
`domain` varchar(20) NOT NULL default '',
`tracking_page_name` varchar(10) NOT NULL default '',
`host_name` varchar(20) NOT NULL default '',
`count_number` int(20) NOT NULL default '0',


 UNIQUE KEY `id` (`id`)
 ) ENGINE=MyISAM DEFAULT CHARSET=latin1 "; 

if (mysql_query($result))
{
 print "Success in TABLE creation!......";
} 
else 
{
die('MSSQL error: ' . mssql_get_last_message());
}


?>'