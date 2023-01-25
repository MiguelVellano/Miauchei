<?php
session_start();

include("../php/connection.php");


if(isset($_POST['signup_btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $password = md5($_POST['password']);
    $password_confirm = md5($_POST['password_confirm']);
    $imagem_placeholder = "user.jpeg";
    $posts = 0;

    //fazer as senhas baterem
    if($password != $password_confirm){
        header('location: signup.php?error_message="<span style="color:white;">As senhas não combinam!</span>"');
        exit;
    }

    //checar se o usuario existe
    $stmt = $conn->prepare("SELECT cod_usuario FROM usuario WHERE username = ? OR email = ?");
    $stmt->bind_param("ss",$username,$email);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows() > 0){
        header("location: signup.php?error_message='<span style='color:white;'>Usuário já existe!</span>'");
        exit;
    }else{
        

        $stmt = $conn->prepare("INSERT INTO usuario (image,username,email,data_nascimento,telefone,senha,posts) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssi",$imagem_placeholder,$username,$email,$data_nascimento,$telefone,$password,$posts);

        //se o usuario for criado com sucesso, retornar info do usuario
        if($stmt->execute()){
    
        
        $stmt = $conn->prepare("SELECT cod_usuario,username,email,data_nascimento,telefone,image,posts,bio FROM usuario WHERE username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        // se causar erro, tirar esse comentário $stmt->bind_result($id,$username,$email,$data_nascimento,$telefone,$image,$posts,$bio);
        $stmt->fetch();

        $_SESSION['id']=$id;
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['data_nascimento']=$data_nascimento;
        $_SESSION['image']=$image;
        $_SESSION['posts']=$posts;
        $_SESSION['bio']=$bio;
        $_SESSION['telefone']=$telefone;

        header("location: ../../home.php");

        }else{
            header('location: signup.php?error_message=error occured');
            exit;
        }
    }




       


}else{

  header("location: signup.php?error_message=error occured");

}




?>
