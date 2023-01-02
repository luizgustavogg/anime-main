<?php
include("../../include/include.php");
session_start();
$idAnime = $_SESSION['idAnime'];

                          $sqlcomentario = mysqli_query($conn, "SELECT * FROM comentario WHERE FK_idAnime = '$idAnime'");
                          while($rowcomentario = mysqli_fetch_array($sqlcomentario)){
                            $sqluser = mysqli_query($conn, "SELECT * FROM users WHERE idUser =". $rowcomentario['FK_idUser']);
                            $rowuser = mysqli_fetch_assoc($sqluser);
                            echo"
        <div class='anime__review__item'>
          <div class='anime__review__item__pic'>
              <img src='../images-user/". $rowuser['img'] ."' alt=''>
         </div>
        <div class='anime__review__item__text'>
                <h6>". $rowuser['username']." - <span>". $rowcomentario['datac'] ."</span></h6>
             <p>". $rowcomentario['descricao'] ."</p>
        </div>
    </div>";
    }
?>