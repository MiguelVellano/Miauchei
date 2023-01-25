<?php


session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}


?>
<?php 
include("../php/connection.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animais Perdidos - Miauchei</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <link rel="stylesheet" href="../../global.css">
  <link rel="stylesheet" href="../styles/animais_perdidos/styles.css">
  <link rel="stylesheet" href="../styles/components/header/styles.css">



  <style>
    p{
      margin: 0;

    }

    ul.list{
      display: flex;
      flex-direction: column;
      gap: 12px;

      list-style: none;
    }

    ul.list li:nth-child(even){
      background-color: #c9c9c9;
    }

    ul.list li {
      background-color: #fff;
      border-radius: 8px;
      height: 90px;
      font-size: 20px;
      border: none;

      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    
    }

    ul.list li img {
      height: 100%;
      width: 100px;
    }

    ul.list li button {
      background-color: #fff;
      padding: 10px 20px;
      border-radius: 12px;
    }

    ul.list li button:hover{
      transform: scale(1.05);
      transition-duration: 300ms;
    }
  </style>
</head>
<body>

<header>
    <section class="header-content">
      <nav>
        <a href="../../home.php" id="logo"><img src="../images/iconsMiauchei/miauchei.svg" alt="Logo Miauchei"></a>
        <button id="btn-mobile"><img src="src/images/svg/menubar.svg" alt=""></button>
        <ul id="menu-header">
          <li><a href="../../home.php">Início</a></li>
          <li><a href="animais_perdidos.php">Animais Perdidos</a></li>
          <li><a href="animais_adocao.php">Adoção</a></li>
          <li><a href="#">Sobre nós</a></li>
        </ul>
      </nav>  

      <section class="action">
        <section class="profile">
            <img src="<?php echo "../images/testimodial/img/imagens_usuarios/".$_SESSION['image'];  ?>" alt="Adicionar Foto" width="50" height="50">
        </section>

        <section class="menu">
          <h3><?php  echo "Olá, ".$_SESSION['username'];
        ?></h3>
          <ul>
            <li><a href="profile.php">Meu Perfil<img src="../images/svg/nameInput.svg" alt=""></a></li>  
            <li><a href="update_profile.php">Editar Perfil <img src="../images/svg/gear-solid.svg" alt=""></a></li>
            <li><a href="guard_posts_animais_perdidos.php">Posts Salvos Perdidos <img src="../images/svg/star-regular.svg" alt=""></a></li>
            <li><a href="guard_posts_animais_adocao.php">Posts Salvos Adoção <img src="../images/svg/star-regular.svg" alt=""></a></li>
            <li><a href="search_pesquisa.php">Pesquisar usuarios <img src="../images/svg/lupa.svg" alt=""></a></li>
            <li><a href="">Ajuda <img src="../images/svg/circle-question-regular.svg" alt=""></a></li>
            <li><a href="logout.php">Sair <img src="../images/svg/right-from-bracket-solid.svg" alt=""></a></li>
          </ul>
        </section>

      </section>
    </section>
  </header>

<main>

<?php

    if(isset($_POST['search_input'])){

            $search_input = $_POST['search_input'];


            $stmt = $conn->prepare("SELECT * FROM usuario WHERE username like ? LIMIT 20");
            $search_input = "%".$search_input."%";
            $stmt->bind_param("s",$search_input);
            $stmt->execute();
            $users = $stmt->get_result();


    }else{

            //keyword padrão
            $search_input = $_POST['search_input'];


            $stmt = $conn->prepare("SELECT * FROM usuario WHERE username like ? LIMIT 20");
            $search_input = "%".$search_input."%";
            $stmt->bind_param("s",$search_input);
            $stmt->execute();
            $users = $stmt->get_result();


    }

           


?>


    <section>
        <ul class="list">


        <?php foreach($users as $user){ ?>

            <?php if($user['cod_usuario'] != $_SESSION['id']){ ?>

            <li>
                <img src="<?php echo "../images/testimodial/img/imagens_usuarios/".$user['image']; ?>"/>
                <section>
                    <p><?php echo $user['username'];?></p>
                    <span><?php echo substr($user['bio'],0,20); ?></span>
                </section>
                <section class="search-result-item-btn">
                    <form action="other_user_profile.php" method="POST">
                        <input type="hidden" name="other_user_id" value="<?php echo $user['cod_usuario']; ?>">
                        <button type="submit" class="btn-view-profile">Visitar Perfil</button>
                    </form>
                </section>
            </li>

            <?php } ?>

         <?php } ?> 


        </ul>
    </section>
     
</main>

  <script src="../js/main.js"></script>
</body>
</html>