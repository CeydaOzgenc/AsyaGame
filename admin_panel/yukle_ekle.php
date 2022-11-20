<?php
	session_start();
	if(!$_SESSION)
	{
		echo "<script> alert ('ADMİNE ÖZELDİR!'); </script>";
		header("refresh:0;url=index.php");
	}
	else{
?>
<?php
	include "database.php";
	$yer=$_GET['yer'];
	if($yer!='o'){
		$dosyaad=$_FILES["dosya_ekle"]["name"];
	if ($_FILES["dosya_ekle"]["name"]!=""){
		if($yer=='g'){	
			$dosyayol="../assets/img/galeri/".$dosyaad;
		}else if($yer=='b'){
			$dosyayol="../assets/img/blog/".$dosyaad;
		}else if($yer=='a'){
			$dosyayol="../assets/img/slide/".$dosyaad;
		}else if($yer=='og'){
			$oyun=$_GET['oyun'];
			$dosyayol="../assets/img/oyun".$oyun."/galeri/".$dosyaad;
		}else if($yer=='os'){
			$oyun=$_GET['oyun'];
			$dosyayol="../assets/img/oyun".$oyun."/slider/".$dosyaad;
		}
		$dtip=$_FILES["dosya_ekle"]["type"];
		if($dtip="image/jpg" or $dtip="image/png" or $dtip="image/gif")
		{
			if(is_uploaded_file($_FILES["dosya_ekle"]["tmp_name"])){
				$tasi=move_uploaded_file($_FILES["dosya_ekle"]["tmp_name"],$dosyayol);
				  if($tasi){
				  		if($yer=='g'){
				  			if(p('resim_ekle_isim')!=""){
				  				mysqli_query($db,"insert into galery(Galery_img,Galery_name) values('$dosyaad','".p('resim_ekle_isim')."')");
						 		header('Location:galeri.php');
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=g");
				  			}
				  			
				  		}else if($yer=='b'){
				  			if(p('blog_ekle_katagori')!="" and p('blog_ekle_baslik')!="" and p('blog_ekle_yazi')!="" and p('blog_ekle_yazar')!="" and p('blog_ekle_zaman')!=""){
				  				mysqli_query($db,"insert into blog(Blog_img,Blog_category,Blog_title,Blog_text,Blog_author,Blog_time) values('$dosyaad','".p('blog_ekle_katagori')."', '".p('blog_ekle_baslik')."','".p('blog_ekle_yazi')."','".p('blog_ekle_yazar')."','".p('blog_ekle_zaman')."')");
						 		header('Location:blog.php');
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=b");
				  			}
				  		}else if($yer=='a'){
				  			mysqli_query($db,"insert into slider(Slider_img) values('$dosyaad')");
						 	header('Location:anasayfa.php');
				  		}else if($yer=='og'){
				  			if(p('foto_ekle_isim')!=""){
				  				mysqli_query($db,"insert into game_galery(GameGalery_img,GameGalery_name,Game_Id) values('$dosyaad','".p('foto_ekle_isim')."',".$oyun.")");
						 		header('Location:oyun.php?oyun='.$oyun);
				  			}
				  			else{
				  				echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
				  				header("refresh:0;url=ekle.php?yer=og&oyun=".$oyun);
				  			}
				  		}else if($yer=='os'){
				  			mysqli_query($db,"insert into game_slider(GameSlider_img,Game_Id) values('$dosyaad',".$oyun.")");
						 	header('Location:oyun.php?oyun='.$oyun);
				  		}
					  }
				}
		}
		else {
			echo "Yanlış Dosya Tipi";
		}
	}
	else{
		echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
		if($yer=='g'){
			header("refresh:0;url=ekle.php?yer=g");
		}else if($yer=='b'){
			header("refresh:0;url=ekle.php?yer=b");
		}else if($yer=='a'){
			header("refresh:0;url=ekle.php?yer=a");
		}else if($yer=='og'){
			$oyun=$_GET['oyun'];
			header("refresh:0;url=ekle.php?yer=og&oyun=".$oyun);
		}else if($yer=='os'){
			$oyun=$_GET['oyun'];
			header("refresh:0;url=ekle.php?yer=os&oyun=".$oyun);
		}
		
	}
	}
	else{
		if(p('oyun_isim')!=""){
			mysqli_query($db,"insert into game(Game_name) values('".p('oyun_isim')."')");
			$id=mysqli_fetch_array(mysqli_query($db,"select * from game ORDER BY Game_Id DESC LIMIT 1"));
			mkdir('../assets/img/oyun'.$id['Game_Id'],'0777');
			mkdir('../assets/img/oyun'.$id['Game_Id'].'/galeri','0777');
			mkdir('../assets/img/oyun'.$id['Game_Id'].'/slider','0777');
			header('Location:oyunlar.php');
		}
		else{
			echo "<script>alert('Bütün alanlar doldurulmalıdır.')</script>";
			header("refresh:0;url=ekle.php?yer=o");
		}
	}	
}?>