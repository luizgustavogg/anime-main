<?php
  session_start();

  include_once("../../include/include.php");
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));
  $rf = mysqli_real_escape_string($conn, $_POST['senha']);

  if(!empty($nome) && !empty($email) && !empty($senha)){
      // vamos verificar o e-mail do usuário é válido ou não
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //Se o email for valido
          // verificar que o e-mail já existe no banco de dados ou não
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if(mysqli_num_rows($sql) > 0){ //se o e-mail já existe
            echo "$email - este email ja existe!";
        }else{
            $senharf = strlen($rf);
            $max = 7;
            if ($senharf <= $max) { // validar se a senha ta curta
                echo "Senha muito curta";
            } else { // deu tudo certo
          // verificar o arquivo de upload do usuário ou não
          if(isset($_FILES['image'])){ //se o arquivo for carregado
            $img_name = $_FILES['image']['name']; //recebendo upload do usuário img name
            $img_type = $_FILES['image']['type']; //recebendo upload do usuário img type
            $tmp_name = $_FILES['image']['tmp_name']; // este nome temporário é usado para salvar/mover arquivo em nossa pasta
          
            // explorar imagem e obter a última extensão como png jpg
            $img_explode = explode(".", $img_name);
            $img_ext = end($img_explode); // aqui temos a extensão de um usuário carregado arquivo img
          
            $extensions = ['png', 'jpeg', 'jpg', 'gif']; //these are some valid img ext and we've store them in array
            if(in_array($img_ext, $extensions) === true){ // se o usuário carregado img  é combinado com quaisquer extensões da extensions
              $time = time(); // isso nos devolverá o tempo atual
                              // precisamos deste tempo, porque quando você faz o upload do usuário img para em nossa pasta, renomeamos o arquivo de usuário com o tempo atual
                              // então todo o arquivo de imagem terá um nome único
                // mova o img do usuário carregado para nossa pasta particular
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name, "../../images-user/".$new_img_name)){ // se usuário uplolad img mover te nossa pasta com sucesso
                  $random_id = rand(time(), 10000000); // criando identificação aleatória para usuário
                  $isAdmin = 'user';
                  $bio = "Estou adorando assistir anime neste site 🍃";
                  $status = "free";
                  $bgimg = "normal-breadcrumb.jpg";
                  $hoje = date('d/m/Y');
                  $nome = str_replace("img", "____", $nome);
                  // inserir todos os dados do usuário dentro da tabela
                  $sql2 = mysqli_query($conn, "INSERT INTO users (idUser, isAdmin, status, datac, username, biografia, email, password, img, bgimg)
                                      VALUES('$random_id','$isAdmin', '$status', '$hoje',  '$nome', '$bio', '$email', '$senha', '$new_img_name', '$bgimg') ");
                if($sql2){ //se esses dados inseridos
                  $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
                  if(mysqli_num_rows($sql3) > 0 ){
                    $row = mysqli_fetch_assoc($sql3);
                    echo "sucesso";
                    $_SESSION['idUser'] = $row['idUser']; 
                  }
                }  
                else{
                  echo "Algo deu errado!"; 
                }
              }  
                } else{
                echo "Por favor, selecione um arquivo de imagem - jpgeg, jpg, png!";
            }
          }
          else{
            echo "Please select an image file!";
          }
        }
        }
      } 
      else{
        echo "$email - este não é um e-mail válido!";
      }
    }

    else{
    echo "todos os campos são necessários";
    }
?>