<div id="content">
    <div id="content_left">
        <div id="katagoriadi">
            <?php
            //$_SESSION['ustmenu']="gündem";
            if (@$_POST['m']) {
                $_SESSION['ustmenu'] = $_POST['m'];
            } else if (empty($_SESSION['ustmenu'])) {
                $_SESSION['ustmenu'] = "gündem";
            }
            $menugetir = sqlUstMenu($baglan, "acik");
            while ($menu = mysqli_fetch_assoc($menugetir)) {
                if ($_SESSION['ustmenu'] == $menu['menu']) {
                    echo $menu['menu'];
                    if ($menu['menu'] == "tarihte bugün") {
                        ?>
                        <form id="tarihler" action="" method="POST">
                            <select name="tarihtebugunyil">
                                <?php

                                for ($i = 2016; $i > 1990; $i--) {
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <input type="submit" name="tarih" id="tarihb" value="Getir"/>
                        </form>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <div id="trendler">
            <ul>
                <?php
                $gundemvarmi = false;
                $gundemvarmikontrol = true;
                $gun = date('d');
                $ay = date('m');
                $yil = date('Y');
                if ($_SESSION['ustmenu'] == "gündem") {
                    $katagoriligetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId IN(SELECT BaslikId FROM yorumlartbl WHERE YorumTarih='{$yil}' AND YorumAy='{$ay}' AND YorumGun='{$gun}' GROUP BY BaslikId HAVING COUNT(*)>5)");
                } else if (isset($_POST['tarih'])) {
                    $katagoriligetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId IN (SELECT BaslikId FROM yorumlartbl WHERE YorumTarih='{$_POST["tarihtebugunyil"]}' AND YorumAy='{$ay}' AND YorumGun='{$gun}')");
                } else if (($_SESSION['ustmenu'] == "bugün")) {
                    $katagoriligetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId IN (SELECT BaslikId FROM yorumlartbl WHERE YorumTarih='{$yil}' AND YorumAy='{$ay}' AND YorumGun='{$gun}')");
                } else if (($_SESSION['ustmenu'] == "Şükela!")) {
                    $katagoriligetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId IN (SELECT BaslikId FROM yorumbegeni GROUP BY BaslikId HAVING COUNT(*)>5)");
                } else if (($_SESSION['ustmenu'] == "Çok Kötü")) {
                    $katagoriligetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId IN (SELECT BaslikId FROM yorumdislike GROUP BY BaslikId HAVING COUNT(*)>5)");
                } else {
                    $katagoriligetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE KatagoriId=(SELECT KatagoriId FROM katagoritbl WHERE KatagoriAdi='{$_SESSION["ustmenu"]}')");
                }
                while ($katagorilibasliklar = mysqli_fetch_assoc($katagoriligetir)) {
                    $gundemvarmikontrol = false;
                    ?>
                    <a href="index.php?b=<?php echo $katagorilibasliklar['BaslikId'] ?>&sayfa=1">
                        <li>
                            <div id="trendbaslik">
                                <?php
                                echo $katagorilibasliklar['BaslikAdi'];
                                ?>
                            </div>
                            <div id="trendbegeni">
                                <?php
                                $basliginyorumsayisisql = mysqli_query($baglan, "SELECT COUNT(YorumId) FROM yorumlartbl WHERE BaslikId='{$katagorilibasliklar['BaslikId']}'");
                                $basliginyorumsayisi = mysqli_fetch_row($basliginyorumsayisisql);
                                echo $basliginyorumsayisi[0];
                                ?>
                            </div>
                            <div class="clear"></div>
                        </li>
                    </a>
                    <?php
                }
                if ($gundemvarmi && $gundemvarmikontrol) {
                    echo "Bugunluk Birşey Yok";
                }
                ?>
            </ul>
        </div>
    </div>
    <div id="content_right">
        <?php
        if (@$_GET["git"] == "giris") {
            if (@$_SESSION['oturum'] == "acik") {
                echo "Zaten Oturum Actiniz...";
            }
            include("girissayfasi.php");
        } else if (@$_GET["git"] == "kayit") {
            include("kayitsayfasi.php");
        } else if (isset($_GET["mesaj"])) {
            include("mesaj.php");
        } else if (isset($_POST['searchbuton'])) {
            include_once("arama.php");
        } else {
            if (isset($_GET['profil'])) {
                include("profil.php");
            } else {
                ?>
                <ul>
                <?php

                //&& isset($_GET["s"])
                if (isset($_GET["b"])) {
                    $sayfasayisi = $_GET['sayfa'];
                    if ($sayfasayisi <= 0) {
                        $sayfasayisi = 1;
                    }
                    $gidilecekyermin = ($sayfasayisi - 1) * 10;
                    $gidilecekyermax = ($sayfasayisi * 10) - $gidilecekyermin;

                    $baslikvarmi = mysqli_query($baglan, "SELECT COUNT(BaslikId) FROM basliklartbl WHERE BaslikId='{$_GET["b"]}'");
                    $baslik = mysqli_fetch_array($baslikvarmi);
                    if ($baslik[0] == "1") {
                        $baslikadigetir = mysqli_query($baglan, "SELECT * FROM basliklartbl WHERE BaslikId='{$_GET["b"]}'");
                        $baslik = mysqli_fetch_assoc($baslikadigetir);

                        $kactaneyorumvar = mysqli_query($baglan, "SELECT count(*) FROM yorumlartbl WHERE BaslikId='{$_GET["b"]}'");
                        $yorumsayisi = mysqli_fetch_array($kactaneyorumvar);


                        $basliginyorumunugetir = mysqli_query($baglan, "SELECT * FROM yorumlartbl WHERE BaslikId='{$_GET["b"]}' LIMIT $gidilecekyermin,$gidilecekyermax");
                        ?>


                        <?php
                        $kontrol = 0;
                        if (@$_SESSION['rutbe'] == "admin") {
                            $kontrol = 1;
                        } else {
                            $kontrol = 0;
                        }

                        ?>


                        <li>

                        <a href="#" id="baslik">
                            <?php echo $baslik['BaslikAdi'];

                            if ($kontrol == 1) {
                                ?>
                                <a href="sil.php?bs=<?php echo $baslik['BaslikId']; ?>">basliksil</a>
                                <?php
                            }
                            ?>
                        </a>


                        <div id="sayfalama">


                            <?php $sayfalar = ceil($yorumsayisi[0] / 10); ?>


                            <a href="index.php?b=<?php echo $_GET['b'] ?>&sayfa=<?php echo $sayfasayisi - 1 ?>">
                                <input class="sayfalamab" type="submit" value="<<"/>
                            </a>
                            <select class="example1" onchange="if (this.value) window.location.href=this.value">

                                <?php
                                for ($i = 0; $i < $sayfalar; $i++) {
                                    ?>
                                    <option value="index.php?b=<?php echo $_GET['b']; ?>&sayfa=<?php echo $i + 1; ?>"
                                        <?php
                                        if ($_GET['sayfa'] == $i + 1)
                                        {
                                        ?> selected> <?php
                                        }
                                        else {
                                            ?> > <?php
                                        }
                                        ?>

                                        <?php
                                        echo $i + 1;
                                        ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>


                            <input class="sayfalamab" type="submit" value=" <?php echo $sayfalar; ?>"/>

                            <a href="index.php?b=<?php echo $_GET['b'] ?>&sayfa=<?php if ($sayfalar >= $sayfasayisi + 1) {
                                echo $sayfasayisi + 1;
                            } else {
                                echo $sayfalar;
                            } ?>">
                                <input class="sayfalamab" type="submit" value=">>"/>
                            </a>


                        </div>
                        <?php
                        while ($basliginyorumlari = mysqli_fetch_assoc($basliginyorumunugetir)) {
                            ?>
                            <p>
                                <?php echo $basliginyorumlari['Yorum']; ?>
                            </p>
                            <div id="entryfooter">
                                <a href="#">
                                    <div id="facebook"></div>
                                </a>
                                <a href="#">
                                    <div id="twitter"></div>
                                </a>


                                <?php

                                if (isset($_SESSION['yazarid'])) {
                                    $likekontrol = 0;
                                    $dislikekontrol = 0;

                                    $likesql = mysqli_query($baglan, "SELECT * FROM yorumbegeni WHERE YazarId='{$_SESSION['yazarid']}' AND YorumId='{$basliginyorumlari['YorumId']}' AND BaslikId='{$basliginyorumlari['BaslikId']}'");
                                    while ($like = mysqli_fetch_row($likesql) > 0) {
                                        ?>
                                        <a href="likedislike.php?yid=<?php echo $basliginyorumlari['YorumId']; ?>&bid=<?php echo $basliginyorumlari['BaslikId']; ?>&like">
                                            <div id="likeaktif"></div>
                                        </a>
                                        <?php
                                        $likekontrol = 1;
                                    }
                                    if ($likekontrol == 0) {
                                        ?>
                                        <a href="likedislike.php?yid=<?php echo $basliginyorumlari['YorumId']; ?>&bid=<?php echo $basliginyorumlari['BaslikId']; ?>&like">
                                            <div id="likepasif"></div>
                                        </a>
                                        <?php
                                    }

                                    $dislikesql = mysqli_query($baglan, "SELECT * FROM yorumdislike WHERE YazarId='{$_SESSION['yazarid']}' AND YorumId='{$basliginyorumlari['YorumId']}' AND BaslikId='{$basliginyorumlari['BaslikId']}'");

                                    while ($like = mysqli_fetch_row($dislikesql) > 0) {
                                        ?>
                                        <a href="likedislike.php?yid=<?php echo $basliginyorumlari['YorumId']; ?>&bid=<?php echo $basliginyorumlari['BaslikId']; ?>&dislike">
                                            <div id="dislikeaktif"></div>
                                        </a>
                                        <?php
                                        $dislikekontrol = 1;
                                    }
                                    if ($dislikekontrol == 0) {
                                        ?>
                                        <a href="likedislike.php?yid=<?php echo $basliginyorumlari['YorumId']; ?>&bid=<?php echo $basliginyorumlari['BaslikId']; ?>&dislike">
                                            <div id="dislikepasif"></div>
                                        </a>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a href="#">
                                        <div id="likepasif"></div>
                                    </a>
                                    <a href="#">
                                        <div id="dislikepasif"></div>
                                    </a>
                                    <?php
                                }
                                if (@$_SESSION['rutbe'] == "admin") {
                                    ?>
                                    <a href="sil.php?ys=<?php echo $basliginyorumlari['YorumId']; ?>">
                                        <div id="sikayet">sil</div>
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#">
                                        <div id="sikayet">***</div>
                                    </a>
                                    <?php
                                }
                                ?>

                                <?php
                                $uyeyigetir = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE id='{$basliginyorumlari["YazarId"]}'");
                                $uye = mysqli_fetch_assoc($uyeyigetir);
                                ?>
                                <a href="index.php?profil=<?php echo $uye['nick'] ?>">
                                    <div id="yazar">
                                        <?php
                                        echo $uye['nick'];
                                        ?>
                                    </div>
                                </a>
                                <a href="#">
                                    <div id="tarih">
                                        <?php
                                        echo $basliginyorumlari['YorumGun'] . "." . $basliginyorumlari['YorumAy'] . "." . $basliginyorumlari['YorumTarih'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $basliginyorumlari['YorumSaati'];
                                        ?>
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Böle bişi yok";
                    }
                } else {
                    $basliklarigetirsql;
                    $basliklarsql;
                    $baslik_sayisi = 0;

                    // echo RAND(1,50);
                    $basliklarigetirsql = mysqli_query($baglan, "SELECT * FROM basliklartbl");
                    $basliklarsql = mysqli_query($baglan, "SELECT * FROM basliklartbl");
                    while ($basliklar = mysqli_fetch_assoc($basliklarsql)) {
                        $baslik_dizisi[] = $basliklar['BaslikId'];
                        $baslik_sayisi++;
                    }


                    //   echo var_dump($baslik_dizisi);
                    //    echo "Baslik Sayisi".$baslik_sayisi;


                    $kontrol = 0;
                    if (@$_SESSION['rutbe'] == "admin") {
                        $kontrol = 1;
                    } else {
                        $kontrol = 0;
                    }

                    while ($baslik = mysqli_fetch_assoc($basliklarigetirsql)) {

                        $rastgele_indis_baslik = rand(0, $baslik_sayisi - 1);
                        //  echo "Rast Baslik".$baslik_dizisi[$rastgele_indis];
                        $indisegorebliksql = mysqli_query($baglan, "SELECT BaslikAdi FROM basliklartbl WHERE BaslikId='{$baslik_dizisi[$rastgele_indis_baslik]}'");
                        $indisegorebaslik = mysqli_fetch_assoc($indisegorebliksql);
                        ?>

                        <li>
                            <a href="index.php?b=<?php echo $baslik_dizisi[$rastgele_indis_baslik] ?>&sayfa=1"
                               id="baslik">
                                <?php
                                echo $indisegorebaslik['BaslikAdi'];
                                if ($kontrol == 1) {
                                    ?><a href="sil.php?bs=<?php echo $baslik_dizisi[$rastgele_indis_baslik]; ?>">
                                        basliksil</a><?php
                                }
                                ?>
                            </a>

                            <p>
                                <?php

                                $yorumgetir1 = mysqli_query($baglan, "SELECT YorumId FROM yorumlartbl WHERE BaslikId='{$baslik_dizisi[$rastgele_indis_baslik]}'");
                                $satir_sayisi = 0;
                                $dizi = array();
                                while ($yorum1 = mysqli_fetch_assoc($yorumgetir1)) {
                                    $dizi[] = $yorum1['YorumId'];
                                    $satir_sayisi++;
                                }

                                if ($satir_sayisi - 1 > 0) {
                                    $rastgele_indis = rand(0, $satir_sayisi - 1);
                                } else {
                                    $rastgele_indis = 0;
                                }
                                //echo $satir_sayisi;
                                //echo $dizi[$rastgele_indis];


                                if (!$dizi[$rastgele_indis]) {
                                    $dizi[$rastgele_indis] = 0;
                                }


                                $yorumgetir = mysqli_query($baglan, "SELECT * FROM yorumlartbl WHERE BaslikId='{$baslik_dizisi[$rastgele_indis_baslik]}' AND YorumId='{$dizi[$rastgele_indis]}'");
                                if ($yorumgetir) {
                                    $yorum = mysqli_fetch_assoc($yorumgetir);
                                    echo $yorum['Yorum'];
                                }


                                ?>
                            </p>
                            <div id="entryfooter">

                                <a href="#">
                                    <div id="facebook"></div>
                                </a>
                                <a href="#">
                                    <div id="twitter"></div>
                                </a>
                                <a href="#">
                                    <div id="likepasif"></div>
                                </a>
                                <a href="#">
                                    <div id="dislikepasif"></div>
                                </a>


                                <?php
                                if (@$_SESSION['rutbe'] == "admin") {
                                    ?>
                                    <a href="sil.php?ys=<?php echo $yorum['YorumId']; ?>">
                                        <div id="sikayet">sil</div>
                                    </a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#">
                                        <div id="sikayet">***</div>
                                    </a>
                                    <?php
                                }
                                ?>

                                <?php
                                $uyeyigetir = mysqli_query($baglan, "SELECT * FROM uyelertbl WHERE id='{$yorum["YazarId"]}'");
                                $uye = mysqli_fetch_assoc($uyeyigetir);
                                ?>
                                <a href="index.php?profil=<?php echo $uye['nick'] ?>">
                                    <div id="yazar">
                                        <?php
                                        echo $uye['nick'];
                                        ?>
                                    </div>
                                </a>
                                <a href="#">
                                    <div id="tarih">
                                        <?php
                                        echo $yorum['YorumGun'] . "." . $yorum['YorumAy'] . "." . $yorum['YorumTarih'] . "&nbsp;&nbsp;&nbsp;&nbsp;" . $yorum['YorumSaati'];
                                        ?>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <?php
                    }
                }
            }
            ?>
            </ul>

            <?php //&& $_SESSION['oturum']=="acik")
            include("yeniyorumekle.php");
        }
        ?>
        <div id="footer">
            <?php
            $sorgu = mysqli_query($baglan, "SELECT * FROM altmenu");
            while ($goster = mysqli_fetch_assoc($sorgu)) {
                ?>
                <a href="#" class="menulink"> <?php echo $goster["menu"] ?> </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>