<?php
session_start();
include('../../include/include.php');

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$biografia = mysqli_real_escape_string($conn, $_POST['biografia']);
if (!empty($nome) && !empty($email) && !empty($biografia)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $idUser = $_SESSION['idUser'];
        $nome = str_replace("img", "____", $nome);
        $sql01 = mysqli_query($conn, "SELECT * FROM users WHERE idUser = '$idUser' AND
        email = '$email'");
        if (mysqli_num_rows($sql01) > 0) {
            $sqlupdate = mysqli_query($conn, "UPDATE users SET username = '$nome',
            email = '$email', biografia = '$biografia' WHERE idUser = '$idUser'");
            if ($sqlupdate) {
                echo "sucesso";
            } else {
                echo "error ao finalizar";
            }
        } else {
            $sql02 = mysqli_query($conn, "SELECT * FROM users WHERE idUser = '$idUser'");
            if (mysqli_num_rows($sql02) > 0) {
                echo "$email - ja existe uma conta com este email";
            } else {
                
                $sqlupdate = mysqli_query($conn, "UPDATE users SET username = '$nome',
                email = '$email', biografia = '$biografia' WHERE idUser = '$idUser'");
                if ($sqlupdate) {
                    echo "sucesso";
                } else {
                    echo "error ao finalizar";
                }
            }
        }
    } else {
        echo "$email - este email não e valido";
    }
} else {
    echo "Preencher todos os campos";
}
