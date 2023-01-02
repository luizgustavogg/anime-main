<?php
include('include/include.php');
session_start();
$result = "";
if (!isset($_SESSION['idUser'])) {
    $output = " <a class='nav-link icon-login' href='signin/login.php'>
    <i class='fa fa-user' aria-hidden='true'></i>
</a>";
} else {


    $sql = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser']);
    $row = mysqli_fetch_assoc($sql);
    $sql02 = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser'] . " AND isAdmin = 'admin'");
    if (mysqli_num_rows($sql02)) {
        $result = "<a class='nav-link' href='admin/index.php'> Admin </a>";
    }
    $output = "  <a class='nav-link' href='profile/profile.php'>
    <img src='images-user/" . $row['img'] . "' alt='' width='40px' height='40px'
        style='border-radius: 100%'>
</a>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark " style="background: #070720">
        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
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
                    <?php echo $result; ?>
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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.php">Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Section Begin -->
    <section class="product-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    $categoriat = mysqli_query($conn, "SELECT * FROM categoria");
                    while ($rowcategoriat = mysqli_fetch_assoc($categoriat)) {
                        $idca = $rowcategoriat['idCategoria'];
                        $sqlanimect = mysqli_query($conn, "SELECT * FROM anime WHERE FK_idCategoria = '$idca'");
                        if (mysqli_num_rows($sqlanimect) > 0) {
                            echo "
                    <div class='product__page__content'>
                        <div class='product__page__title'>
                            <div class='row'>
                              
                                <div class='col-lg-8 col-md-8 col-sm-6'>
                                    <div class='section-title'>
                                        <h4>" . $rowcategoriat['nome'] . "</h4>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class='row'>
                        
                        ";
                            $FK_idCategoria = $rowcategoriat['idCategoria'];
                            $sqlanimets = mysqli_query($conn, "SELECT * FROM anime WHERE FK_idCategoria = '$FK_idCategoria'");
                            while ($rowanimets = mysqli_fetch_assoc($sqlanimets)) {
                                $anime = $rowanimets['idAnime'];
                                $sqlepisodio = mysqli_query($conn, "SELECT * FROM episodio WHERE FK_idAnime = $anime");
                                $episodio = 0;
                                while ($rowepisodio = mysqli_fetch_assoc($sqlepisodio)) {
                                    $episodio++;
                                }

                                $sqlcomentario = mysqli_query($conn, "SELECT * FROM comentario WHERE FK_idAnime = $anime");
                                echo "
                            <div class='col-lg-4 col-md-6 col-sm-6'>
                                <div class='product__item'>
                                    <div class='product__item__pic set-bg' data-setbg='images-user/" . $rowanimets['img'] . "'>
                                        <div class='ep'>Episodios: " . $episodio . "</div>
                                        <div class='comment'><i class='fa fa-comments'></i> " . $rowanimets['comentarios'] . "</div>
                                        <div class='view'><i class='fa fa-eye'></i> " . $rowanimets['visualizacao'] . "</div>
                                    </div>
                                    <div class='product__item__text'>
                                        <ul>
                                            <li>" . $rowcategoriat['nome'] . "</li>
                                        </ul>
                                        <h5><a href='anime-details/anime-details.php?id=" . $rowanimets['idAnime'] . "'>" . $rowanimets['nome'] . "</a></h5>
                                    </div>
                                </div>
                                </div>";
                            }
                            echo " </div>
                                </div>";
                        }
                    } ?>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>

                            <?php
                            $sqlanime = mysqli_query($conn, "SELECT * FROM anime ORDER BY visualizacao DESC");

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
                                    echo "
                            <div class='filter__gallery'>
                                <div class='product__sidebar__view__item set-bg mix day years'
                                data-setbg='images-user/" . $rowanime['img'] . "'>
                                <div class='ep'>Episodios: " . $episodio . "</div>
                                <div class='view'><i class='fa fa-eye'></i> " . $rowanime['visualizacao'] . "</div>
                                <h5><a href='anime-details/anime-details.php?id=" . $rowanime['idAnime'] . "'>" . $rowanime['nome'] . "</a></h5>
                            </div>";
                                }
                            }
                            ?>

                        </div>
                    </div>
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
                                    <img src='images-user/" . $rowanime['img'] . "' alt='' width='90px' height='130px'>
                                </div>
                                <div class='product__sidebar__comment__item__text'>
                                    <ul>
                                        <li>" . $rowcategoria['nome'] . "</li>
                                    </ul>
                                    <h5><a href='anime-details/anime-details.php?id=" . $rowanime['idAnime'] . "'>" . $rowanime['nome'] . "</a></h5>
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
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="./index.php">Homepage</a></li>
                            <li><a href="./categories.html">Categories</a></li>
                            <li><a href="./blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form" method="POST" action="search.php">
                <input type="text" id="search-input" placeholder="Search here....." name="search">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>