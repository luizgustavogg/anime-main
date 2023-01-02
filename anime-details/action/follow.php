<?php
        session_start();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(isset($_SESSION['idUser'])){
        include('../../include/include.php');

        $idUser = $_SESSION['idUser'];
        $sqlentry = mysqli_query($conn, "SELECT * FROM follow WHERE 
        FK_idAnime = '$id' AND FK_idUser = '$idUser'");
    if(mysqli_num_rows($sqlentry) > 0){
        $sqlremove = mysqli_query($conn, "DELETE FROM follow WHERE 
        FK_idAnime = '$id' AND FK_idUser = '$idUser'");
        if($sqlremove){
            header("Location: ../anime-details.php?id=". $id);
        }
        else{
            echo "error ao finalizar";
        }
    }
    else{
        $random_id = rand(time(), 10000000);
        $hoje = date('d/m/Y');
        $sql = mysqli_query($conn, "INSERT INTO follow(idFollow, FK_idAnime, FK_idUser, datac)
        VALUES('$random_id', '$id', '$idUser', '$hoje')");
        if($sql){
                header("Location: ../anime-details.php?id=". $id);
        }
        else{
            echo "error ao finalizar";
        }
            }}
    else{
        header("Location: ../anime-details.php?id=". $id);
    }}
    else{
        header("Location: ../../index.php");
    }

?>