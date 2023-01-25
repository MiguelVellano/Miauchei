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
include('../php/get_latest_posts_adocao.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animais Adoção - Miauchei</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <link rel="stylesheet" href="../../global.css">
  <link rel="stylesheet" href="../styles/animais_perdidos/styles.css">
  <link rel="stylesheet" href="../styles/components/header/styles.css">
</head>
<body>

<header>
    <div class="header-content">
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
    

      <div class="action">
        <div class="profile">
            <img src="<?php echo "../images/testimodial/img/imagens_usuarios/".$_SESSION['image'];  ?>" alt="Adicionar Foto" width="50" height="50">
        </div>

        <div class="menu">
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
        </div>

      </div>
    </div>
  </header>

  <main>
     <section id="anuncio">
      <h1>Adoção? <br> Gostaria de anunciá-lo?</h1>

      <button href="#" class="anunciar">Anunciar</button>

      <dialog class="pop-dialog">
        
        <form action="create_post_animais_adocao.php" method="POST" enctype="multipart/form-data">
          <h1>
              Anuncie seu pet para adoção!
          </h1>
          <fieldset>
            <title>Anunciar o pet para adoção</title>
          
            <div class="input-wrapper">
              <label for="nome">Nome*</label>
              <input type="text" name="nome_pet" placeholder="Ralph..." required>
            </div>
       
            <div class="input-wrapper">
              <label for="animal">Animal*</label>
              <select name="animal" id="animal" required>
              <option value="" disabled selected style="display:none; color:gray;">Qual é o animal?</option>
              <option value="<option value='' disabled selected style='display:none; color:gray;'>Escolha uma Raça Canina...</option>
                <optgroup label='Cachorro'>
                <option value='Pomerânia'>Pomerânia</option>
                <option value='Bulldog'>Bulldog</option>
                <option value='Shih-Tzu'>Shih-Tzu</option>
                <option value='Rottweiler'>Rottweiler</option>
                <option value='Pug'>Pug</option>
                <option value='Golden'>Golden</option>
                <option value='Pastor Alemão'>Pastor Alemão</option>
                <option value='Yorkshire'>Yorkshire</option>
                <option value='Border Collie'>Border Collie</option>
                <option value='Vira-Lata'>Vira-Lata</option>">Cachorro</option>
              <option value="<option value='' disabled selected style='display:none; color:gray;'>Escolha uma Raça Felina...</option>
                <optgroup label='Gato'>  
                <option value='Siamês'>Siamês</option>
                <option value='Persa'>Persa</option>
                <option value='Angorá'>Angorá</option>
                <option value='Maine Coon'>Maine Coon</option>
                <option value='Exótico'>Exótico</option>
                <option value='Ragboll'>Ragboll</option>
                <option value='Abissínio'>Abissínio</option>
                <option value='Devon Rex'>Devon Rex</option>
                <option value='Vira-Lata'>Vira-Lata</option>">Gato</option>
              <option value="<option value='' disabled selected style='display:none;'>Indisponível</option>">Outro</option>
            </select>
          </div>
          
          <div class="input-wrapper">
            <label for="raca">Raça</label>
            <select name="raca" id="raca" placeholder="Raça" required>
              <option value="" disabled selected style="display:none; color:gray;">Escolha uma Raça...</option>
            </select>  
          </div>
          
          <script>
            window.onload = function(){
          document.querySelector('select').addEventListener('change', function()
          {    
            document.querySelector("#raca").innerHTML = this.value; 
              });
          };
          </script>
            

            <div class="input-wrapper">
              <label for="sexo">Sexo*</label>
              <select name="sexo" id="sexo" placeholder="Sexo">
                <option value="Macho">Macho</option>
                <option value="Fêmea">Fêmea</option>
              </select>
            </div>

            <div class="input-wrapper">
              <label for="idade">Idade*</label>
              <input type="number" name="idade" placeholder="Idade" required>
            </div>
            
            <label for="endereco" style="font-weight: bold;">Endereço</label>
            <div class="input-wrapper">
            <label for="cid">Cidade*</label>
            <input type="text" name="cidade" placeholder="Cidade" required>  
            </select>  
          </div>

          <div class="input-wrapper">
            <label for="raca">Bairro*</label>
            <input type="text" name="bairro" placeholder="Bairro" required>  
            </select>  
          </div>

            <div class="input-wrapper">
              <label for="descricao">Descrição</label>
              <textarea type="text" name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
            </div>

            <div class="input-wrapper">
              <label for="nome">Foto*</label>
              <input type="file" name="image" required>
            </div>

            <button type="submit" class="send-form" name="upload_image_btn">Enviar</button>

            <span class="close-window"><img src="../images/svg/arrowLeft.svg" alt=""></span>
          </fieldset>
        </form>
      </dialog>
    </section>

    <section class="feed"> 
      <?php foreach($posts as $post){ ?>  
      <section class="pet-card">
        <section class="image-card">
          <img src="<?php echo "../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>

                          <?php include('check_if_user_guard_this_post.php'); ?>

                            <?php if($user_guard_this_post){ ?>

                                <form action="unguard_this_post_animais_adocao.php" method="POST" class="star">
                                     <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                                     <button style="color:green;" class="heart" type="submit" name="heart_btn">
                                        <i class="icon fas fa-star"></i>
                                     </button>
                                 </form> 


                            <?php } else { ?>    
                                 <form action="guard_this_post_animais_adocao.php" method="POST" class="star">
                                     <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                                     <button class="heart" type="submit" name="heart_btn">
                                        <i class="icon fas fa-star"></i>
                                     </button>
                                 </form> 
                             
                            <?php } ?> 
          
         <div class="tags"><span class="pet-tag">
          <?php echo $post['raca']; ?> 
         </span> 
           <span class="situacao-tag1">Adoção</span> 
         </div>
          
          <div class="desc-pet">
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

          </div>
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
