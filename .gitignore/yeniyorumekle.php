<?php 
            if(isset($_GET["b"]) && (@$_SESSION['oturum']=="acik") )
            {
                $banlimisql=mysqli_query($baglan,"SELECT ban FROM uyelertbl WHERE id='{$_SESSION['yazarid']}'");
            $banlimi=mysqli_fetch_assoc($banlimisql);
                ?>
                    <div class="Yorumdiv">
                    <form action="" method="post">
                        <textarea  name="yeniyorum" rows="8" cols="84px" maxlength="535px"  <?php if($banlimi['ban']==1){?> disabled placeholder="Ban Yedin Za.." style=" text-align:center ; font-size: 54px ;resize:none;"<?php } ?> ></textarea>
                        <input type="submit" name="yeniyorumgeldi" value="yolla" <?php if($banlimi['ban']==1){?> disabled<?php } ?> />
                    </form>
                    </div>
                <?php
            }
            
            if(@$_POST['yeniyorumgeldi'])
            {
                /*
                //$yeniyorumsql=mysqli_query($baglan,"Insert Yorum");
                echo date('d');//İki haneli şeklinde günü verir
                echo date('m');//İki haneli şeklinde ayı verir
                echo date('Y');//Dört haneli şeklinde yılı verir
                echo date('H');//İki haneli ve 24 saat formatında saati verir
                echo date('i');//İki haneli şeklinde dakikayı verir
                echo date('s');//İki haneli şeklinde saniyeyi verir
                */
              
            $_POST['yeniyorum']=trim($_POST['yeniyorum']);
            if(empty($_POST['yeniyorum']))
            {
            }
            else
            {
                $yeniyorum=$_POST['yeniyorum'];
                $saat=date('H').":".date('i').":".date('s');
                $gun=date('d');
                $ay=date('m');
                $yil=date('Y');
                $baslik_id=$_GET["b"];
                $yeniyorumeklesql=mysqli_query($baglan,"INSERT INTO yorumlartbl(Yorum,YorumTarih,YorumAy,YorumGun,YorumSaati,YazarId,BaslikId) VALUES('{$yeniyorum}','{$yil}','{$ay}','{$gun}','{$saat}','{$_SESSION['yazarid']}','{$baslik_id}')");
            if($yeniyorumeklesql)
            {
               // header("Location:index.php?b={$_GET["b"]}");
                header("refresh:0");
            }
            else
            {
                phpAlert("Hata");
            }    
        }
   
    }
?>
