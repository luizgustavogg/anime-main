<?php

include('../../include/include.php');
$local  = $_GET['oq'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($local == "user") {
        $sql = mysqli_query($conn, "DELETE FROM users WHERE idUser = '$id'");
    } else if ($local == "anime") {
        $sql = mysqli_query($conn, "DELETE FROM anime WHERE idAnime = '$id'");
    } else if ($local == "episodio") {
        $sql = mysqli_query($conn, "DELETE FROM episodio WHERE idEpisodio = '$id'");
    } else if ($local == "categoria") {
        $sql = mysqli_query($conn, "DELETE FROM categoria WHERE idCategoria = '$id'");
    } else if ($local == "temporada") {
        $sql = mysqli_query($conn, "DELETE FROM temporada WHERE idTemporada = '$id'");
    }

    if ($sql) {
        header("Location: ../tables.php");
    } else {
        echo "error";
    }
} else {
    echo "error";
}
