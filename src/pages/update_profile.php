<?php


session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}


?>
<?php


session_start();

include("../php/connection.php");

if(isset($_POST['update_profile_btn'])){

    $user_id = $_SESSION['id'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $image = $_FILES['image']['tmp_name'];  //file

    if($image != ""){
       $image_name = $username . ".jpeg"; //5.jpeg
    }else{
        $image_name = $_SESSION['image'];
    }



    if($username != $_SESSION['username']){
        //Ter certeza que esse username é único
    
        $stmt = $conn->prepare("SELECT username FROM usuario WHERE username = ?");

        $stmt->bind_param("s",$username);
        
        $stmt->execute();

        $stmt->store_result();

        //there is a user with this username
        if($stmt->num_rows() > 0){
            header("location: edit_profile.php?error_message=Username was already taken");
            exit;

        } else{



            updateUserProfile($conn,$email,$username,$data_nascimento,$telefone,$bio,$image_name,$user_id,$image);

            
    
        }
    
      

    }else{


    

        updateUserProfile($conn,$email,$username,$data_nascimento,$telefone,$bio,$image_name,$user_id,$image);
         

    }

   

    


}else{

    header("location: edit_profile.php?error_message?error occured, try again");
    exit;


}






function updateUserProfile($conn,$email,$username,$data_nascimento,$telefone,$bio,$image_name,$user_id,$image){
    $stmt = $conn->prepare("UPDATE usuario SET email = ?, username = ?, data_nascimento = ?, telefone = ?,bio = ? , image = ? WHERE cod_usuario = ?");
    $stmt->bind_param("ssssssi",$email,$username,$data_nascimento,$telefone,$bio,$image_name,$user_id);

    if($stmt->execute()){

        if($image != ""){
             //Guardar imagem na pasta
            move_uploaded_file($image,"../../img/imagens_usuarios/".$image_name);
        }

        //update session
        $_SESSION['email']=$email;
        $_SESSION['username']=$username;
        $_SESSION['data_nascimento']=$data_nascimento;
        $_SESSION['telefone']=$telefone;
        $_SESSION['bio']=$bio;
        $_SESSION['image']=$image_name;


        updateProfileImageAndUsernameInPostsAnimaisPerdidosTable($conn,$username,$image_name,$user_id);
        updateProfileImageAndUsernameInPostsAnimaisAdocaoTable($conn,$username,$image_name,$user_id);

        header("location: profile.php?success_message?Profile has been updated successfully");
        exit;

    }else{
        header("location: edit_profile.php?error_message?error occured, try again");
        exit;

    }
}


function updateProfileImageAndUsernameInPostsAnimaisPerdidosTable($conn,$username,$image_name,$user_id){

    $stmt = $conn->prepare("UPDATE posts_animais_perdidos SET username = ?, profile_image = ?  WHERE user_id = ?");
    $stmt->bind_param("ssi",$username,$image_name,$user_id);
    $stmt->execute();


}

function updateProfileImageAndUsernameInPostsAnimaisAdocaoTable($conn,$username,$image_name,$user_id){

    $stmt = $conn->prepare("UPDATE posts_animais_adocao SET username = ?, profile_image = ?  WHERE user_id = ?");
    $stmt->bind_param("ssi",$username,$image_name,$user_id);
    $stmt->execute();


}






?>