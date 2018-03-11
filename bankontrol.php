<?php 
//echo @$_POST['bankontrol'];
include("ayarlar.php");
if(isset($_POST['banat']))
{
     $banlasql=mysqli_query($baglan,"UPDATE uyelertbl SET ban=1 WHERE ban=0 AND id={$_GET['kb']}");
}
else if(isset($_POST['bankaldir']))
{
    $banlasql=mysqli_query($baglan,"UPDATE uyelertbl SET ban=0 WHERE ban=1 AND id={$_GET['kb']}");
}
else
{
    echo "Proplem";
}
$baglanti=mysqli_close($baglan);
if($baglanti)
{
    echo "Kapatildi";
}
header("location: ".$_SERVER['HTTP_REFERER']."");
?>