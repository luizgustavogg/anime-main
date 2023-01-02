<?php
session_start();
$result = "";
if (!isset($_SESSION['idUser'])) {
    header('Location: ../index.php');
} else {
    include('../include/include.php');

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser']);
    $row = mysqli_fetch_assoc($sql);
    $sql02 = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser'] . " AND isAdmin = 'admin'");
    if(mysqli_num_rows($sql02)){
        $result = "<a class='nav-link' href='../admin/index.php'> Admin </a>";
    }
    $output = "<a href='profile.php'><img src='../images-user/" . $row['img'] . "' alt='' width='40px' height='40px' style='border-radius: 100%'></a>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <link rel="stylesheet" href="../css/profile.css">

    <style>
        button {
            border: none;
            background-color: #00000033;
            border-radius: 30px;
            color: #fff;
        }
    </style>
</head>

<body>

      <!-- Header Section Begin -->
      <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark " style="background: #070720">
        <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">
                        <i class="fa fa-home"></i>
                        Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>


                <li class="nav-item">
                <a class="nav-link" href="../categories.php">
                        Categorias
                    </a>
                </li>
                <li class="nav-item">
                    <?php echo $result;?>
                </li>
            </ul>
            <ul class="navbar-nav ">

                <form class="form-inline my-2 my-lg-0" style="padding-right: 20px">
                    <a href="#" class="search-switch" style="color: #fff"><span class="icon_search"></span>
                        Pesquisar</a>
                </form>
                <li class="nav-item">
                    <?php echo $output; ?>
                </li>

            </ul>
        </div>
    </nav>

    <!-- Header End -->

    <!-- Main -->
    <main id="main" class="flexbox-col-start-center">

        <!-- Profile Page -->
        <div class="view-width">

            <!-- Profile Header -->
            <section class="profile-header">
                <div class="profile-header-inner flexbox">

                    <div class="phi-info-wrapper flexbox">

                        <div class="phi-info-left flexbox">
                            <!-- Profile Picture -->
                            <a id="openMyPopup2" data-popup="myPopup2" onClick="openPopup2('#myPopup2')" aria-controls="myPopup2" aria-label="Open popup">
                                <div class="phi-profile-picture-wrapper">
                                    <div class="phi-profile-picture-inner flexbox">
                                        <img class="phi-profile-picture" src="../images-user/<?php echo $row['img']; ?>" alt="">
                                    </div>
                                    <img class="phi-profile-picture-blur" src="../images-user/<?php echo $row['img']; ?>" alt="">
                                </div>
                            </a>
                            <!-- Profile Username -->
                            <div class="phi-profile-username-wrapper flexbox-col-left">
                                <h3 class="phi-profile-username flexbox " style="color: #fff"><?php echo $row['username']; ?><span class="material-icons-round"> <a id="openMyPopup" data-popup="myPopup" onClick="openPopup('#myPopup')" aria-controls="myPopup" aria-label="Open popup"><i class='fa fa-edit'></i></a></h3>
                                <p class="phi-profile-tagline" style="color: rgb(240, 240, 240)"><?php echo $row['biografia']; ?></p>
                                <h3 class="phi-profile-username flexbox " ><a href="../logout.php" style="color: red">Deslogar da conta</a></h3>
                            </div>
                        </div>
                        <div class="phi-info-right flexbox-right">
                                <a id="openMyPopup3" data-popup="myPopup3" onClick="openPopup3('#myPopup3')" aria-controls="myPopup3" aria-label="Open popup"> <button>Mudar Fundo Perfil</button></a>
                        </div>
                    </div>
                    <!-- Profile Header Image -->
                    <div class="profile-header-overlay"></div>
                    <!-- background user -->
                    <img class="profile-header-image" src="../images-user/<?php echo $row['bgimg']; ?>" alt="">
                </div>
            </section>

            <!-- Product Section Begin -->
            <section class="product-page spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class='product__page__content'>

                                <?php
                                $idUser = $_SESSION['idUser'];
                                $sqlfollow = mysqli_query($conn, "SELECT * FROM follow WHERE FK_idUser = '$idUser'");
                                if (mysqli_num_rows($sqlfollow) > 0) {
                                    echo "
                                        <div class='product__page__title'>
                                        <div class='row'>
    
                                            <div class='col-lg-8 col-md-8 col-sm-6'>
                                                <div class='section-title'>
                                                    <h4>Follow Anime</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        ";
                                        $quantidade01 = 0;
                                    while ($rowfollow = mysqli_fetch_assoc($sqlfollow)) {
                                        $quantidade01++;
                                        if ($quantidade01 <= 6) {
                                        $FK_idAnime = $rowfollow['FK_idAnime'];
                                        $sqlanimets = mysqli_query($conn, "SELECT * FROM anime WHERE idAnime = '$FK_idAnime'");
                                       
                                        while ($rowanimets = mysqli_fetch_assoc($sqlanimets)) {
                                           
                                                $anime = $rowanimets['idAnime'];
                                                $sqlepisodio = mysqli_query($conn, "SELECT * FROM episodio WHERE FK_idAnime = $anime");
                                                $episodio = 0;
                                                while ($rowepisodio = mysqli_fetch_assoc($sqlepisodio)) {
                                                    $episodio++;
                                                }
                                                $FK_idCategoria = $rowanimets['FK_idCategoria'];
                                                $sqlcategoria = mysqli_query($conn, "SELECT * FROM categoria WHERE idCategoria = '$FK_idCategoria'");
                                                $rowcategoriat = mysqli_fetch_assoc($sqlcategoria);
                                                $sqlcomentario = mysqli_query($conn, "SELECT * FROM comentario WHERE FK_idAnime = $anime");
                                                echo "
                            <div class='col-lg-4 col-md-6 col-sm-6'>
                                <div class='product__item'>
                                    <div class='product__item__pic set-bg' data-setbg='../images-user/" . $rowanimets['img'] . "'>
                                        <div class='ep'>Episodios: " . $episodio . "</div>
                                        <div class='comment'><i class='fa fa-comments'></i> " . $rowanimets['comentarios'] . "</div>
                                        <div class='view'><i class='fa fa-eye'></i> " . $rowanimets['visualizacao'] . "</div>
                                    </div>
                                    <div class='product__item__text'>
                                        <ul>
                                            <li>" . $rowcategoriat['nome'] . "</li>
                                        </ul>
                                        <h5><a href='../anime-details/anime-details.php?id=" . $rowanimets['idAnime'] . "'>" . $rowanimets['nome'] . "</a></h5>
                                    </div>
                                </div>
                                </div>";
                                            }
                                        }
                                    }
                                    echo " </div>
                                </div>";
                                } else {
                                    echo "
                                        <div class='product__page__title'>
                                        <div class='row'>
    
                                            <div class='col-lg-8 col-md-8 col-sm-6'>
                                                <div class='section-title'>
                                                    <h4>ANIMES MAIS POPULARES</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        ";
                                    $sqlanime = mysqli_query($conn, "SELECT * FROM anime");
                                    $quantidade02 = 0;
                                    while ($rowanime = mysqli_fetch_assoc($sqlanime)) {
                                        if ($quantidade02 <= 6) {
                                            $quantidade02++;
                                            $categoria = $rowanime['FK_idCategoria'];
                                            $sqlcategoria = mysqli_query($conn, "SELECT * FROM categoria WHERE idCategoria = $categoria");
                                            $rowcategoria = mysqli_fetch_assoc($sqlcategoria);
                                            $anime = $rowanime['idAnime'];
                                            $sqlepisodio = mysqli_query($conn, "SELECT * FROM episodio WHERE FK_idAnime = $anime");
                                            $episodio = 0;
                                            while ($rowepisodio = mysqli_fetch_assoc($sqlepisodio)) {
                                                $episodio++;
                                            }
                                            $sqlcomentario = mysqli_query($conn, "SELECT * FROM comentario WHERE FK_idAnime = $anime");

                                            echo "
                                    <div class='col-lg-4 col-md-6 col-sm-6'>
                                        <div class='product__item'>
                                            <div class='product__item__pic set-bg' data-setbg='../images-user/" . $rowanime['img'] . "'>
                                                <div class='ep'>Episodios: " . $episodio . "</div>
                                                <div class='comment'><i class='fa fa-comments'></i> " . $rowanime['comentarios'] . "</div>
                                                <div class='view'><i class='fa fa-eye'></i> " . $rowanime['visualizacao'] . "</div>
                                            </div>
                                            <div class='product__item__text'>
                                                <ul>
                                                    <li>" . $rowcategoria['nome'] . "</li>
                                                </ul>
                                                <h5><a href='../anime-details/anime-details.php?id=" . $rowanime['idAnime'] . "'>" . $rowanime['nome'] . "</a></h5>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                    }
                                    echo " </div>
                                </div>";
                                }
                                ?>

                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-8">

                                <div class="product__sidebar__comment">
                                    <div class="section-title">
                                        <h5>Os Mais comentados</h5>
                                    </div>
                                    <?php
                                    $sqlanime = mysqli_query($conn, "SELECT * FROM anime ORDER BY comentarios DESC");

                                    $quantidade = 0;
                                    while ($rowanime = mysqli_fetch_assoc($sqlanime)) {

                                        if ($quantidade <= 3) {
                                            $quantidade++;
                                            $categoria = $rowanime['FK_idCategoria'];
                                            $sqlcategoria = mysqli_query($conn, "SELECT * FROM categoria WHERE idCategoria = $categoria");
                                            $rowcategoria = mysqli_fetch_assoc($sqlcategoria);
                                            $anime = $rowanime['idAnime'];
                                            $sqlepisodio = mysqli_query($conn, "SELECT * FROM episodio WHERE FK_idAnime = $anime");
                                            $episodio = 0;
                                            while ($rowepisodio = mysqli_fetch_assoc($sqlepisodio)) {
                                                $episodio++;
                                            }
                                            echo "<div class='product__sidebar__comment__item'>
                                <div class='product__sidebar__comment__item__pic'>
                                    <img src='../images-user/" . $rowanime['img'] . "' alt='' width='90px' height='130px'>
                                </div>
                                <div class='product__sidebar__comment__item__text'>
                                    <ul>
                                        <li>" . $rowcategoria['nome'] . "</li>
                                    </ul>
                                    <h5><a href='../anime-details/anime-details.php?id=" . $rowanime['idAnime'] . "'>" . $rowanime['nome'] . "</a></h5>
                                    <span><i class='fa fa-eye'></i> " . $rowanime['visualizacao'] . " Viewes</span>
                                </div>
                            </div>
                           ";
                                        }
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                    </div>
            </section>
    </main>


    </div>

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton" style="color: #fff"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="../img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="./index.html">Homepage</a></li>
                            <li><a href="./categories.php">Categories</a></li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>

            </div>
    </footer>
    <!-- Footer Section End -->

    <div class="popup editp" id="myPopup" aria-hidden="true" onClick="if(event.target == this){closePopup('#myPopup');}">
        <div class="wrapper" aria-labelledby="popupTitle" aria-describedby="popupText" aria-modal="true">
            <div class="row-poup">
                <h2 id="popupTitle">Editar Perfil</h2>
                <a id="closePopup" onClick="closePopup('#myPopup');" aria-label="Close popup"><i class='fa fa-remove'></i></a>
            </div>
            <form action="" method="">
                <div class="errortxt"></div>
                <div class="input__item">
                    <input type="text" placeholder="Username" name="nome" value="<?php echo $row['username']; ?>">
                    <span class="icon_mail"></span>
                </div>
                <div class="input__item">
                    <input type="text" placeholder="Email address" name="email" value="<?php echo $row['email']; ?>">
                    <span class="icon_mail"></span>
                </div>
                <div class="input__item">
                    <input type="text" placeholder="Biografia" name="biografia" value="<?php echo $row['biografia']; ?>">
                    <span class="icon_mail"></span>
                </div>
                <button type="submit" class="site-btn">Editar</button>
            </form>
        </div>
    </div>

    <div class="popup imguser" id="myPopup2" aria-hidden="true" onClick="if(event.target == this){closePopup2('#myPopup2');}">
        <div class="wrapper" aria-labelledby="popupTitle" aria-describedby="popupText" aria-modal="true">
            <div class="row-poup">
                <h2 id="popupTitle">Mudar Foto de Perfil</h2>
                <a id="closePopup2" onClick="closePopup('#myPopup2');" aria-label="Close popup2"><i class='fa fa-remove'></i></a>
            </div>
            <form action="" method="">
                <div class="errortxt"></div>
                <div class="input__item">
                    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                    <div class="file-upload">
                        <div class="file-select">
                            <div class="file-select-button" id="fileName">Enviar foto de perfil</div>
                            <div class="file-select-name" id="noFile">foto ou gif</div>
                            <input type="file" name="image" id="chooseFile">
                        </div>
                    </div>
                </div>
                <button type="submit" class="site-btn">Editar</button>
            </form>
        </div>
    </div>

    <div class="popup bguser" id="myPopup3" aria-hidden="true" onClick="if(event.target == this){closePopup2('#myPopup3');}">
        <div class="wrapper" aria-labelledby="popupTitle" aria-describedby="popupText" aria-modal="true">
            <div class="row-poup">
                <h2 id="popupTitle">Mudar Fundo do Perfil</h2>
                <a id="closePopup3" onClick="closePopup('#myPopup3');" aria-label="Close popup3"><i class='fa fa-remove'></i></a>
            </div>
            <form action="" method="">
                <div class="errortxt"></div>
                <div class="input__item">
                    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
                    <div class="file-upload">
                        <div class="file-select">
                            <div class="file-select-button" id="fileName">Enviar foto de perfil</div>
                            <div class="file-select-name" id="noFile">foto ou gif</div>
                            <input type="file" name="image" id="chooseFile">
                        </div>
                    </div>
                </div>
                <button type="submit" class="site-btn">Editar</button>
            </form>
        </div>
    </div>

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form" method="POST" action="../search.php">
                <input type="text" id="search-input" placeholder="Search here....." name="search">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="../js/popup-profile.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/player.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/jquery.slicknav.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>



</body>

</html>