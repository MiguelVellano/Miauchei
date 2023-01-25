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

if(isset($_GET['post_id'])){

    $post_id = $_GET['post_id'];
    $stmt = $conn->prepare("SELECT * FROM posts_animais_adocao WHERE id = ?");
    $stmt->bind_param('i',$post_id); 
    $stmt->execute();
    $post_array = $stmt->get_result();



          /** Pegar & Paginar Comentarios */

                if( isset($_GET['page_no']) && $_GET['page_no'] != ""){
                    $page_no = $_GET['page_no'];
                }else{
                    $page_no = 1;
                }




}else{
    header("location: animais_adocao.php");
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br" id="html">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do pet - Miauchei</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" href="../../global.css">
  <link rel="stylesheet" href="../styles/profiles/pet/styles.css">
  <link rel="stylesheet" href="../styles/components/header/styles.css">
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
          <li><a href="../../sobre_nos.php">Sobre nós</a></li>
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
    <?php foreach($post_array as $post){ ?>


    <section class="profile">
      <section class="editor">
          <img src="<?php echo "../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>
      </section>

      <section class="pet">
        <section class="avatar">

          <h1><?php echo "".$post['nome_pet']; ?></h1>
        </section>

          <section class="content">

          <section class="address">
            <img src="../images/svg/pin.svg" alt="Icone Endereço"> <span>Santa Isabel</span>
          </section>

          <section class="status">
            <img src="../images/svg/status.svg" alt=""> <span>Desaparecido</span>
          </section>
        </section>
      </section>

      <a class="find-pet" target="_blank" href="https://wa.me/5511992988091">Adotar</a>
    </section>

      <section class="features">
        <table>
          <thead>
            <tr>
              <th>Características</th>
            </tr>

            <tr>
              <th><?php echo "".date("d-m-y", strtotime($post['date']));?></th>
            </tr>
          </thead>

          <tbody>
            <tr>
                <th>
                  <img src="../images/svg/tableprofile.svg" alt="Nome do user"> <span><?php echo $post['username']; ?></span>
                
                <section class="search-result-item-btn">
                    <form action="other_user_profile.php" method="POST">
                        <input type="hidden" name="other_user_id" value="<?php echo $post['user_id']; ?>">
                        <button type="submit">Visitar Perfil</button>
                    </form>
                </section>



                </th>
                
                <td>
                <img src="../images/svg/tabledog.svg" alt="Guards do Pet">
                  <span><?php echo "Salvaram o post: ".$post['guards'];?></span>
              </td>
            </tr>

            <tr>

              <th><img src="../images/svg/tablecake.svg" alt="Idade do pet">
              <span><?php echo "".$post['idade_pet'];?></span></th>
            </tr>

            <tr>
              <th><img src="../images/svg/tablepaw.svg" alt="Raça do Pet">
                <span><?php echo "".$post['raca'];?></span>
              </th>

              <th><img src="../images/svg/tablesex.svg" alt="Sexo do Pet">
              <span><?php echo "".$post['sexo'];?></span></th>
            </tr>

          </tbody>
        </table>
      </section>

      <section class="description">
        <section class="description-content">
          <h1>
            Descrição
          </h1>

          <textarea name="" id="desc" cols="30" rows="10" readonly><?php echo $post['descricao'];?></textarea>
        </section>
      </section>
  </section>

  <section class="maps">
    <section class="text-map">
      <img src="../images/svg/pin.svg" alt="" srcset="">
      <h1><?php echo $post['bairro'].", ".$post['cidade'];?></h1>
    </section>
      <section class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773123.1787283574!2d-50.87934397308944!3d-22.553259905437443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce597d462f58ad%3A0x1e5241e2e17b7c17!2sS%C3%A3o%20Paulo!5e0!3m2!1spt-BR!2sbr!4v1665083132315!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    </section>
    <span class="close-window"><a href="animais_adocao.php"><img src="../images/svg/arrowLeft.svg" alt=""></a></span>
    <?php } ?>
  </main>
  <script src="../js/main.js"></script>
</body>
</html>