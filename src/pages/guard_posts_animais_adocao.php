<?php
session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Posts Guardados - Perdidos</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  
  <link rel="stylesheet" href="../../global.css">
  <link rel="stylesheet" href="../styles/animais_perdidos/styles.css">
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
<?php 

include("../php/connection.php");


        //ids de posts para usuario guards
        $user_id = $_SESSION['id'];
        $stmt = $conn->prepare("SELECT post_id FROM guards WHERE user_id = ?");
        $stmt->bind_param("i",$user_id);
        $stmt->execute();

        $ids = array();

        $result = $stmt->get_result();
        while($row = $result->fetch_array(MYSQLI_NUM)){
                foreach($row as $r){
                    $ids[] = $r;
                }
        }



        if(empty($ids)){
               $error_message = "Você não deu Guard em nenhum post ainda!!!";
         }else{



                $ids_of_posts_you_guard = join(",",$ids);  
                
                if( isset($_GET['page_no']) && $_GET['page_no'] != ""){
                    $page_no = $_GET['page_no'];
                }else{
                    $page_no = 1;
                }

                //animais adoção

                $stmt = $conn->prepare("SELECT COUNT(*) as total_posts FROM posts_animais_adocao WHERE id in ($ids_of_posts_you_guard)");
                $stmt->execute();
                $stmt->bind_result($total_posts);
                $stmt->store_result();
                $stmt->fetch();


                $total_posts_per_page = 6;

                $offset = ($page_no-1) * $total_posts_per_page;

                $total_no_of_pages = ceil($total_posts/$total_posts_per_page); 



                $stmt = $conn->prepare("SELECT * FROM posts_animais_adocao WHERE id in ($ids_of_posts_you_guard) ORDER BY id DESC LIMIT $offset,$total_posts_per_page"); 
                $stmt->execute();
                $posts = $stmt->get_result();




       }



?>
 

   <main>
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

  
<script src="../js/main.js"></script>

</body>
</html>