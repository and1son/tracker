<html>
<body>
<?php
//stari način spajanja
$con = mysql_connect("localhost","root","");
mysql_select_db("tracker_baza", $con) or die( "Unable to select database");
$query="SELECT * FROM track group by agent having count(*) > 1";

//counter ne radi - popraviti upit u bazu da prebroji id-jeve s istom adresom te povećava counter za 1 te napraviti pomoću sesija? da broji vrijeme provedeno na stranici

/*while($row = mysql_fetch_assoc($query)){
	$current_counts = $row['count_number'];
	$new_count = $current_counts +1;
	$update_count = mysql_query("UPDATE 'tracker_baza' . 'track' SET 'count_number = $new_count");
}*/

$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();
	
?>

<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th><font face="Arial, Helvetica, sans-serif">id</font></th>
<th><font face="Arial, Helvetica, sans-serif">time</font></th>
<th><font face="Arial, Helvetica, sans-serif">user agent</font></th>
<th><font face="Arial, Helvetica, sans-serif">ip address</font></th>
<th><font face="Arial, Helvetica, sans-serif">tracking_page_name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Host_name</font></th>
<th><font face="Arial, Helvetica, sans-serif">Count number</font></th>

</tr>

<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"id");
$f2=mysql_result($result,$i,"tm");
$f3=mysql_result($result,$i,"agent");
$f4=mysql_result($result,$i,"ip");
$f5=mysql_result($result,$i,"tracking_page_name");
$f6=mysql_result($result,$i,"host_name");
$f7=mysql_result($result,$i,"count_number");

?>

<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font></td>

</tr>

<?php
$i++;
}
?>
</body>
</html>'