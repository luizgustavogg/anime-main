<?php
include_once("../../include/include.php");
session_start();
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
if(!empty($nome)){
if(isset($_FILES['image'])){ 
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type']; 
    $tmp_name = $_FILES['image']['tmp_name']; 
  

    $img_explode = explode(".", $img_name);
    $img_ext = end($img_explode); 
  
    $extensions = ['png', 'jpeg', 'jpg', 'gif']; 

    if(in_array($img_ext, $extensions) === true && in_array($img_ext, $extensions) !== ""){ 
        $random_id = rand(time(), 10000000);
        $time = time(); 
        $new_img_name = $time.$img_name; // foto perfil
        $hoje = date('d/m/Y');
        $nome = str_replace("img", "____", $nome);
        if(move_uploaded_file($tmp_name, "../../images-user/".$new_img_name)){
           $sql = mysqli_query($conn, "INSERT INTO categoria(idCategoria, datac, nome, img)
           VALUES ('$random_id', '$hoje', '$nome', '$new_img_name')");
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