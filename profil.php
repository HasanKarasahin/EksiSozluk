<?php $kontrol = 0;
$hangiprofilde = 0;
$entrykontrol = 0;
$baslikkontrol = 0;
$uyevarmi12 = mysqli_query($baglan, "SELECT COUNT(nick) FROM uyelertbl WHERE nick='{$_GET["profil"]}'");
$uye12 = mysqli_fetch_array($uyevarmi12);

if (@$_SESSION['oturum'] == "acik") {
    $ziyaretedilenuyesql = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE nick='{$_GET["profil"]}'");
    $ziyaretedilenuye = mysqli_fetch_assoc($ziyaretedilenuyesql);
    $_SESSION['mesajatilacakkisi'] = "";
    ?><h3><a href="#" style="color:black;text-decoration:none"><?php echo $_GET['profil']; ?></a></h3><br/>

    <?php
    if ($_SESSION['rutbe'] == "admin" && $_GET['profil'] == $_SESSION['nick']) {
        ?>
        <div class="rütbe">
            <?php
            echo $_SESSION['rutbe'];
            ?>
        </div>
        <?php
    } else {
        if ($_GET['profil'] != $_SESSION['nick']) {
            $badidurumsql = mysqli_query($baglan, "SELECT * FROM badi WHERE takipeden='{$_SESSION['yazarid']}' AND takipedilen='{$ziyaretedilenuye['id']}'");
            if ($badidurum = mysqli_fetch_row($badidurumsql) > 0) {
                ?>
                <div class="badidurumdiv"><a
                            href="badi.php?te=<?php echo $_SESSION['yazarid'] ?>&ted=<?php echo $ziyaretedilenuye['id']; ?>&takibicek">badidurumu(arkadaslık+)</a>
                </div>
                <?php
            } else {
                ?>
                <div class="badidurumdiv"><a
                            href="badi.php?te=<?php echo $_SESSION['yazarid'] ?>&ted=<?php echo $ziyaretedilenuye['id']; ?>&takip">badidurumu(arkadaslık)</a>
                </div>
                <?php
            }
        }

        if ($uye12[0] == "1") {
            ?>
            <div class="rütbe">
                <?php
                if ($ziyaretedilenuye['yetki'] == 2) {
                    echo "Admin";
                } else if ($ziyaretedilenuye['yetki'] == 1) {
                    echo "Yazar";
                } else {
                    echo "Çaylak";
                }
                ?>
            </div>
            <?php
        }
    }
    ?><br/>
    0*0*0*0
    <br/>
    <!--bugün çaylak onay listesinde 30492. sıradasınız. bu sıra 10 entry'yi ne zaman doldurduğunuza göre her gün hesabına giriş yapanlar arasından baştan belirlenmektedir.-->
    <?php
    if (isset($_SESSION['nick'])) {
        $yorumlarsql = mysqli_query($baglan, "SELECT * FROM yorumlartbl WHERE YazarId='{$_SESSION["yazarid"]}'");
        $hangiprofilde = $_SESSION["yazarid"];
        if ($_SESSION['nick'] == $_GET['profil']) {
            echo $_SESSION['nick'] . " Profiliniz";
            $_SESSION['mesajatilacakkisi'];
        } else {
            if ($uye12[0] == "1") {
                $_SESSION['mesajatilacakkisi'] = $_GET['profil'];
                $yorumlarsql = mysqli_query($baglan, "SELECT * FROM yorumlartbl AS y ,uyelertbl AS u WHERE u.nick='{$_GET['profil']}' AND u.id=y.YazarId");
                $yorumlarsql1 = mysqli_query($baglan, "SELECT * FROM yorumlartbl AS y ,uyelertbl AS u WHERE u.nick='{$_GET['profil']}' AND u.id=y.YazarId");
                $yorumsayi = mysqli_fetch_assoc($yorumlarsql1);//yazarlarin idsini alıp kaçtane entry girmişler onun sayisini tutabılmek icin yapıyorum bunu..
                $hangiprofilde = $yorumsayi['YazarId'];
                //echo $_GET["profil"]."Kişisini ziyaret ediyorsunuz..<br/>Rütbesi<br/><br/>";
                ?>
                <form action="index.php?mesaj" method="post">
                    <input type="submit" name="mesajbt" value="Mesaj At"/>
                </form>
            <form action="sil.php?ks=<?php echo $hangiprofilde; ?>" method="post">
                <?php if ($_SESSION["rutbe"] == "admin") { ?>
                    <input type="submit" name="sil" value="Sil"/>
                    </form>
                    <form action="bankontrol.php?kb=<?php echo $hangiprofilde; ?>" method="post">
                        <?php
                        $banlimisql = mysqli_query($baglan, "SELECT ban FROM uyelertbl WHERE id='{$hangiprofilde}'");
                        $banlimi = mysqli_fetch_assoc($banlimisql);
                        if ($banlimi['ban'] == 0) {
                            ?> <input type="submit" name="banat" value="Banla"/><?php
                        } else {
                            ?> <input type="submit" name="bankaldir" value="Ban Kaldir"/><?php
                        }
                        ?>
                    </form>
                <?php } ?>

                <?php
            } else {
                echo "Böyleaa Biri Yok";
                $kontrol = 1;
            }
        }
        ?>
        <?php
    }
} else {
    if ($uye12[0] == "1") {
        echo $_GET["profil"] . "Kişisini ziyaret ediyorsunuz..<br/>Rütbesi";
        $yorumlarsql = mysqli_query($baglan, "SELECT * FROM yorumlartbl AS y ,uyelertbl AS u WHERE u.nick='{$_GET['profil']}' AND u.id=y.YazarId");
        $yorumlarsql1 = mysqli_query($baglan, "SELECT * FROM yorumlartbl AS y ,uyelertbl AS u WHERE u.nick='{$_GET['profil']}' AND u.id=y.YazarId");
        $yorumsayi = mysqli_fetch_assoc($yorumlarsql1);//yazarlarin idsini alıp kaçtane entry girmişler onun sayisini tutabılmek icin yapıyorum bunu..
        $hangiprofilde = $yorumsayi['YazarId'];
    } else {
        echo "Böyle Biri Yok";
        $kontrol = 1;
    }
}
$entrysayisi = 0;

