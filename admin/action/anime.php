<?php
include_once("../../include/include.php");
session_start();
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
$descricao = mysqli_real_escape_string($conn, $_POST['descricao']);

if(!empty($nome) && !empty($descricao)){
if(isset($_FILES['image'])){ 
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type']; 
    $tmp_name = $_FILES['image']['tmp_name']; 
  

    $img_explode = explode(".", $img_name);
    $img_ext = end($img_explode); 
  
    $extensions = ['png', 'jpeg', 'jpg', 'gif', 'PNG', 'JPEG', 'JPG', 'GIF']; 

    if(in_array($img_ext, $extensions) === true && in_array($img_ext, $extensions) !== ""){ 
        $random_id = rand(time(), 10000000);
        $time = time(); 
        $new_img_name = $time.$img_name; // foto perfil
        $hoje = date('d/m/Y');
        $nome = str_replace("img", "____", $nome);
        if(move_uploaded_file($tmp_name, "../../images-user/".$new_img_name)){
           $sql = mysqli_query($conn, "INSERT INTO anime(idAnime, FK_idCategoria, visualizacao, comentarios, datac, nome, descricao, img)
           VALUES ('$random_id', '$categoria', 0, 0, '$hoje', '$nome','$descricao','$new_img_name')");
           if($sql){
               echo "sucesso";
            }
            else{
                echo "Error ao finalizar tarefa";
            }
        }
    }else{
        echo "Por favor, selecione um arquivo de imagem - jpgeg, jpg, png!";
    }
}
else{
    echo "Selecionar foto";
}}
else{
    echo "preencher todos os campos";
}