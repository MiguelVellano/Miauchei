<?php  

session_start();

// Se o id do usuario não está na session, ele não vai estar logado
if(!isset($_SESSION['id'])){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Perfil - Miauchei</title>

  <link rel="shortcut icon" href="../../favicon.ico" type="image/x-icon">
  
  <link rel="stylesheet" href="../../global.css">
  <link rel="stylesheet" href="../styles/components/header/styles.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <style>
.text-center{
    font-size:3rem;
}
form {
  display: flex;
  flex-direction: column;
  gap: 2.4rem;
  margin: 0 auto;
  width: 90%;
  max-width: 70rem;
}
label{
    font-size:1.5rem;
}
form h1 {
  font-size: 3.6rem;
  font-weight: 300;
  text-align: center;
}
input{
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: .6rem;
  font-size: 2rem;
  padding: 1rem;
  height: 5rem;
}

textarea{
    width:100%;
    padding: 1rem;
    min-height: 15rem;
    resize: vertical;
}

#bio{
  display:flex;
  font-size:2rem;  
}
.input:focus {
  border: 2px solid #000;  
}
.update-profile-btn{
    align-items:center;
    padding: 1.2rem 0;
    font-size: 2rem;
    border: none;
    border-radius: 0.8rem;
    cursor: pointer;
    background-color: #67B8E5;
}

.update-profile-btn:hover {
    background-color: #0fB8E5;
    transform: scale(1.03);
    transition-duration: 300ms;
    
}

.main {
    padding-top: 70px;
}

.main h3 {
    font-size: 28px;
    text-align: center;
    margin: 24px auto;
}

.back-arrow img{
    width: 40px;
    height: 40px;
    margin: 1rem;
    position: fixed;
    top: 80px;
    left: 20px;
    cursor: pointer;
}
  
  </style>
</head>
<body>

    <header>
        <div class="header-content">
            <nav>
            <a href="#" id="logo"><img src="../images/iconsMiauchei/miauchei.svg" alt="Logo Miauchei"></a>
            <button id="btn-mobile"><img src="src/images/svg/menubar.svg" alt=""></button>
            <ul id="menu-header">
                <li><a href="#">Início</a></li>
                <li><a href="src/pages/animais_perdidos.php">Animais Perdidos</a></li>
                <li><a href="src/pages/animais_adocao.php">Adoção</a></li>
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

   <section class="main" style="margin-top: 0;">
       <section class="wrapper">
        <section class="left-col">

        <section class="back-arrow"><a href="./profile.php"><img src="../images/svg/arrowLeft.svg"></a></section>

        <h3><?php  echo "Olá, ".$_SESSION['username']; echo " edite aqui o seu perfil!"?></h3>

            <?php if(isset($_GET['error_message'])){ ?>
                <p class="text-center alert-danger"><?php echo $_GET['error_message'];?></p>
            <?php } ?>    

            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                <section class="mb-3">
                    <label for="image">Foto de Perfil</label>
                    <img src="<?php echo "assets/imgs/".$_SESSION['image']; ?>" class="edit-profile-image" alt="">
                    <input type="file" name="image" class="form-control">
                </section>
                <section class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="email" 
                    value="<?php echo $_SESSION['email'] ?>"/>
                </section>
                <section class="mb-3">
                    <label for="username" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="username" 
                          value="<?php echo $_SESSION['username'] ?>"/> 
                </section>
                <section class="mb-3">
                    <label for="data_nascimento" class="form-label">Data de nascimento</label>
                    <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="data_nascimento" 
                          value="<?php echo $_SESSION['data_nascimento'] ?>"/> 
                </section>
                <section class="mb-3">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="telefone" 
                          value="<?php echo $_SESSION['telefone'] ?>" onkeypress="mascara(this)"/>
                          <script type="text/javascript">
                  function mascara(telefone){ 
                      if(telefone.value.length == 0)
                          telefone.value = '(' + telefone.value; //quando começamos a digitar, o script irá inserir um parênteses no começo do campo.
                      if(telefone.value.length == 3)
                          telefone.value = telefone.value + ') '; //quando o campo já tiver 3 caracteres (um parênteses e 2 números) o script irá inserir mais um parênteses, fechando assim o código de área.

                      if(telefone.value.length == 10)
                          telefone.value = telefone.value + '-'; //quando o campo já tiver 8 caracteres, o script irá inserir um tracinho, para melhor visualização do telefone.

                }
                </script> 
                </section>
                <section class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" cols="30" rows="3"><?php echo $_SESSION['bio']; ?></textarea>
                    
                </section>
                <section class="mb-3">
                    <input name="update_profile_btn" id="update_profile_btn" type="submit" class="update-profile-btn" value="Atualizar">
                </section>
            </form>
            
        </section>
        
       </section>
   </section>
    <script src="../js/main.js"></script>
</body>
</html>