?>


<?php if ($kontrol == 0) { ?>


    <div class="cizgi"></div>
    <form action="" method="POST">
        <div class="linkler">

            <div class="link"><input name="entrygoster" type="submit" value="entry'ler"/></div>
            <div class="link"><input name="favori" type="submit" value="favoriler"/></div>
            <?php
            if (isset($_SESSION['oturum'])) {
                if (($_SESSION['oturum'] == "acik") && ($_SESSION['yazarid'] == $hangiprofilde) && ($_SESSION['rutbe'] != "caylak")) {
                    ?>
                    <div class="link"><input name="baslikac" type="submit" value="Baslik Ac"/></div>
                    <?php
                }
            }
            ?>

        </div>
    </form>
    <div class="cizgi"></div>
    <div class="clear"></div>

    <?php

    if (isset($_POST['favori'])) {
        $yorumlarsql = mysqli_query($baglan, "SELECT * FROM yorumlartbl WHERE YorumId IN(SELECT YorumId FROM yorumbegeni WHERE YazarId='{$hangiprofilde}')");
        $entrykontrol = 0;
        $baslikkontrol = 1;
    } else if (isset($_POST['entrygoster'])) {
        $entrykontrol = 1;
        $baslikkontrol = 1;
    } else if (isset($_POST['baslikac'])) {
        $entrykontrol = 0;
        $baslikkontrol = 0;
    } else {
        $baslikkontrol = 1;
    }

    if ($baslikkontrol != 0) {
        $kactanevarsql = mysqli_query($baglan, "SELECT count(*) FROM yorumlartbl WHERE YazarId='{$hangiprofilde}'");
        $kactanevar = mysqli_fetch_array($kactanevarsql);
        if ($entrykontrol == 1) {
            ?>
            <div class="secilenlink">entry'ler (<?php echo $kactanevar[0]; ?>)</div>
            <?php
        }


        ?>
        <div class="profileaitentryler">
            <ul>
                <?php while ($yorumlar = mysqli_fetch_assoc($yorumlarsql)) {
                    ; ?>
                    <li>
                        <div><a href="#"><h2>
                                    <?php
                                    $basliksql = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId='{$yorumlar["BaslikId"]}'");
                                    $baslik = mysqli_fetch_assoc($basliksql);
                                    echo $baslik['BaslikAdi'];
                                    ?>
                                </h2></a></div>
                        <div><?php echo $yorumlar['Yorum']; ?></div>
                        <div id="entryfooter">
                            <a href="#">
                                <div id="facebook"></div>
                            </a>
                            <a href="#">
                                <div id="twitter"></div>
                            </a>
                            <?php if (isset($_SESSION['oturum'])) {
                                if ($_SESSION['oturum'] == "acik" && $_SESSION['nick'] == $_GET['profil'] && $entrykontrol == 1) {
                                    ?>
                                    <a href="sil.php?ys=<?php echo $yorumlar['YorumId']; ?>">
                                        <div id="sikayet">sil</div>
                                    </a>
                                    <a href="#">
                                        <div id="sikayet">düzenle</div>
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            $ziyaretedilenuyesql = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE id = '{$yorumlar['YazarId']}'");
                            $ziyaretedilenuye = mysqli_fetch_assoc($ziyaretedilenuyesql); ?>
                            <a href="index.php?profil=">
                                <div id="yazar"> <?php echo $ziyaretedilenuye['nick']; ?>
                                </div>
                            </a>
                            <a href="#">
                                <div id="tarih">
                                    <?php echo $yorumlar['YorumGun'] . '.' . $yorumlar['YorumAy'] . '.' . $yorumlar['YorumTarih'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $yorumlar['YorumSaati'] ?>
                                </div>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </li>
                <?php } ?>
            </ul>
        </div>

        <?php


    } else {
        ?>
        <div class="Yorumdiv">
            <form action="" method="post">

                <select name="katagori">
                    <option value="4">otomotiv</option>
                    <option value="3">siyaset</option>
                    <option value="2">ilişkiler</option>
                    <option value="1">spor</option>
                </select>
                <textarea name="yenibaslik" rows="2" cols="84px" maxlength="535px"
                          style=" text-align:left  ; font-size: 14px ;resize:none;" required></textarea>

                <textarea name="yeniyorum" rows="6" cols="84px" maxlength="535px"
                          style=" text-align:left  ; font-size: 24px ;resize:none;" required></textarea>

                <input type="submit" name="yenibaslikgeldi" value="yolla"/>
            </form>
        </div>
        <?php
        if (isset($_POST['yenibaslikgeldi'])) {

            $baslikeklesql = mysqli_query($baglan, "INSERT INTO basliklartbl(BaslikAdi,KatagoriId) VALUES('{$_POST['yenibaslik']}','{$_POST['katagori']}')");
            $soneklenenbasliksql = mysqli_query($baglan, "SELECT * FROM basliklartbl ORDER By BaslikId  DESC LIMIT 1");
            $soneklenenbaslik = mysqli_fetch_assoc($soneklenenbasliksql);

            if ($baslikeklesql) {
                $_POST['yeniyorum'] = trim($_POST['yeniyorum']);
                if (empty($_POST['yeniyorum'])) {
                } else {
                    $yeniyorum = $_POST['yeniyorum'];
                    $saat = date('H') . ":" . date('i') . ":" . date('s');
                    $gun = date('d');
                    $ay = date('m');
                    $yil = date('Y');
                    $baslik_id = $soneklenenbaslik['BaslikId'];
                    $yeniyorumeklesql = mysqli_query($baglan, "INSERT INTO yorumlartbl(Yorum,YorumTarih,YorumAy,YorumGun,YorumSaati,YazarId,BaslikId) VALUES('{$yeniyorum}','{$yil}','{$ay}','{$gun}','{$saat}','{$_SESSION['yazarid']}','{$baslik_id}')");


                    if ($yeniyorumeklesql) {
                        header("refresh:0");
                    } else {
                        phpAlert("Hata");
                    }


                }

            } else {
                phpAlert("Hata");
            }


        }
    }


}
?>
