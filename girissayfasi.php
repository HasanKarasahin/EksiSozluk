<?php
if (isset($_POST["girisbuton"])) {
    $nick = $_POST["nick"];
    $pass = $_POST["pass"];
    $kullanicivarmi = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE email='$nick' AND sifre='$pass'");
    if ($kullanici = mysqli_fetch_assoc($kullanicivarmi)) {
        $_SESSION['oturum'] = "acik";
        $_SESSION['yazarid'] = $kullanici['id'];
        $_SESSION['nick'] = $kullanici['nick'];
        if ($kullanici['yetki'] == 2) {
            $_SESSION['rutbe'] = "admin";
        } else if ($kullanici['yetki'] == 1) {
            $_SESSION['rutbe'] = "yazar";
        } else {
            $_SESSION['rutbe'] = "caylak";
        }
        header("Location:index.php?profil={$nick}");
    } else {
        $_SESSION['oturum'] = "kapali";
        $_SESSION['rutbe'] = "bos";
        $_SESSION['yazarid'] = "";
        $_SESSION['nick'] = "";
        header("Location:index.php?git=giris");
    }
}
?>
<form action="" method="POST">
    <div id="girisdiv">
        <h1>giriş</h1>
        <p>e-mail adresi</p>
        <input type="text" name="nick" required/>
        <p>şifre</p>
        <input type="password" name="pass" required/><br/><br/>
        <input type="checkbox" name="hatirla" value="hatirla">unutma bunları sorucam sonra<br><br/>
        <input type="submit" name="girisbuton" value="giriş yapmaya çabala"/>
        <h2>giremeyiş</h2>
        <a href="#">şifremi unuttum</a><br/>
        <a href="#">kayıtlı kullanıcı olunası</a><br/><br/>
    </div>
</form>

