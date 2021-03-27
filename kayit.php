<?php
include("ayarlar.php");
$kullaniciadi = $_POST["yenikullaniciadi"];
$email = $_POST["email"];
$gun = $_POST["gun"];
$ay = $_POST["ay"];
$yil = $_POST["yil"];
$cinsiyet = $_POST["cinsiyet"];
$yenisifre = $_POST["yenisifre"];
$yenisifretekrar = $_POST["yenisifretekrar"];
$sartonay = @$_POST["sartlar"];

$kullaniciara = mysqli_query($baglan, "SELECT nick FROM uyelertbl WHERE nick='$kullaniciadi'");
if (mysqli_fetch_row($kullaniciara) > 0) {
    phpAlert("Boyle Biri Var,Baska Bir kullanici ismi bul");

} else {
    $emailara = mysqli_query($baglan, "SELECT email FROM uyelertbl WHERE email='$email'");
    if (mysqli_fetch_row($emailara) > 0) {
        phpAlert("Boyle Bir Mail Adresi Kullaniliyor");
    } else {
        if ($yenisifre == $yenisifretekrar) {
            $uyeekle = mysqli_query($baglan, "INSERT INTO uyelertbl(nick,sifre,email,gun,ay,yil) values('$kullaniciadi','$yenisifre','$email','$gun','$ay','$yil')");
            if ($uyeekle) {
                phpAlert("�ye Oldun");
            } else {
                phpAlert("�ye Olamadin");
            }
        } else {
            phpAlert("�ifreler E�le�miyor");
        }
    }
}
?>
<?php
function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

?>