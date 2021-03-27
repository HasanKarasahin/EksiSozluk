<?php
include("ayarlar.php");
if (isset($_POST['banat'])) {
    $banlasql = sqlUpdateUyeBanAt($baglan, $_GET['kb']);
} else if (isset($_POST['bankaldir'])) {
    $banlasql = sqlUpdateUyeBanKaldir($baglan, $_GET['kb']);
} else {
    echo "Proplem";
}
$baglanti = mysqli_close($baglan);
if ($baglanti) {
    echo "Kapatildi";
}
header("location: " . $_SERVER['HTTP_REFERER'] . "");
?>