<?php

session_start();

include("../php/connection.php");

if(isset($_POST['upload_image_btn'])){

    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    
        //$profile_image = $_SESSION['image'];

    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $nome_pet = $_POST['nome_pet'];
    $raca = $_POST['raca'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $descricao = $_POST['descricao'];
    $image = $_FILES['image']['tmp_name'];  //file
    $guards = 0;
    $data_perdeu = $_POST['data_perdeu'];
    $date = date("Y-m-d H:i:s");

    if(strlen($descricao) > 250){
        header("location: animais_perdidos.php?error_message=Descrição é muito longa, tente até 250 caracteres");
        exit;
    }

  
    $image_name = strval(time()) . ".jpeg"; //5654564545.jpeg
  

    //criar o post
    $stmt = $conn->prepare("INSERT INTO posts_animais_perdidos (user_id,guards,image,date,username,nome_pet,raca,sexo,idade_pet,descricao,data_que_perdeu,cidade, bairro) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("iisssssssssss",$id,$guards,$image_name,$date,$username,$nome_pet,$raca,$sexo,$idade,$descricao,$data_perdeu,$cidade,$bairro);

    if($stmt->execute()){

        
                //guardar imagem na pasta
                move_uploaded_file($image,"../images/testimodial/img/imagens_posts/".$image_name);
               
                //aumentar o número de posts
                $stmt= $conn->prepare("UPDATE usuario SET posts=posts+1 WHERE cod_usuario = ?");
                $stmt->bind_param("i",$id);
                $stmt->execute();

                $_SESSION['posts'] = $_SESSION['posts'] + 1;
                

                header("location: animais_perdidos.php?success_message=Post foi criado com sucesso&image_name=".$image_name);
                exit;

    }else{
        header("location: animais_perdidos.php?error_message=Ocorreu um erro, tente novamente");
        exit;

    }


}else{
    header("location: animais_perdidos.php?error_message=Ocorreu um erro, tente novamente");
    exit;


}




?>