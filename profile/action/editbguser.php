<?php
include_once("../../include/include.php");
session_start();
if(isset($_FILES['image'])){ 
    $img_name = $_FILES['image']['name'];
    $img_type = $_FILES['image']['type']; 
    $tmp_name = $_FILES['image']['tmp_name']; 
  

    $img_explode = explode(".", $img_name);
    $img_ext = end($img_explode); 
  
    $extensions = ['png', 'jpeg', 'jpg', 'gif']; 

    if(in_array($img_ext, $extensions) === true && in_array($img_ext, $extensions) !== ""){ 

        $time = time(); 

        $new_img_name = $time.$img_name; // foto perfil

        if(move_uploaded_file($tmp_name, "../../images-user/".$new_img_name)){
           $sql = mysqli_query($conn, "UPDATE users SET bgimg = '$new_img_name' WHERE idUser  = ". $_SESSION['idUser']);
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
}