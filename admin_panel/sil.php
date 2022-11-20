<!DOCTYPE html>
<?php
    include "database.php";
    session_start();
    if(!$_SESSION)
    {
        echo "<script> alert ('ADMİNE ÖZELDİR!'); </script>";
        header("refresh:0;url=index.php");
    }
    else{
         
?>
<html>
<head>
<meta charset="utf-8">
<title>EKOBİM</title>
<link rel="stylesheet"  href="css/reset.css">
<link rel="stylesheet"  href="css/style.css">
</head>
<body>
<?php
function remove_dir($dir)
{
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object)
        {
            if ($object != "." && $object != "..")
            {
                if (is_dir($dir. "/" . $object)) {
                    remove_dir($dir . "/" . $object);
                } else {
                    unlink($dir . "/" . $object);
                }
            }
        }
        rmdir($dir);
   }
}
 ?>
<?php $yer=$_GET['yer']; $sil=$_GET['sil'];
    if($yer=='os' or $yer=='og'){
        $oyun=$_GET['oyun'];
        if($yer=='os'){
            $bul=mysqli_fetch_array(mysqli_query($db,"select * from game_slider where GameSlider_Id='".$sil."' and Game_Id=".$oyun));
            unlink('../assets/img/oyun'.$oyun.'/slider/'.$bul['GameSlider_img']);
            mysqli_query($db,"delete from game_slider where Game_Id=".$oyun." and GameSlider_Id=".$sil);
        }
        else{
            $bul=mysqli_fetch_array(mysqli_query($db,"select * from game_galery where GameGalery_name='".$sil."' and Game_Id=".$oyun));
            unlink('../assets/img/oyun'.$oyun.'/galeri/'.$bul['GameGalery_img']);
            mysqli_query($db,"delete from game_galery where Game_Id=".$oyun." and GameGalery_name='".$sil."'");
        }
        header('Location:oyun.php?oyun='.$oyun);
    }else if($yer=='m'){
		mysqli_query($db,"delete from contact_message where Message_Id ='".$sil."'");
        header('Location:mesaj.php');
	}else if($yer=='g'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from galery where Galery_name='".$sil."'"));
        unlink('../assets/img/galery/'.$bul['Galery_img']);
		mysqli_query($db,"delete from galery where Galery_name='".$sil."'");
        header('Location:galeri.php');
	}else if($yer=='b'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from blog where Blog_Id='".$sil."'"));
        unlink('../assets/img/blog/'.$bul['Blog_img']);
		mysqli_query($db,"delete from blog where Blog_Id='".$sil."'");
        header('Location:blog.php');
	}else if($yer=='a'){
        $bul=mysqli_fetch_array(mysqli_query($db,"select * from slider where Slider_Id='".$sil."'"));
        unlink('../assets/img/slide/'.$bul['Slider_img']);
        mysqli_query($db,"delete from slider where Slider_Id='".$sil."'");
        header('Location:anasayfa.php');
    }else if($yer=='o'){
        $galery=mysqli_fetch_array(mysqli_query($db,"select * from game_galery where Game_Id='".$sil."'"));
        $slider=mysqli_fetch_array(mysqli_query($db,"select * from game_slider where Game_Id='".$sil."'"));
        $text=mysqli_fetch_array(mysqli_query($db,"select * from game_text where Game_Id='".$sil."'"));
        remove_dir('../assets/img/oyun'.$text['Game_Id']);
        if(isset($text)){
            mysqli_query($db,"delete from game_text where Game_Id='".$sil."'");
        }
        if(isset($slider)){
            mysqli_query($db,"delete from game_slider where Game_Id='".$sil."'");
        }
        if(isset($galery)){
            mysqli_query($db,"delete from game_galery where Game_Id='".$sil."'");
        }
        mysqli_query($db,"delete from game where Game_Id='".$sil."'");
        header('Location:oyunlar.php');
    }
			    
?>
</body>
</html>
<?php } ?>