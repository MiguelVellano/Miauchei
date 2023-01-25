<?php
session_start();

include("../php/connection.php");

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}

      if (isset($_POST['delete_conta_perfil_usuario'])) {
          $delete_id = $_SESSION['id'];
                    
          $sqldelete = 'DELETE FROM usuario WHERE cod_usuario ='.$delete_id.';';
          $sqldelete2 = 'DELETE FROM posts_animais_adocao WHERE user_id ='.$delete_id.';';
          $sqldelete3 = 'DELETE FROM posts_animais_perdidos WHERE user_id ='.$delete_id.';';


        $verificar = mysqli_query($conn, $sqldelete);
        $verificar2 = mysqli_query($conn, $sqldelete2);
        $verificar3 = mysqli_query($conn, $sqldelete3);

      if ($verificar AND $verificar2 AND $verificar3) {
        echo ('<script>window.alert("Deletado com sucesso"); window.location="login.php"</script>');
      }else{
        echo('<script>window.alert("Falha na Deletação"); window.location="profile.php"</script>');
      }

    }

?>
