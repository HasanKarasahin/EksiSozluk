<?php include("ayarlar.php");
session_start();
$yorumid = $_GET['yid'];
$baslikid = $_GET['bid'];
$likedurum = 0;
$dislikedurum = 0;

if (isset($_SESSION['yazarid'])) {
    $dislikesqlkontrol = mysqli_query($baglan, "SELECT * FROM yorumdislike WHERE YorumId='{$yorumid}' AND YazarId='{$_SESSION['yazarid']}'");
    while ($likekontol = mysqli_fetch_row($dislikesqlkontrol) > 0) {
        $dislikedurum++;
    }
    $likesqlkontrol = mysqli_query($baglan, "SELECT * FROM yorumbegeni WHERE YorumId='{$yorumid}' AND YazarId='{$_SESSION['yazarid']}'");
    while ($likekontol = mysqli_fetch_row($likesqlkontrol) > 0) {
        $likedurum++;
    }
}


if (isset($_GET['dislike'])) {
    if ($dislikedurum == 0 && $likedurum == 0) {
        $dislikesql = mysqli_query($baglan, "INSERT INTO yorumdislike(BaslikId,YorumId,YazarId)  VALUES ('{$baslikid}','{$yorumid}','{$_SESSION['yazarid']}')");
    } else {
        if ($likedurum == 1) {
            $likesql = mysqli_query($baglan, "DELETE FROM yorumbegeni WHERE YorumId='{$yorumid}' AND YazarId='{$_SESSION['yazarid']}' AND BaslikId='{$baslikid}'");
            $dislikesql = mysqli_query($baglan, "INSERT INTO yorumdislike(BaslikId,YorumId,YazarId)  VALUES ('{$baslikid}','{$yorumid}','{$_SESSION['yazarid']}')");
        } else {
            $dislikesql = mysqli_query($baglan, "DELETE FROM yorumdislike WHERE YorumId='{$yorumid}' AND YazarId='{$_SESSION['yazarid']}' AND BaslikId='{$baslikid}'");
        }
    }
} else if (isset($_GET['like'])) {
    if ($likedurum == 0 && $dislikedurum == 0) {
        $likesql = mysqli_query($baglan, "INSERT INTO yorumbegeni(BaslikId,YorumId,YazarId)  VALUES ('{$baslikid}','{$yorumid}','{$_SESSION['yazarid']}')");
    } else {
        if ($dislikedurum == 1) {
            $dislikesql = mysqli_query($baglan, "DELETE FROM yorumdislike WHERE YorumId='{$yorumid}' AND YazarId='{$_SESSION['yazarid']}' AND BaslikId='{$baslikid}'");

            $likesql = mysqli_query($baglan, "INSERT INTO yorumbegeni(BaslikId,YorumId,YazarId)  VALUES ('{$baslikid}','{$yorumid}','{$_SESSION['yazarid']}')");
        } else {
            $likesql = mysqli_query($baglan, "DELETE FROM yorumbegeni WHERE YorumId='{$yorumid}' AND YazarId='{$_SESSION['yazarid']}' AND BaslikId='{$baslikid}'");
        }
    }
}
$baglanti = mysqli_close($baglan);
if ($baglanti) {
    echo "Kapatildi";
}
header("location: " . $_SERVER['HTTP_REFERER'] . "");
?>