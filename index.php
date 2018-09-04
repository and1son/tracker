<html>
<?php

$host = "localhost";
$database = "tracker_baza";
$username = "root";         
$password = "";         

try {
$dbo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
echo "Connected successfully"; 
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$ref=@$_SERVER[HTTP_REFERER];
$tracking_page_name="index.php";
$agent=$_SERVER['HTTP_USER_AGENT'];
$ip=$_SERVER['REMOTE_ADDR'];
$host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$strSQL = "INSERT INTO track(tm, agent, ip, tracking_page_name, host_name) VALUES(curdate(),'$agent','$ip','$tracking_page_name','$host_name')";
$test=mysql_query($strSQL);
$sql=$dbo->prepare($strSQL);
$sql->bindParam(':tm',$ref,PDO::PARAM_STR, 250);
$sql->bindParam(':agent',$agent,PDO::PARAM_STR, 250);
$sql->bindParam(':ip',$ip,PDO::PARAM_STR, 20);
$sql->bindParam(':tracking_page_name',$tracking_page_name2,PDO::PARAM_STR, 100);
$sql->bindParam(':host_name',$host_name,PDO::PARAM_STR, 100);

if($sql->execute()){

echo " Success ";

}
else{ 
	print_r($sql->errorInfo()); 
}

?>

</html>