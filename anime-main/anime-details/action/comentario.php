<?php
include_once("../../include/include.php");
session_start();
$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
$idAnime = mysqli_real_escape_string($conn, $_POST['id']);
if(!empty($descricao)){
    if(!empty($_SESSION['idUser'])){
        $idUser = $_SESSION['idUser'];
    $random_id = rand(time(), 10000000);
    $hoje = date('d/m/Y');
    $descricao = str_replace("img", "____", $descricao);
    $sql = mysqli_query($conn, "INSERT INTO comentario(idComentario, FK_idAnime, FK_idUser, datac, descricao)
    VALUES('$random_id', '$idAnime', '$idUser', '$hoje', '$descricao')");
    if($sql){
        $comentario = mysqli_query($conn, "SELECT * FROM anime WHERE idAnime = '$idAnime'");
        $rowcomentario = mysqli_fetch_assoc($comentario);
        $qtdcomentario = $rowcomentario['comentarios'] + 1;
        $upcomentario = mysqli_query($conn, "UPDATE anime SET comentarios = '$qtdcomentario' WHERE idAnime = '$idAnime'");
        echo "sucesso";
    }
    else{
        echo "error a finalizar tarefa";
    }}
    else{
        echo "Precisar Logar antes";
    }
}else{
    echo "preencer o campo de texto";
}
?>