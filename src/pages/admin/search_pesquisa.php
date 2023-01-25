<?php


session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login_adm.php");
    exit;
}


?>
<?php 
include("../../php/connection.php");
include('../../php/get_latest_posts_perdidos.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animais Perdidos - Miauchei</title>

  <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <link rel="stylesheet" href="../../../global.css">
  <link rel="stylesheet" href="../../styles/animais_perdidos/styles.css">
  <link rel="stylesheet" href="../../styles/components/header/styles.css">
</head>
<body>

<header>
    <div class="header-content">
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
    
    </div>
  </header>

<main>
     <form action="search_users.php" method="POST" class="">
        <input type="text" name="search_input" placeholder="Ex: Roberto" class="">
      </form>
</main>
</body>
</html>