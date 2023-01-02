<?php
include('../include/include.php');
session_start();
$result = "";
if (!isset($_SESSION['idUser'])) {
    $output = " <a class='nav-link icon-login' href='../signin/login.php'>
    <i class='fa fa-user' aria-hidden='true'></i>
</a>";
} else {
   
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser']);
    $row = mysqli_fetch_assoc($sql);
    $idUser = $_SESSION['idUser'];
    $sql02 = mysqli_query($conn, "SELECT * FROM users WHERE idUser = " . $_SESSION['idUser'] . " AND isAdmin = 'admin'");
    if (mysqli_num_rows($sql02)) {
        $result = " <a class='nav-link' href='../admin/index.php'> Admin </a>";
    }
    $output = "<a class='nav-link' href='../profile/profile.php'>
    <img src='../images-user/" . $row['img'] . "' alt='' width='40px' height='40px'
        style='border-radius: 100%'>
</a>";
}

$id = $_GET['id'];
$sqlanime = mysqli_query($conn, "SELECT * FROM anime WHERE idAnime = '$id'");
$rowanime = mysqli_fetch_assoc($sqlanime);
$categoria = $rowanime['FK_idCategoria'];
$sqlcategoria = mysqli_query($conn, "SELECT * FROM categoria WHERE idCategoria = '$categoria'");
$rowcategoria = mysqli_fetch_assoc($sqlcategoria);

$sqlcomentario = mysqli_query($conn, "SELECT * FROM comentario WHERE FK_idAnime = '$id'");
$comentario = 0;
while ($rowcomentario = mysqli_fetch_assoc($sqlcomentario)) {
    $comentario++;
}
$_SESSION['idAnime'] = $rowanime['idAnime'];
$sqlepisodio = mysqli_query($conn, "SELECT * FROM episodio WHERE FK_idAnime = '$id' ORDER BY id ASC");
$rowepisodio = mysqli_fetch_assoc($sqlepisodio);

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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/plyr.css" type="text/css">
    <link rel="stylesheet" href="../css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .modal-confirm {
            color: #636363;
            width: 400px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }

        .modal-confirm .modal-body {
            color: #999;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }

        .modal-confirm .modal-footer a {
            color: #999;
        }

        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }

        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }

        .modal-confirm .btn,
        .modal-confirm .btn:active {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
        }

        .modal-confirm .btn-secondary {
            background: #c1c1c1;
        }

        .modal-confirm .btn-secondary:hover,
        .modal-confirm .btn-secondary:focus {
            background: #a8a8a8;
        }

        .modal-confirm .btn-danger {
            background: #f15e5e;
        }

        .modal-confirm .btn-danger:hover,
        .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

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
                    <a class="nav-link" href="categories.php">
                        Categorias
                    </a>
                </li>
                <li class="nav-item">

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
                        <a href="../index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="../categories.php">Categories</a>
                        <span> <?php echo $rowanime['nome'] ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="../images-user/<?php echo $rowanime['img'] ?> ">

                            <div class="comment"><i class="fa fa-comments"></i> <?php echo $rowanime['comentarios'] ?></div>
                            <div class="view"><i class="fa fa-eye"></i> <?php echo $rowanime['visualizacao']; ?></div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3> <?php echo $rowanime['nome'] ?> </h3>
                                <span> <?php echo $rowcategoria['nome'] ?> </span>
                            </div>

                            <p> <?php echo $rowanime['descricao'] ?> </p>
                            <?php
                            if (isset($_SESSION['idUser'])) {
                                $sqlfollow = mysqli_query($conn, "SELECT * FROM follow WHERE 
                                 FK_idAnime = '$id' AND FK_idUser = '$idUser'");
                                if (mysqli_num_rows($sqlfollow) > 0) {

                                    $follow = "<a href='#myModal' class='follow-btn'  class='trigger-btn' data-toggle='modal'><i class='fa fa-times' aria-hidden='true'></i>
                                    Remove Follow</a>";
                                } else {
                                    $follow = "<a href='action/follow.php?id=" . $id . "' class='follow-btn'><i class='fa fa-heart-o'></i> Follow</a>";
                                }
                            } else {
                                $follow = "<a href='#myModal2' class='follow-btn'  class='trigger-btn' data-toggle='modal'> <i class='fa fa-heart-o'></i> Follow</a>";
                            }
                            ?>
                            <div class="anime__details__btn">
                                <?php echo $follow; ?>
                                <a href="../anime-watching/anime-watching.php?id=<?php echo $id; ?>&episodio=<?php echo $rowepisodio['idEpisodio']; ?>" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>

                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <?php 
                            if(isset($_SESSION['idUser'])){
                                $btncomentario = " <button type='submit'><i class='fa fa-location-arrow'></i> Review</button>";
                            }
                            else{
                                $btncomentario = " <a href='#myModal2' class='follow-btn'  class='trigger-btn' data-toggle='modal'> <button type='submit'><i class='fa fa-location-arrow'></i> Review</button></a> ";
                            }
                        ?>
                        <form action="#">
                            <div class="errortxts" style="color: red"></div>
                            <textarea placeholder="Your Comment" name="descricao"></textarea>
                            <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                            <?php echo $btncomentario; ?>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
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
                                data-setbg='../images-user/" . $rowanime['img'] . "'>
                                <div class='ep'>Episodios: " . $episodio . "</div>
                                <div class='view'><i class='fa fa-eye'></i> " . $rowanime['visualizacao'] . "</div>
                                <h5><a href='../anime-details/anime-details.php?id=" . $rowanime['idAnime'] . "'>" . $rowanime['nome'] . "</a></h5>
                            </div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="../index.php"><img src="../img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="../index.php">Homepage</a></li>
                            <li><a href="../categories.php">Categories</a></li>

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
            <form class="search-model-form" method="POST" action="../search.php">
                <input type="text" id="search-input" placeholder="Search here....." name="search">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class='fa fa-times' aria-hidden='true'></i>
                    </div>
                    <h4 class="modal-title w-100">Desejar realmente fazer isso?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger"><a href='action/follow.php?id=<?php echo "$id"; ?>' style="color: #fff"> Confirmar </a></button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class='fa fa-times' aria-hidden='true'></i>
                    </div>
                    <h4 class="modal-title w-100">Precisa se logar antes</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger"><a href='../signup/signup.php' style="color: #fff"> Fazer Login </a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Js Plugins -->
    <script src="../js/form-animedetails.js"></script>
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