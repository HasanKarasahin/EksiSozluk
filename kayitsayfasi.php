<form action="" method="POST">  
				<div id="kayitdiv">
					<h1>yeni kullanıcı kaydı</h1>
					<p>nick</p>
					<input type="text" name="yenikullaniciadi" required/>
					<p>e-mail</p>
					<input type="text" name="email" required/>
					<p>doğum tarihi</p>
					<select name="gun">
                        <?php 
                            for($i=1;$i<32;$i++)
                            {
                                ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                            }
                        ?>
					</select>
					<select name="ay">
						<option value="ocak">Ocak</option>
						<option value="subat">Subat</option>
						<option value="mart">Mart</option>
						<option value="nisan">Nisan</option>
						<option value="nisan">Mayis</option>
						<option value="nisan">Haziran</option>
						<option value="nisan">Temmuz</option>
						<option value="nisan">Agustos</option>
						<option value="nisan">Eylül</option>
						<option value="nisan">Ekim</option>
						<option value="nisan">Kasim</option>
						<option value="nisan">Aralik</option>
					</select>
					<select name="yil">
						
						 <?php 
                            for($i=2017;$i>1980;$i--)
                            {
                                ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                            }
                        ?>
					</select>
					<p>cinsiyet</p>
					<select name="cinsiyet">
						<option value="Kadin">Kadin</option>
						<option value="Erkek">Erkek</option>
					</select>
					<p>hesap güvenliğiniz açısından şifrenizin <strong> diğer sitelerde kullandığınız şifrelerden farklı olmasını</strong> tavsiye ederiz.</p>
					<p>şifre</p>
					<input type="password" name="yenisifre" required/><br/><br/>
					<p>en az 1 küçük harf</p>
					<p>en az 1 büyük harf</p>
					<p>en az 1 rakam</p>
					<p>en az 8 karakter</p>
					<p>şifre(tekrar)</p>
					<input type="password" name="yenisifretekrar" required/><br/><br/>
					<input type="checkbox" name="sartlar" value="onaylandi"><a href="sartlar.php" onclick="this.target='_blank'">ekşi sözlük kullanıcı sözleşmesi</a>ni okudum ve kabul ediyorum<br><br/>
					<input type="submit" name="kayitbuton" value="kayit ol işte böyle"/><br/><br/><br/><br/>
				</div>
				</form>
				<?php
				
					if(isset($_POST["kayitbuton"]))
		{
			$kullaniciadi=$_POST["yenikullaniciadi"];
			$email=$_POST["email"];
			$gun=$_POST["gun"];
			$ay=$_POST["ay"];
			$yil=$_POST["yil"];
			$cinsiyet=$_POST["cinsiyet"];
			$yenisifre=$_POST["yenisifre"];
			$yenisifretekrar=$_POST["yenisifretekrar"];
			$sartonay=@$_POST["sartlar"];
			$kullaniciara=mysqli_query($baglan,"SELECT nick FROM uyelertbl WHERE nick='$kullaniciadi'");
			if(mysqli_fetch_row($kullaniciara)>0)
			{
				phpAlert("Boyle Biri Var,Baska Bir kullanici ismi bul");
			}
			else
			{
				$emailara=mysqli_query($baglan,"SELECT email FROM uyelertbl WHERE email='$email'");
				if(mysqli_fetch_row($emailara)>0)
				{
				phpAlert("Boyle Bir Mail Adresi Kullaniliyor");
				}
				else
				{	
				if($yenisifre==$yenisifretekrar)
				{
			$uyeekle=mysqli_query($baglan,"INSERT INTO uyelertbl(nick,sifre,email,gun,ay,yil) values('$kullaniciadi','$yenisifre','$email','$gun','$ay','$yil')");
			if($uyeekle)
			{
				phpAlert("Üye Oldun");
			}
				else
			{
				phpAlert("Üye Olamadin");
			}
			}
			else
			{
				phpAlert("Şifreler Eşleşmiyor");
			}
		}
			}
		}
				
				?>














