<?php session_start();
ob_start();
include_once("ayarlar.php"); ?>
    <html>
    <head>
        <title>ekşi sözlük - kutsal bilgi kaynagi </title>
        <meta charset="utf-8" data-is-mobile="true" id="eksi">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="shortcut icon" href="./images/yesildamla.png"/>
        <link rel="stylesheet" type="text/css"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic,600&subset=latin,latin-ext">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    </head>
    <body>
    <div id="container">
        <div id="header">
            <div id="header_content">
                <a href="index.php">
                    <div id="logo"></div>
                </a>

                <div id="search">
                    <form action="" method="POST">
                        <input type="text" name="search" placeholder="başlık,#entry yada @yazar" required/>
                        <input type="submit" name="searchbuton" value=""/>
                    </form>
                </div>

                <?php
                if (@$_SESSION['oturum'] == "acik") {
                    if (isset($_POST["cikis"])) {
                        $_SESSION['oturum'] = "kapali";
                        $_SESSION['rutbe'] = "";
                        $_SESSION['yazarid'] = "";
                        $_SESSION['nick'] = "";
                        session_destroy();
                        header("Location:index.php");
                    } else {
                        ?>
                        <form action="" method="POST">
                            <a href="index.php" class="profillink">
                                <input type="submit" name="cikis" id="cikisbuton" value="***"/>
                            </a>
                            <a href="index.php?git=giris" class="profillink" name="deneme" style="cursor:pointer">
                                olay
                            </a>

                            <a href="index.php?mesaj" class="profillink">
                                <div id="mesajdiv">mesaj</div>
                            </a>

                            <a href="index.php?profil=<?php echo $_SESSION['nick'] ?>" class="profillink">
                                <img src="./images/ben.png"/ id="benicon">ben
                            </a>
                        </form>
                        <?php
                    }

                } else {
                    ?>
                    <form>
                        <a href="index.php?git=kayit" class="headerustlink">
                            kayit ol
                        </a>
                        <a href="index.php?git=giris" class="headerustlink">
                            giriş
                        </a>
                    </form>
                    <?php
                }
                ?>
                <div class="clear"></div>
                <div id="menu">
                    <form action="" method="POST">
                        <?php

                        $sorgu = sqlUstMenu($baglan, @$_SESSION['oturum']);

                        while ($goster = mysqli_fetch_assoc($sorgu)) {
                            ?>
                            <a href="index.php?<?php echo 'm=' . $goster['menu'] ?>" class="menulink"><input
                                        type="submit" class="linkbutonlari" name="m"
                                        value="<?php echo $goster["menu"] ?>"/></a>
                            <?php
                        }
                        if (isset($_POST["girisbuton"])) {
                            header("Refresh: 1; url=index?git=isim");
                        }
                        ?>
                    </form>
                </div>
                <a href="#">
                    <div id="altlogo"></div>
                </a>
            </div>
        </div>
        <?php include_once("content.php"); ?>
    </div>
    </body>
    </html>
<?php ob_end_flush(); ?>