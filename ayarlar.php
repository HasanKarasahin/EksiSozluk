<?php
$baglan = mysqli_connect("127.0.0.1", "root", "password", "eksisozlukdb", "3306");
mysqli_set_charset($baglan, "utf8");
mysqli_query($baglan, "SET NAMES 'utf8' COLLATE 'utf8_turkish_ci'");
date_default_timezone_set('Europe/Istanbul');

function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

function sqlUstMenu($baglan, $loginMi)
{
    if ($loginMi == "acik") {
        $sorgu = mysqli_query($baglan, "SELECT * FROM ustmenu");
    } else {
        $sorgu = mysqli_query($baglan, "SELECT * FROM ustmenu  WHERE oturum=0");
    }

    return $sorgu;
}

function sqlAramaBaslik($baglan, $aranan)
{
    $sorgu = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikAdi LIKE '%$aranan%'");
    return $sorgu;
}

function sqlAramaYorum($baglan, $aranan)
{
    $sorgu = mysqli_query($baglan, "SELECT * FROM yorumlartbl WHERE Yorum LIKE '%$aranan%'");
    return $sorgu;
}

function sqlAramaYazar($baglan, $aranan)
{
    $sorgu = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE nick LIKE '%$aranan%'");
    return $sorgu;
}

function sqlArananHangiSayfada($baglan, $baslikId, $yorumId)
{
    $sorgu = mysqli_query($baglan, "SELECT COUNT(*) FROM yorumlartbl WHERE BaslikId={$baslikId} AND YorumId<={$yorumId}");
    return $sorgu;
}

function sqlInsertBadi($baglan, $takipeden, $takipedilen)
{
    $sorgu = mysqli_query($baglan, "INSERT INTO badi(takipeden,takipedilen) VALUES('{$takipeden}','{$takipedilen}')");
    return $sorgu;
}

function sqlDeleteBadi($baglan, $takipeden, $takipedilen)
{
    $sorgu = mysqli_query($baglan, "DELETE FROM badi WHERE takipeden='{$takipeden}' AND takipedilen='{$takipedilen}'");
    return $sorgu;
}

function sqlUpdateUyeBanAt($baglan, $kb)
{
    $sorgu = mysqli_query($baglan, "UPDATE uyelertbl SET ban=1 WHERE ban=0 AND id={$kb}");
    return $sorgu;
}

function sqlUpdateUyeBanKaldir($baglan, $kb)
{
    $sorgu = mysqli_query($baglan, "UPDATE uyelertbl SET ban=1 WHERE ban=0 AND id={$kb}");
    return $sorgu;
}

function sqlKullaniciVarMi($baglan,$email,$pass){
    $sorgu = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE email='$email' AND sifre='$pass'");
    return $sorgu;
}


?>


	
	
	
	
	
	
	