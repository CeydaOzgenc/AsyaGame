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
	$yer=$_GET['yer']; $duzen=$_GET['duzen'];
	$dosyaad="";
	if($yer!="ogg"){
		$dosyaad=$_FILES["dosya"]["name"];
	}
	if ($dosyaad!=""){
		if($yer=='g'){
			$dosyayol="../assets/img/galeri/".$dosyaad;
		}
		else if($yer=='b'){
			$dosyayol="../assets/img/blog/".$dosyaad;
		}
		else if($yer=='og'){
			$oyun=$_GET['oyun'];
			$dosyayol="../assets/img/oyun".$oyun."/galeri/".$dosyaad;
		}
		$dtip=$_FILES["dosya"]["type"];
		if($dtip="image/jpg" or $dtip="image/png" or $dtip="image/gif")
		{
			if(is_uploaded_file($_FILES["dosya"]["tmp_name"])){
				$tasi=move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyayol);
				  if($tasi){
				  		if($yer=='g'){
				  			mysqli_query($db,"update galery set Galery_img='".$dosyaad."', Galery_name='".p('resim_isim')."' where Galery_name='".$duzen."'");
						 	header('Location:galeri.php');
				  		}else if($yer=='b'){
				  			mysqli_query($db,"update blog set Blog_img='".$dosyaad."', Blog_category='".p('blog_katagori')."', Blog_title='".p('blog_baslik')."', Blog_text='".p('blog_yazi')."', Blog_author='".p('blog_yazar')."', Blog_time='".p('blog_zaman')."'where Blog_Id=".$duzen);
						 	header('Location:blog.php');
				  		}else if($yer=='og'){
						 	mysqli_query($db,"update game_galery set GameGalery_img='".$dosyaad."', GameGalery_name='".p('foto_isim')."' where GameGalery_name='".$duzen."' and Game_Id=".$oyun);
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
		if($yer=='g'){
			mysqli_query($db,"update galery set Galery_name='".p('resim_isim')."' where Galery_name='".$duzen."'");
			header('Location:galeri.php');
		}
		else if($yer=='b'){
			mysqli_query($db,"update blog set Blog_category='".p('blog_katagori')."', Blog_title='".p('blog_baslik')."', Blog_text='".p('blog_yazi')."', Blog_author='".p('blog_yazar')."', Blog_time='".p('blog_zaman')."' where Blog_Id=".$duzen);
			header('Location:blog.php');
		}
		else if($yer=='og'){
			$oyun=$_GET['oyun'];
			mysqli_query($db,"update game_galery set GameGalery_name='".p('foto_isim')."' where GameGalery_name='".$duzen."' and Game_Id=".$oyun);
			header('Location:oyun.php?oyun='.$oyun);
		}else if($yer=='ogg'){
			$oyun=$_GET['oyun'];
			mysqli_query($db,"update game_googleapp set GameGoogle_Link='".p('game_link')."' where GameGoogle_Id=".$duzen);
			header('Location:oyun.php?oyun='.$oyun);
		}
	}
	
}?>