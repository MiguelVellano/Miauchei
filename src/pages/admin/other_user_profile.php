<?php  
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuário - Miauchei</title>

  <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" href="../../../global.css">
  <link rel="stylesheet" href="../../styles/profiles/user/styles.css">
  <link rel="stylesheet" href="../../styles/components/header/styles.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

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
      <section class="profile-container">
              <section class="profile-user-settings">

                  <section class="popup" id="popup">
                      <section class="popup-window">
                          <span class="close-popup" id="close_popup">&times;</span>
                          <form action="delete_conta_perfil_usuario.php" method="POST">
                            <section href="javascript: if(confirm('Tem Certeza que quer deletar a conta?')); location.href='delete_conta_perfil_usuario.php'">
                                <input name="delete_conta_perfil_usuario" id="delete_conta_perfil_usuario" type="submit" class="update-profile-btn" value="Deletar Conta">
                            </section>

                          </form>
                      </section>
                  </section>
              </section>
<?php

include("../../php/connection.php");

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
         header("location: home_adm.php");
         exit;
     }


  }else{

    header("location: home_adm.php");
    exit;

  }


?>


        <?php foreach($user_array as $user){?>
          <section class="profile">
              <section class="profile-image">
                  <img src="<?php echo "../../images/testimodial/img/imagens_usuarios/".$user['image'];  ?>" alt="Adicionar Foto" width="50" height="50">
              </section>
              <section class="profile-user-settings">
                  <img src="<?php echo "Foto:" ?><?php echo "../../img/imagens_usuarios/".$user['image'];  ?>" alt="">
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
          <img src="<?php echo "../../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>  
          
         <div class="tags"><span class="pet-tag">
          <?php echo $post['raca']; ?> 
         </span> 
           <span class="situacao-tag">Perdido</span> 
           <span class="data-tag"><?php echo date("d-m-Y", strtotime($post['data_que_perdeu']));?></span>
         </div>
          
          <div class="desc-pet">
            <h1>
              <?php echo $post['nome_pet'];?>
            </h1>
            <p class="<?php echo $post['descricao']; ?>">
            </p>

            <button>
              <a href="petprofile_perdidos.php?post_id=<?php echo $post['id']; ?>">Ver detalhes...</a>
            </button>
            <section class="edit_posts">
            <form action="delete_post_animais_perdidos.php" method="POST">
                <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                <input class="delete-post-btn" type="submit" name="delete_post_btn" value="Delete post">
            </form>
            </section>
          </div>
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
          <img src="<?php echo "../../images/testimodial/img/imagens_posts/". $post['image'];?>" class="post-image"/>
          
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

            <button>
              <a href="petprofile_adocao.php?post_id=<?php echo $post['id']; ?>">Ver detalhes...</a>
            </button>
                 <section class="edit_posts">
                    <form action="delete_post_animais_adocao.php" method="POST">
                        <input type="hidden" name="post_id" value="<?php echo $post['id'];?>">
                        <input class="delete-post-btn" type="submit" name="delete_post_btn" value="Delete post">
                    </form>
                 </section>
          </div>
          </section>
      </section>      
      <?php } ?>    
    </section></li>
</ul>
   </main> 
   <script>


         var popupWindow = document.getElementById('popup');
         var optionsBtn = document.getElementById('options_btn');
         var closeWindow = document.getElementById('close_popup');


       optionsBtn.addEventListener("click",(e)=>{
            e.preventDefault();
            popupWindow.style.display = "block";
       })         

       closeWindow.addEventListener("click",(e)=>{
           e.preventDefault();
           popupWindow.style.display = "none";
       })

       window.addEventListener("click",(e)=>{
           if(e.target == popupWindow){
               popupWindow.style.display = "none";
           }
       })


   </script>
</body>
</html>
