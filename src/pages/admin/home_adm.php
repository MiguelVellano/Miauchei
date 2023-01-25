<?php


session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login_adm.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Miauchei - Site Oficial</title>
  <meta name="description" content="Plataforma para pets!">
        <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../../owlcarousel/owl.theme.default.min.css">  
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../global.css">
    <link rel="stylesheet" href="../../styles/home/styles.css">
    <link rel="stylesheet" href="../../styles/components/header/styles.css">
  <script src="../../js/main.js" defer></script>

  <link rel="stylesheet" href="https://app.boteria.com.br/cdn/webchat/webchat.v2.css" />
  <script src="https://app.boteria.com.br/cdn/libs/showdown.min.js"></script>
  <script src="https://app.boteria.com.br/cdn/libs/axios.js"></script>
  <script src="https://app.boteria.com.br/cdn/libs/socket.io.js"></script>
  <script src="https://app.boteria.com.br/cdn/webchat/webchat.js"></script>
</head>

<body id="body">
<!--<===============MENU/CABEÇALHO==================>-->
<header>
  <div class="header-content">
    <nav>
      <a href="#" id="logo"><img src="../../images/iconsMiauchei/miauchei.svg" alt="Logo Miauchei"></a>
      <button id="btn-mobile"><img src="../../images/svg/menubar.svg" alt=""></button>
      <ul id="menu-header">
        <li><a href="#">Início</a></li>
        <li><a href="animais_perdidos_adm.php">Animais Perdidos</a></li>
        <li><a href="animais_adocao_adm.php">Adoção</a></li>
        <li><a href="search_pesquisa.php">Pesquisar Usuário</a></li>
      </ul>
    </nav>

  </div>
</header>
  <main>
    <section class="home">

      <!----Text------>
      <section class="content_home">
      <section class="text_home">
        <h2 id="sub_home"><div>👋</div> <span>Seja Bem-vindo!</span></h2>
        <h1 id="title_home">Miauchei, ajude os outos a acharam seus melhores amigos!</h1>
      </section>  

</body>
</html>
