<?php

session_start();

include("../../php/connection.php");


if(isset($_POST['login_btn'])){

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT id, username_admin, data_nascimento_admin, email_admin
                            FROM administrador WHERE email_admin = ? AND senha_admin = ?");

    $stmt->bind_param("ss",$email, $password);
    
    $stmt->execute();

    $stmt->store_result();

    //se tiver um usuario com esse email e essa senha
    if($stmt->num_rows() > 0){
        $stmt->bind_result($id,$username,$data_nascimento,$email);
        $stmt->fetch();

        $_SESSION['id']=$id;
        $_SESSION['username_admin']=$username;
        $_SESSION['data_nascimento_admin']=$data_nascimento;
        $_SESSION['email_admin']=$email;

        header('location: home_adm.php');

    }else{

        header('location: login_adm.php?error_message=Email/pasword incorrect');
        exit;

    }


}else{

    header('location: login.php?error_message=Error happened, try again');
    exit;


}



?>