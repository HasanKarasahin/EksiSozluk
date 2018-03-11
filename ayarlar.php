<?php
    $baglan=@mysqli_connect("localhost","root","","eksisozlukdb");
	mysqli_set_charset($baglan,"utf8");
	mysqli_query($baglan,"SET NAMES 'utf8' COLLATE 'utf8_turkish_ci'");
    date_default_timezone_set('Europe/Istanbul');
?>
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>


	
	
	
	
	
	
	