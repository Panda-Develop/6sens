<nav>
    <li> <a href="index.php"> <i class="fa fa-home"> </i>  Accueil  </a> </li>
    <li> <a href="add_article.php"> <i class="fa fa-home"> </i>  Article  </a> </li>
    <li> <a href="user_perm.php?id=1"> <i class="fa fa-home"> </i>  Perm User </a> </li>
    <li> <a href="group_perm.php?id=1"> <i class="fa fa-home"> </i>  Perm Group  </a> </li>
    <?php
        if (isset($_SESSION["id"])) {
            echo '<li> <a href="deconnexion.php"> <i class="fa fa-home"> </i>  Deconnexion  </a> </li>';
        }
        else {
            echo '<li> <a href="connexion.php"> <i class="fa fa-home"> </i>  Connexion  </a> </li>';
        }
    ?>

</nav> 
