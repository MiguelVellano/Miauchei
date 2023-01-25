<?php


session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: src/pages/login.php");
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
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="global.css">
  <link rel="stylesheet" href="./src/styles/sobre_nos/styles.css">
  <link rel="stylesheet" href="./src/styles/components/header/styles.css">
</head>

<body id="body">
  <!--<===============MENU/CABEÇALHO==================>-->
  <header>
  <div class="header-content">
    <nav>
      <a href="#" id="logo"><img src="src/images/iconsMiauchei/miauchei.svg" alt="Logo Miauchei"></a>
      <button id="btn-mobile"><img src="src/images/svg/menubar.svg" alt=""></button>
      <ul id="menu-header">
        <li><a href="#">Início</a></li>
        <li><a href="src/pages/animais_perdidos.php">Animais Perdidos</a></li>
        <li><a href="src/pages/animais_adocao.php">Adoção</a></li>
        <li><a href="#">Sobre nós</a></li>
      </ul>
    </nav>
  

      <div class="action">
        <div class="profile">
            <img src="<?php echo "./src/images/testimodial/img/imagens_usuarios/".$_SESSION['image'];  ?>" alt="Adicionar Foto" width="50" height="50">
        </div>

        <div class="menu">
          <h3><?php  echo "Olá, ".$_SESSION['username'];
        ?></h3>
          <ul>
            <li><a href="src/pages/profile.php">Meu Perfil<img src="src/images/svg/nameInput.svg" alt=""></a></li>  
            <li><a href="src/pages/update_profile.php">Editar Perfil <img src="src/images/svg/gear-solid.svg" alt=""></a></li>
            <li><a href="src/pages/guard_posts_animais_perdidos.php">Posts Salvos Perdidos <img src="src/images/svg/star-regular.svg" alt=""></a></li>
            <li><a href="src/pages/guard_posts_animais_adocao.php">Posts Salvos Adoção <img src="src/images/svg/star-regular.svg" alt=""></a></li>
            <li><a href="src/pages/search_pesquisa.php">Pesquisar usuarios <img src="src/images/svg/lupa.svg" alt=""></a></li>
            <li><a href="">Ajuda <img src="src/images/svg/circle-question-regular.svg" alt=""></a></li>
            <li><a href="src/pages/logout.php">Sair <img src="src/images/svg/right-from-bracket-solid.svg" alt=""></a></li>
          </ul>
        </div>

      </div>
  </div>
</header>
  <!--<======================================================>-->

  <main>
    <section class="sobre_nos">
      <!----Text------>
      <section class="content">
        <h2 id="title"><span id="title_content">Sobre Nós - Miauchei</span></h2>
        <section class="content_txt">
          <p>O projeto tem como objetivo criar uma comunidade para ajudar animais abandonados e perdidos. Uma
            plataforma online onde pessoas de diversas regiões possam procurar seus pets perdidos ou também aquelas que
            queiram ajudar a causa adotando, assim, surge o nome MiAuchei, referenciando-se ao verbo “achar”, além do
            som emitido pelo gato e pelo cachorro.s
            <br>
            Quando alguém perde seu pet a primeira coisa que pode ser feita para um resultado mais eficaz é a divulgação
            do desaparecimento nas redes sociais, prática muito utilizada nos dias atuais por causa da tecnologia
            avançada. Isso ocorre, pois, a internet permite que os seres humanos se comuniquem de qualquer lugar, além
            de ser prático para o cotidiano. Porém, o foco destas plataformas está no entretenimento. Portanto, em
            diversos casos as pessoas ignoram estas publicações, dificultando ainda mais a procura.
          </p>
          <img src="./src/images/1x/miauchei-100-removebg-preview.png">
        </section>
        <section class="content_txt2">
          <img src="./src/images/iconsMiauchei/gato_preto.png">
          <p>
            Dessa forma, a plataforma MiAuchei serve para ser a primeira opção de acesso a esses tipos de casos, onde
            facilitaria a pessoa divulgar de uma forma mais rápida. Não esquecendo também de casos de abandono pois,
            infelizmente, ocorre em alta escala no Brasil, já que não tem leis afetivas para isso.
            Diante disso, indivíduos que encontraram por acaso algum animal sem dono na rua também podem divulgar no
            site, incentivando o ato de adoção, já que ela é capaz de salvar a vida de um bichinho que poderia estar nas
            ruas, morrendo de fome e possivelmente sofrendo de maus tratos.</p>
        </section>
        <section class="content_txt3">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/-MzFHVXUj5I" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <h1>Vídeo Promocional (Música autoral)</h1>
        </section>
        <section class="content_txt4">
          <p>Esse é nosso Projeto de Trabalho de Conclução de Curso (TCC).<br>
          Somos da Etec de Santa Isabel, Recém-formada mas com crescimento em ritmo acelerado a Etec Santa Isabel é atuante na disseminação de conhecimento e formação profissional com o objetivo dar aos jovens maiores oportunidades de aprendizado e colocação no mercado de trabalho.</p>
          <img src="./src/images/testimodial/img/fachada_etecsi.jpg">
        </section>
        <section class="content_txt5">
          <img src="./src/images/testimodial/img/Equipe/tiago.jpg">
          <p>Todo o agradecimento e mérito ao nosso orientador Thiago Melo, que nos auxiliou durante todo o projeto... Graças a ele hoje a Miauchei pode existir!<br>
          Varios outros professores tem o merecimento de ter nos ajudado no aprendizado e no desenvolvimento da plataforma, nós da Miauchei só temos a agradecer por todo o esforço e paciência que fazem para nos tornarmos bons profissionais no Mercado de Trabalho. </p>
        </section>
        <h1 id="title_txt6">Conheça os membros da nossa equipe:</h1>
        <section class="content_txt6">
          <section id="miguel">
            <img src="./src/images/testimodial/img/Equipe/miguel.jpeg">
            <h5>Miguel Vellano</h5>
          </section>
          <section id="lucas">
            <img src="./src/images/testimodial/img/Equipe/lucas_foto.jpg">
            <h5>Lucas Alves</h5>
          </section>
          <section id="joy">
            <img src="./src/images/testimodial/img/Equipe/joy.jfif">
            <h5>Joyce Natali</h5>
          </section>
          <section id="jhow">
            <img src="./src/images/testimodial/img/Equipe/jhow.jfif">
            <h5>Jhonathan Oigres</h5>
          </section>
          <section id="luigi">
            <img src="./src/images/testimodial/img/Equipe/luigi.png">
            <h5>Luigi Carias</h5>
          </section>
          <section id="vinicius">
            <img src="./src/images/testimodial/img/Equipe/vini.jfif">
            <h5>Vinicius Martins</h5>
          </section>
        </section>
      </section>
    </section>
<!--
<footer>
  <--Ionicons->
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
</footer>-->
<script src="src/js/main.js" defer></script>
</body>
</html>
