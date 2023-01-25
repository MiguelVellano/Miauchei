<?php
session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login_adm.php");
    exit;
}


?>
<?php 
session_start();
include("../../php/connection.php");
include('../../php/get_latest_posts_adocao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animais Adoção - Miauchei</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <link rel="stylesheet" href="../../../global.css">
  <link rel="stylesheet" href="../../styles/animais_perdidos/styles.css">
  <link rel="stylesheet" href="../../styles/components/header/styles.css">
</head>
<body>

<header>
    <section class="header-content">
      <nav>
        <a href="home_adm.php" id="logo"><img src="../../images/iconsMiauchei/miauchei.svg" alt="Logo Miauchei"></a>
        <button id="btn-mobile"><img src="src/images/svg/menubar.svg" alt=""></button>
        <ul id="menu-header">
          <li><a href="home_adm.php">Início</a></li>
          <li><a href="animais_perdidos_adm.php">Animais Perdidos</a></li>
          <li><a href="animais_adocao_adm.php">Adoção</a></li>
          <li><a href="search_pesquisa.php">Pesquisar Usuário</a></li>
        </ul>
      </nav>
    </section>
  </header>
  <main>
    <section class="feed"> 
      <?php foreach($posts as $post){ ?>  
      <section class="pet-card">
        <section class="image-card">
          <img src="<?php echo "../../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>
          
         <section class="tags"><span class="pet-tag">
          <?php echo $post['raca']; ?> 
         </span> 
           <span class="situacao-tag1">Adoção</span> 
         </section>
          
          <section class="desc-pet">
            <h1>
              <?php echo $post['nome_pet'];?>
            </h1>
            <p class="<?php echo $post['descricao']; ?>">
            </p>

            <a href="petprofile_adocao.php?post_id=<?php echo $post['id']; ?>">
              <button>
              Ver detalhes...
            </button>
            </a>

          </section>
          </section>
      </section>      
      <?php } ?>    
    </section>
  </main>
  <footer>
  <!--Ionicons-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <ul class="icons">
    <li><a href="https://www.tiktok.com/@miauchei?_t=8WpJ6jITVvZ&_r=1"><ion-icon name="logo-tiktok"></ion-icon></a></li>
    <li><a href="https://www.facebook.com/people/miauchei_/100085605950822/"><ion-icon name="logo-facebook"></ion-icon></a></li>
    <li><a href="https://www.instagram.com/miauchei_/"><ion-icon name="logo-instagram"></ion-icon></a></li>
  </ul>
  <ul class="menu1">
  <br>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Parceiros</a></li>
        <li><a href="#">Contate-nos</a></li>
  </ul>
    <section class="footer-copyright">
        <p>Copyright @ 2022 All Rights Reserved to MiAuchei.</p>
    </section>
  </footer>
  <script src="../js/main.js"></script>
</body>
</html>