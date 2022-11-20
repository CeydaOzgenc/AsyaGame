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
            $sayfa=mysqli_query($db,"select * from game order by  Game_Id ");
            $oyun=$_GET['oyun'];
            $sqlyazi=mysqli_fetch_array(mysqli_query($db,"select * from game_text where Game_Id=".$oyun));
            $sqlslider=mysqli_query($db,"select * from game_slider where Game_Id=".$oyun);
            $sqlgaleri=mysqli_query($db,"select * from game_galery where Game_Id=".$oyun);
            $sqlgoogle=mysqli_fetch_array(mysqli_query($db,"select * from game_googleapp where Game_Id=".$oyun));
            
            if(p("btngnc")=="Güncelle")
            {
                $title=p("game_title");
                $text=p("game_text");
                    header("refresh:0;url=oyun.php?oyun=$oyun");
                if (isset($sqlyazi)){
                    mysqli_query($db,"update game_text set GameText_title='".$title."', GameText_text='".$text."'where Game_Id=".$oyun);
                }else{
                    mysqli_query($db,"insert into game_text(GameText_title,GameText_text,Game_Id) values('$title','$text',$oyun)");
                }
                header("refresh:0;url=oyun.php?oyun=$oyun");
            }
            if(p("guncelle")=="Güncelle")
            { 
                if (isset($sqlgoogle)){
                    mysqli_query($db,"update game_googleapp set GameGoogle_Puan='".p("game_puan")."', GameGoogle_Yorum='".p("game_yorum")."'where Game_Id=".$oyun);
                }else{
                    mysqli_query($db,"insert into game_googleapp(GameGoogle_Puan,GameGoogle_Yorum,Game_Id) values('".p("game_puan")."','".p("game_yorum")."',$oyun)");
                }
                 header("refresh:0;url=oyun.php?oyun=$oyun");
            }
            if(p("duzen")=="Düzenle")
            { 
                if (isset($sqlgoogle)){
                    header("refresh:0;url=duzen.php?yer=ogg&oyun=$oyun&duzen=".$sqlgoogle['GameGoogle_Id']);
                }else{
                    mysqli_query($db,"insert into game_googleapp(GameGoogle_Link,Game_Id) values('asyagame.com',$oyun)");

                }
            }
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ASYA GAME | ADMİN</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand bg-ozel">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="anasayfa.php"><?php echo $_SESSION ["login_name"]; ?></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" >
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="cikis.php">Çıkış</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion nav-ozel" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="anasayfa.php">
                                Anasayfa
                            </a>
                            <a class="nav-link" href="hakkinda.php">
                                Hakkımızda
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                Oyunlar
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="oyunlar.php">Tümü</a>
                                    <?php while ($sayfalar=mysqli_fetch_array($sayfa)){ ?>
                                    <a class="nav-link" href="<?php echo 'oyun.php?oyun='.$sayfalar['Game_Id'] ?>"><?php echo $sayfalar['Game_name'] ?></a>
                                    <?php } ?>
                                </nav>
                            </div>
                            <a class="nav-link" href="blog.php">
                                Blog
                            </a>
                            <a class="nav-link" href="galeri.php">
                                Galeri
                            </a>
                            <a class="nav-link" href="iletisim.php">
                                iletişim
                            </a>
                            <a class="nav-link" href="mesaj.php">
                                Mesajlar
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <br>
                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-header">
                                        <h2>Oyun Galerisi<h2>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>Fotoğraf Adı</th>
                                                    <th>Fotoğraf</th>>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Fotoğraf Adı</th>
                                                    <th>Fotoğraf</th>>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            <?php while ($kayit=mysqli_fetch_array($sqlgaleri)){ ?>
                                                <tr>
                                                    <td><?php echo $kayit["GameGalery_name"]; ?></td>
                                                    <td><img class="admin_img" src="../assets/img/oyun<?php echo $kayit['Game_Id']; ?>/galeri/<?php echo $kayit['GameGalery_img']; ?>"/></td>
                                                    <td>
                                                        <a href="<?php echo "duzen.php?yer=og&oyun=".$oyun."&duzen=".$kayit["GameGalery_name"] ?>">
                                                            <input class="btn btn-primary" type="submit" value="Düzenle">
                                                        </a>

                                                        <a href="<?php echo "sil.php?yer=og&oyun=".$oyun."&sil=".$kayit["GameGalery_name"] ?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white " href="<?php echo 'ekle.php?yer=og&oyun='.$oyun; ?>">Yeni Ekle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-6">
                                <div class="card text-white mb-4">
                                    <form method="post" >
                                        <div class="card-header">
                                            <h2>Oyun Yazısı</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-xl-8 col-md-6" style="color:#000; margin: 2%;">
                                                <a href="<?php if (isset($sqlgoogle)){echo "https://".$sqlgoogle['GameGoogle_Link'];}else{echo "https://asyagame.com";} ?>" target="_blank"><?php if (isset($sqlgoogle)){echo "https://".$sqlgoogle['GameGoogle_Link'];}else{echo "https://asyagame.com";} ?></a> 
                                                <input class="btn btn-primary" type="submit" value="Düzenle" name="duzen">
                                            </div>
                                            
                                            <div class="col-xl-8 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>İndirme:</h3><br>
                                                <?php if(isset($sqlgoogle)){ $sayi= rand(100, 1000); echo $sayi;
                                                mysqli_query($db,"update game_googleapp set GameGoogle_İndirme=".$sayi." where GameGoogle_Id=".$sqlgoogle['GameGoogle_Id']);}?>
                                            </div>
                                            <div class="col-xl-8 col-md-6" style="color:#000;  margin: 2%;">
                                                <h3>Puanlama:</h3><br>
                                                <input class="form-control profil-form" type="text" name="game_puan" value="<?php if (isset($sqlgoogle['GameGoogle_Puan'])){ echo $sqlgoogle['GameGoogle_Puan'];} ?>">
                                            </div>
                                            <div class="col-xl-8 col-md-6" style="color:#000;  margin: 2%;">
                                                <h3>Yorum:</h3><br>
                                                <input class="form-control profil-form" type="text" name="game_yorum" value="<?php if (isset($sqlgoogle['GameGoogle_Yorum'])){ echo $sqlgoogle['GameGoogle_Yorum'];} ?>">
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <input class="text-white" style="background: none; border:none;" type="submit" value="Güncelle" name="guncelle"/>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card text-white mb-4">
                                    <form method="post">
                                        <div class="card-header">
                                            <h2>Oyun Yazısı</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-xl-8 col-md-6" style="color:#000; margin: 2%;">
                                                <h3>Başlık:</h3><br>
                                                <input class="form-control profil-form" type="text" name="game_title" value="<?php if (isset($sqlyazi['GameText_title'])){ echo $sqlyazi['GameText_title'];} ?>">
                                            </div>
                                            <div class="col-xl-8 col-md-6" style="color:#000;  margin: 2%;">
                                                <h3>Yazı:</h3><br>
                                                <input class="form-control profil-form" type="text" name="game_text" value="<?php if (isset($sqlyazi['GameText_text'])){ echo $sqlyazi['GameText_text'];} ?>">
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <input class="text-white" style="background: none; border:none;" type="submit" value="Güncelle" name="btngnc"/>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-header">
                                        <h2>Oyun Sliderı<h2>
                                    </div>
                                    <div class="card-body">
                                        <table class="dataTable-table">
                                            <thead>
                                                <tr>
                                                    <th>Slider Fotografı</th>
                                                    <th style="opacity: 0;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ($kayit=mysqli_fetch_array($sqlslider)){ ?>
                                                <tr>
                                                    <td><img class="admin_img" src="<?php echo '../assets/img/oyun'.$kayit["Game_Id"].'/slider/'.$kayit["GameSlider_img"];?>" /></td>
                                                    <td>
                                                        <a href="<?php echo 'sil.php?yer=os&oyun='.$oyun.'&sil='.$kayit["GameSlider_Id"] ?>">
                                                            <input class="btn btn-danger" type="submit" value="Sil">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo 'ekle.php?yer=os&oyun='.$oyun; ?>">Yeni Ekle</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Website 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>