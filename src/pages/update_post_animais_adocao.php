<?php

session_start();

include("../php/connection.php");

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}


if(isset($_POST['update_post_btn'])){


    $post_id = $_POST['post_id'];
    $old_image_name = $_POST['old_image_name'];
    $nome_pet = $_POST['nome_pet'];
    $raca = $_POST['raca'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $descricao = $_POST['descricao'];
    $new_image = $_FILES['new_image']['tmp_name'];  //file


    if(strlen($descricao) > 250){
        header("location: update_post_animais_perdidos.php?error_message=Descrição é muito longa, tente até 250 caracteres");
        exit;
    }




    if($new_image != ""){
        $image_name = strval(time()) . ".jpeg"; //5654564545.jpeg
    }else{
        $image_name = $old_image_name;
    }






        $stmt = $conn->prepare("UPDATE posts_animais_adocao SET image = ? , nome_pet = ?, raca = ?, sexo = ?, idade_pet = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("ssssssi",$image_name,$nome_pet,$raca,$sexo,$idade,$descricao,$post_id);

        if($stmt->execute()){

            if($new_image != ""){
                 //Guardar imagem na pasta
                move_uploaded_file($new_image,"../../img/imagens_posts/".$image_name);
            }

    

            header("location: profile.php?success_message?Post has been updated successfully");
            exit;

        }else{
            header("location: profile.php?error_message?error occured, try again");
            exit;

        }


    




}else{

    header("location: profile.php?error_message?error occured, try again");
    exit;


}
