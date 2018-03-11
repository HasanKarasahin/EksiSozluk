<script type="text/javascript">
function asagikaydir()
{
var scrollheight = 6000;
document.getElementById("aliciilemesajlasma").scrollTop = scrollheight;
}
window.onload = asagikaydir;
</script>

<?php 
    if($_SESSION['oturum']=="acik")
    {
        if(isset($_POST['mesajgonder']))
        {
            $mesaj=$_POST['mesaj'];
            $saat=date('H:i:s');
            $mesajekle=mysqli_query($baglan,"INSERT INTO mesajlar(AliciId,GondericiId,MesajGun,MesajAy,MesajYil,Mesaj,zaman,gorulme) VALUES('{$_SESSION["aliciid"]}','{$_SESSION["yazarid"]}','07','04','2017','{$mesaj}','22:25:17','1')");
            if($mesajekle)
            {
                 header("Location:index.php?mesaj");
            }
            else
            {
                echo "Mesaj Gönderilemedi";
            }
        }
        else
        {
                  ?>
<div class="genel">
<div class="mesajkutusu">
    <ul>
        <?php
            
            $kisilerimsql=mysqli_query($baglan,"SELECT * FROM uyelertbl WHERE id IN(SELECT takipedilen FROM badi WHERE takipeden='{$_SESSION['yazarid']}')");
            
            
            
            ?><form action="" method="POST"><?php
            while($kisilerim=mysqli_fetch_assoc($kisilerimsql))
            {
                $sql=mysqli_query($baglan,"SELECT AliciId FROM mesajlar WHERE gorulme='1' AND AliciId='{$_SESSION['yazarid']}' AND  GondericiId='{$kisilerim['id']}' ");
                
                if($kisi=mysqli_fetch_row($sql)>0)
                {
                     ?>
                    <li>
                        <input id="okunmamis" type="submit" name="okunmamiskisi" value='<?php echo $kisilerim['nick']; ?>'/>
                    </li>
                    <?php
                }
                else
                {
                     ?>
                    <li>
                        <input id="okunmus" type="submit" name="okunmuskisi" value='<?php echo $kisilerim['nick']; ?>'/>
                    </li>
                   <?php
                }
            }
            ?>
        <h3>
        <p>Diger Kutusu :</p>
        </h3>
            <?php
            $digerkisilersql=mysqli_query($baglan,"SELECT * FROM uyelertbl WHERE id NOT IN(SELECT takipedilen FROM badi WHERE takipeden='{$_SESSION['yazarid']}')");
            while($digerkisiler=mysqli_fetch_assoc($digerkisilersql))
            {
                $okunmamissql=mysqli_query($baglan,"SELECT AliciId FROM mesajlar WHERE gorulme='1' AND AliciId='{$_SESSION['yazarid']}' AND  GondericiId='{$digerkisiler['id']}' ");
                
                 $okunmussql=mysqli_query($baglan,"SELECT AliciId FROM mesajlar WHERE gorulme='0' AND AliciId='{$_SESSION['yazarid']}' AND  GondericiId='{$digerkisiler['id']}' ");
                
                if($kisi=mysqli_fetch_row($okunmamissql)>0)
                {
                     ?>
                    <li>
                        <input id="okunmamis" type="submit" name="okunmamiskisi" value='<?php echo $digerkisiler['nick']; ?>'/>
                    </li>
                    <?php
                }
                else if($kisi=mysqli_fetch_row($okunmussql)>0)
                {
                     ?>
                    <li>
                        <input id="okunmus" type="submit" name="okunmuskisi" value='<?php echo $digerkisiler['nick']; ?>'/>
                    </li>
                    <?php
                }
            }  
        ?>
        </form>
    </ul>
</div>
<div class="Mesaj">
   
    <div id="mesajlar">
        <div id="alici">
            alici adi : <?php 
            if(isset($_POST['okunmamiskisi']))
            {   
                $goruldusql=mysqli_query($baglan,"UPDATE mesajlar SET gorulme='0' WHERE gorulme='1' AND AliciId='{$_SESSION['yazarid']}' AND  GondericiId IN(SELECT id FROM uyelertbl WHERE nick='{$_POST['okunmamiskisi']}')");
                echo $_POST['okunmamiskisi'];
                $_SESSION['mesajatilacakkisi']=$_POST['okunmamiskisi'];
                 header("Location:index.php?mesaj");
            }
            else if(isset($_POST['okunmuskisi']))
            {   
                echo $_POST['okunmuskisi'];
                $_SESSION['mesajatilacakkisi']=$_POST['okunmuskisi'];
            }
            else if(isset($_SESSION['mesajatilacakkisi']))
            {
                echo $_SESSION['mesajatilacakkisi'];   
            }
            ?>
        </div>
        <div id="aliciilemesajlasma">
            <?php 
                $aliciidsql=mysqli_query($baglan,"SELECT id FROM uyelertbl WHERE nick='{$_SESSION["mesajatilacakkisi"]}'");
                $aliciid=mysqli_fetch_assoc($aliciidsql);//alicinin id si
                $_SESSION['aliciid']=$aliciid['id'];
                $mesajlarsql=mysqli_query($baglan,"SELECT * FROM mesajlar WHERE AliciId IN('{$aliciid["id"]}','{$_SESSION["yazarid"]}') AND GondericiId IN('{$_SESSION["yazarid"]}','{$aliciid["id"]}')");
            ?>
            <ul><?php
              while($mesajlar=mysqli_fetch_assoc($mesajlarsql)){
                  $mesajigonderensql=mysqli_query($baglan,"SELECT nick FROM uyelertbl WHERE id='{$mesajlar['GondericiId']}'");
                  $mesajigonderen=mysqli_fetch_assoc($mesajigonderensql);
                ?>
                      <?php 
                  
                        if($mesajigonderen['nick']==$_SESSION['nick'])
                        {
                         ?>
                        <li id="gonderenstil">
                        <?php
                        }
                        else
                        {
                        ?>
                        <li id="alicistil">
                        <?php
                        }
                        echo $mesajlar['Mesaj']."-->".$mesajigonderen['nick']
                        ?>
                    </li>
                <?php
              }
            ?></ul><?php
            ?>
        </div>
    </div>
     <div id="gonderdiv">
        <form action="" method="POST">
            <textarea cols="90" rows="3" name="mesaj"></textarea>
            <input type="submit" name="mesajgonder" value="gonder"/> 
        </form>
    </div>
</div>
    <div class="clear">
    
    </div>
</div>
        <?php
    }  
        }
    else
    {
         header("Location:index.php?git=giris");
    }
?>

































