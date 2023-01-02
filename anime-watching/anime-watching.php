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
$episodio = $_GET['episodio'];
$sqlanime = mysqli_query($conn, "SELECT * FROM anime WHERE idAnime = '$id'");
$rowanime = mysqli_fetch_assoc($sqlanime);
$visu = $rowanime['visualizacao'];
$visu = $visu + 1;
$sqlview = mysqli_query($conn, "UPDATE anime SET visualizacao = '$visu' WHERE idAnime = '$id'");
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
                        <span> <?php echo $rowanime['nome']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php

                    $sqlepisodio = mysqli_query($conn, "SELECT * FROM episodio WHERE idEpisodio = '$episodio' AND FK_idAnime = '$id'");
                    $rowepisodio = mysqli_fetch_assoc($sqlepisodio);


                    ?>
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="../images-user/<?php echo $rowanime['img'] ?>">
                            <source src="../videos/<?php echo $rowepisodio['video']; ?>" type="video/mp4" />
                        </video>
                    </div>
                    <?php
                    $sqltemporada = mysqli_query($conn, "SELECT * FROM temporada WHERE FK_idAnime = '$id'");
                    while ($rowtemporada = mysqli_fetch_assoc($sqltemporada)) {


                        echo "
                    <div class='anime__details__episodes'>
                        <div class='section-title'>
                            <h5>" . $rowtemporada['nome'] . "</h5>
                        </div>
                        ";
                        $episodiot = mysqli_query($conn, "SELECT * FROM episodio WHERE FK_idTemporada = " . $rowtemporada['idTemporada']);

                        while ($rowepisodiot = mysqli_fetch_assoc($episodiot)) {
                            echo "<a href='anime-watching.php?id=" . $id . "&episodio=" . $rowepisodiot['idEpisodio'] . "'>" . $rowepisodiot['nome'] . "</a>";
                        }
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="#">
                            <div class="errortxts" style="color: red"></div>
                            <textarea placeholder="Your Comment" name="descricao"></textarea>
                            <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
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
            <form class="search-model-form" method="POST" action="../search.php">
                <input type="text" id="search-input" placeholder="Search here....." name="search">
            </form>
        </div>
    </div>
    <!-- Search model end -->

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