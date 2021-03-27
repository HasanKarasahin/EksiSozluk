<?php
include("ayarlar.php");
session_start();

//$url = $_SERVER['HTTP_REFERER'];  // hangi sayfadan gelindigi degerini verir.


if (isset($_SESSION['oturum'])) {
    if (isset($_GET['ys'])) {
        //burda yorum silinecek
        $yorumsilsql = mysqli_query($baglan, "DELETE FROM yorumlartbl WHERE YorumId='{$_GET["ys"]}'");
        if ($yorumsilsql) {
            header("location: " . $_SERVER['HTTP_REFERER'] . "");
        } else {
            echo "Yorum Silinemedi";
        }
    } else if (isset($_GET['bs'])) {
        //burda baslik silinecek
        $basliksilsql = mysqli_query($baglan, "DELETE FROM basliklartbl WHERE BaslikId='{$_GET["bs"]}'");
        if ($basliksilsql) {
            $yorumsilsql = mysqli_query($baglan, "DELETE FROM yorumlartbl WHERE BaslikId='{$_GET["bs"]}'");
            if ($yorumsilsql) {
                header("Location:index.php");
            } else {
                echo "Basliga ait yorumlar Silinemedi";
            }
        } else {
            echo "Baslik Silinemedi";
        }
    } else if (isset($_GET['ks'])) {
        $kisiid = $_GET['ks'];
        $kisisilsql = mysqli_query($baglan, "DELETE FROM uyelertbl WHERE id='{$kisiid}'");
        if ($kisisilsql) {
            $kisininyorumlarinisilsql = mysqli_query($baglan, "DELETE FROM yorumlartbl WHERE YorumId='{$kisiid}'");
            if ($kisininyorumlarinisilsql) {
                header("Location:index.php");
            } else {
                echo "Kişinin yorumlari Silinemedi";
            }
        } else {
            echo "Kişi Silinemedi";
        }
    } else {
        echo "Olmaman Gereken Yerdesin";
    }
    $baglanti = mysqli_close($baglan);
    if ($baglanti) {
        echo "Kapatildi";
    }

} else {
    echo "Yaliş Yerdesin";
}

?>