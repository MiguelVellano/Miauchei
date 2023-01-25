<section class="profile-card">
                <section class="profile-pic">
                    <img src="<?php echo "assets/imgs/". $_SESSION['image']; ?>"/>
                </section>
                <section>
                    <p class="username"><?php echo $_SESSION['username']; ?></p>
                    <p class="sub-text"><?php echo substr($_SESSION['bio'],0,15); ?></p>
                </section>

                <form method="GET" action="logout.php">
                  <button class="logout-btn" >logout</button>
                </form>
               
</section>
