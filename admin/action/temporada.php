<?php
include_once("../../include/include.php");
session_start();
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$anime = mysqli_real_escape_string($conn, $_POST['anime']);
if(!empty($nome)){
        $random_id = rand(time(), 10000000);
        $hoje = date('d/m/Y');

        $nome = str_replace("img", "____", $nome);
           $sql = mysqli_query($conn, "INSERT INTO temporada(idTemporada, FK_idAnime, datac, nome)
           VALUES ('$random_id', '$anime', '$hoje', '$nome')");
           if($sql){
               echo "sucesso";
            }
            else{
                echo "Error ao finalizar tarefa";
            }
    }
else{
    echo "preencher todos os campos";
}
?>