<?php
if(isset($_POST['searchbuton']))
{
    $aranan=$_POST['search'];
	
	
    $arananbasliksql=mysqli_query($baglan,"SELECT * FROM basliklartbl WHERE BaslikAdi LIKE '%$aranan%'");
	
	
    $arananyorumsql=mysqli_query($baglan,"SELECT * FROM yorumlartbl WHERE Yorum LIKE '%$aranan%'");
    $arananyazarsql=mysqli_query($baglan,"SELECT * FROM uyelertbl WHERE nick LIKE '%$aranan%'");
    $say=0;
}
?>
<h1>
    Baslik
</h1>
<ul>
    <?php 
     while($arananbaslik=mysqli_fetch_assoc($arananbasliksql))
      {
         ?> 
        <li>
            <a href="index.php?b=<?php echo $arananbaslik['BaslikId'];?>&sayfa=1">
        <?php
                echo $arananbaslik['BaslikAdi'];
                $say++;
         ?>
             </a>
        </li>
       
        <?php
      }
        if($say==0)
        {
            echo "Böyle bir başlık yok";
        }   
    ?>
</ul>
<h1>Yorum</h1>
<ul>
    <?php 
     $say=0;
     while($arananyorum=mysqli_fetch_assoc($arananyorumsql))
      {
         $arananhangisayfadasql=mysqli_query($baglan,"SELECT COUNT(*) FROM yorumlartbl WHERE BaslikId={$arananyorum['BaslikId']} AND YorumId<={$arananyorum['YorumId']}");
         
         $hangisayfada=mysqli_fetch_array($arananhangisayfadasql);
         $hangisayfada[0]= ceil($hangisayfada[0]/10);
         
         ?> 
        <li>
            <a href="index.php?b=<?php echo $arananyorum['BaslikId'];?>&sayfa=<?php echo $hangisayfada[0] ?>">
        <?php
                echo $arananyorum['Yorum'];
                $say++;
         ?>
             </a>
        </li>
       
        <?php
      }
        if($say==0)
        {
            echo "Böyle bir Yorum yok";
        }
    ?>
</ul>
<h1>
Yazarlar
</h1>
<ul>
    <?php 
     $say=0;
     while($arananyazar=mysqli_fetch_assoc($arananyazarsql))
      {
         ?> 
        <li>
            <a href="index.php?profil=<?php echo $arananyazar['nick']; ?>">
        <?php
                echo $arananyazar['nick'];
                $say++;
         ?>
             </a>
        </li>
        <?php
      }
        if($say==0)
        {
            echo "Böyle bir Yazar yok";
        }
    ?>
</ul>
