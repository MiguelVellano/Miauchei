<?php

session_start();

include("../../php/connection.php");

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}


if(isset($_POST['delete_post_btn'])){

    $post_id = $_POST['post_id'];
    $id = $_SESSION['other_user_id'];
    $stmt = $conn->prepare("DELETE FROM posts_animais_adocao WHERE id = ?");
    $stmt->bind_param("i",$post_id);


    if($stmt->execute()){
       
        //diminuir o número de posts
                $stmt= $conn->prepare("UPDATE usuario SET posts=posts-1 WHERE cod_usuario = ?");
                $stmt->bind_param("i",$id);
                $stmt->execute();

                $_SESSION['posts'] = $_SESSION['posts'] - 1;
        

        header("location: other_user_profile.php?success_message=Post deleted successfully");
        exit;

    }else{
        header("location: other_user_profile.php?error_message=Could not delete post");
        exit;

    }

}else{

    header("location: pagina_adocao_adm.php");
    exit;


}



?>