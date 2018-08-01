<nav>
    <li> <a href="index.php"> <i class="fa fa-home"> </i>  Accueil  </a> </li>

    <?php
        if (isset($_SESSION["id"])) {
            echo '<li> <a href="deconnexion.php"> <i class="fa fa-home"> </i>  Deconnexion  </a> </li>';
        }
        else {
            echo '<li> <a href="connexion.php"> <i class="fa fa-home"> </i>  Connexion  </a> </li>';
        }
    ?>

</nav> 
