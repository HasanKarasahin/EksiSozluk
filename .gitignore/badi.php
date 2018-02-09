<?php 
include("ayarlar.php");
$takipeden=$_GET['te'];
$takipedilen=$_GET['ted'];




if(isset($_GET['takip']))
{
    $takipetsql=mysqli_query($baglan,"INSERT INTO badi(takipeden,takipedilen) VALUES('{$takipeden}','{$takipedilen}')");
}
else if(isset($_GET['takibicek']))
{
    $takibiceksql=mysqli_query($baglan,"DELETE FROM badi WHERE takipeden='{$takipeden}' AND takipedilen='{$takipedilen}'");
}
else
{
    echo "Yanliş Yerdesin";
}
$baglanti=mysqli_close($baglan);
header("location: ".$_SERVER['HTTP_REFERER']."");
?>