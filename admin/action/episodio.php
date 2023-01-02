<?php
include_once("../../include/include.php");
session_start();
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$anime = mysqli_real_escape_string($conn, $_POST['id_categoria']);
$temporada = mysqli_real_escape_string($conn, $_POST['id_sub_categoria']);

if(!empty($nome) && !empty($anime) && !empty($temporada)){
if(isset($_FILES['image'])){ 
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type']; 
    $tmp_name = $_FILES['image']['tmp_name']; 
  

    $img_explode = explode(".", $img_name);
    $img_ext = end($img_explode); 
  
    $extensions = ['MP4', 'mp4']; 

    if(in_array($img_ext, $extensions) === true && in_array($img_ext, $extensions) !== ""){ 
        $random_id = rand(time(), 10000000);
        $time = time(); 
        $new_img_name = $time.$img_name; // foto perfil
        $hoje = date('d/m/Y');
        $nome = str_replace("img", "____", $nome);
        if(move_uploaded_file($tmp_name, "../../videos/".$new_img_name)){
           $sql = mysqli_query($conn, "INSERT INTO episodio(idEpisodio, FK_idAnime, FK_idTemporada, datac, nome, video)
           VALUES ('$random_id', '$anime', '$temporada', '$hoje', '$nome','$new_img_name')");
           if($sql){
               echo "sucesso";
            }
            else{
                echo "Error ao finalizar tarefa";
            }
        }
    }else{
        echo "Por favor, selecione um arquivo de video - MP4";
    }
}
else{
    echo "Selecionar foto";
}}
else{
    echo "preencher todos os campos";
}