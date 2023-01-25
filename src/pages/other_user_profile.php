<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuário - Miauchei</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" href="../../global.css">
  <link rel="stylesheet" href="../styles/profiles/user/styles.css">
  <link rel="stylesheet" href="../styles/components/header/styles.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
      <section class="profile-container">

<?php

include("../php/connection.php");

  if(isset($_POST['other_user_id']) || isset($_SESSION['other_user_id'])){

     if(isset($_SESSION['other_user_id'])){
         $other_user_id = $_SESSION['other_user_id'];
     }

     if(isset($_POST['other_user_id'])){
         $other_user_id = $_POST['other_user_id'];
         $_SESSION['other_user_id'] = $other_user_id;
     }


     $stmt = $conn->prepare("SELECT * FROM usuario WHERE cod_usuario = ?");
     $stmt->bind_param("i",$other_user_id);

     if($stmt->execute()){
        $user_array = $stmt->get_result();

     }else{
         header("location: ../../home.php");
         exit;
     }


  }else{

    header("location: ../../home.php");
    exit;

  }


?>


        <?php foreach($user_array as $user){?>
          <section class="profile">
              <section class="profile-image">
                  <img src="<?php echo "../images/testimodial/img/imagens_usuarios/".$user['image'];  ?>" alt="Adicionar Foto" width="50" height="50">
              </section>
              <section class="profile-user-settings">
                  <img src="<?php echo "Foto:" ?><?php echo "../images/testimodial/img/imagens_usuarios/".$user['image'];  ?>" alt="">
                  <h1 class="profile-user-name"> <?php echo $user['username']; ?> </h1>
                  
                  <button class="profile-btn profile-settings-btn" id="options_btn" aria-label="profile settings">
                        <i class="fas fa-cog"></i>
                  </button>

              </section>
              <section class="profile-stats">
                  <ul>
                      <li><span class="profile-stat-count"><?php echo $user['posts']; ?></span> - Posts criados</li>

                    

                      
                  </ul>
              </section>
              <section class="profile-bio">
                  <p><span class="profile-real-name"></span> <?php echo $user['bio']; ?></p>
              </section>
          </section>
          </section>
        <?php } ?>

      <section class="gallery">
      <h2 style="font-size: 3rem; font-weight: 700; color:black; padding: 3rem;">Seus Posts</h2>


  <!-- Criando a listagem -->
<ul class="abas">
    <!-- Aqui, criação da primeira aba -->
    <li class="aba" id="aba-1">
      <a href="#aba-1">Posts - Animais Perdidos</a>
      <section class="conteudo">  
        
        <?php include("get_other_user_posts_animais_perdidos.php"); ?>
        
        
        <section class="feed">   
          
          <?php foreach($posts as $post){ ?>
     <section class="pet-card">
        <section class="image-card">
          <img src="<?php echo "../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>


          <?php include('check_if_user_guard_this_post.php'); ?>

                            <?php if($user_guard_this_post){ ?>

                                <form action="other_user_unguard_this_post_animais_perdidos.php" method="POST" class="star">
                                     <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                                     <button style="color:blueviolet;" class="heart" type="submit" name="heart_btn">
                                        <i class="icon fas fa-star"></i>
                                     </button>
                                 </form> 


                            <?php } else { ?>    
                                 <form action="other_user_guard_this_post_animais_perdidos.php" method="POST" class="star">
                                     <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                                     <button class="heart" type="submit" name="heart_btn">
                                        <i class="icon fas fa-star"></i>
                                     </button>
                                 </form> 
                             
                            <?php } ?>      
          
         <section class="tags"><span class="pet-tag">
          <?php echo $post['raca']; ?> 
         </span> 
           <span class="situacao-tag">Perdido</span> 
           <span class="data-tag"><?php echo date("d-m-Y", strtotime($post['data_que_perdeu']));?></span>
         </section>
          
          <section class="desc-pet">
            <h1>
              <?php echo $post['nome_pet'];?>
            </h1>
            <p class="<?php echo $post['descricao']; ?>">
            </p>

            <button>
              <a href="petprofile_perdidos.php?post_id=<?php echo $post['id']; ?>">Ver detalhes...</a>
            </button>

          </section>
          </section>
      </section>      
                  
        
        <?php } ?>
        </section>
</section></li>
<!-- Aqui, criação da segunda aba -->
    <li class="aba" id="aba-2">
     <a href="#aba-2">Posts - Animais para Adoção</a> 

     <section class="conteudo"> 
       
        <?php include("get_other_user_posts_animais_adocao.php"); ?>
       
             
             <section class="feed">   
           <?php foreach($posts as $post){ ?>
       
      <section class="pet-card">
        <section class="image-card">
          <img src="<?php echo "../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>

                          <?php include('check_if_user_guard_this_post.php'); ?>

                            <?php if($user_guard_this_post){ ?>

                                <form action="other_user_unguard_this_post_animais_adocao.php" method="POST" class="star">
                                     <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                                     <button style="color:green;" class="heart" type="submit" name="heart_btn">
                                        <i class="icon fas fa-star"></i>
                                     </button>
                                 </form> 


                            <?php } else { ?>    
                                 <form action="other_user_guard_this_post_animais_adocao.php" method="POST" class="star">
                                     <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                                     <button class="heart" type="submit" name="heart_btn">
                                        <i class="icon fas fa-star"></i>
                                     </button>
                                 </form> 
                             
                            <?php } ?> 
          
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

            <button>
              <a href="petprofile_adocao.php?post_id=<?php echo $post['id']; ?>">Ver detalhes...</a>
            </button>

          </section>
          </section>
      </section>      
      <?php } ?>    
    </section></li>
</ul>
   </main> 

<script src="../js/main.js"></script>

</body>
</html>
