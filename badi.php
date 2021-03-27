<?php
include("ayarlar.php");
$takipeden = $_GET['te'];
$takipedilen = $_GET['ted'];


if (isset($_GET['takip'])) {
    $takipetsql = sqlInsertBadi($baglan, $takipeden, $takipedilen);
} else if (isset($_GET['takibicek'])) {
    $takibiceksql = sqlDeleteBadi($baglan, $takipeden, $takipedilen);
} else {
    echo "Yanliş Yerdesin";
}
$baglanti = mysqli_close($baglan);
header("location: " . $_SERVER['HTTP_REFERER'] . "");
?>