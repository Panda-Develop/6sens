<?php
  session_start();
  if (isset($_SESSION['id'])) {

  } else {
    header('location: connexion.php');
  }
require 'config.php';
  setlocale (LC_TIME, 'fr_FR.utf8','fra');
?>

<html>
  <head>
    <title> Blog </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./index.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style media="screen">
  .btn{
    margin-top: 5px;
    margin-left: 5px;
  }
  .card{
    padding: 0;
    margin-bottom: 4vh;
  }
}
</style>
  </head>

  <body>
    <header>
      <?php
        include("nav.php");
      ?>
    </header>

    <div style="margin-top:14vh;padding-left:4vh;" class="container">
      <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>

<div class="row">
    <?php

    include ("config.php");

    $request3 = "Select * from user";

    $Resultat3 = mysqli_query ( $database, $request3 ) or die(mysql_error() ) ;

      while (  $ligne = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)  ) {
      if ($ligne["id_group"] == "1") {
      echo "<div class='dropdown'>";
      echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
      echo "Article";
      echo "</button>";
      echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
      echo "<a class='dropdown-item' href='./add_article.php'>Ajouter un article</a>";
      echo "  <a class='dropdown-item' href='./remove_article.php'>Supprimer un article</a>";
      echo "  </div>";
      echo "  </div>";
}else {
  echo "<a class='btn btn-primary' href='./add_article.php'>Ajouter un article</a>";
}
      if ($ligne["id_group"] == "2" || $ligne["id_group"] == "1") {
        echo "<div class='dropdown'>";
        echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
        echo "Catégories";
        echo "</button>";
        echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
        echo "<a class='dropdown-item'  href='./add_categorie.php'>Ajouter une catégorie</a>";
        echo "  <a class='dropdown-item' href='./remove_categorie.php'>Supprimer une categorie</a>";
        echo "  </div>";
        echo "  </div>";
    }else {

    }
    if ($ligne["id_group"] == "1") {
    echo "<div class='dropdown'>";
    echo "<button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
    echo "Utilisateurs";
    echo "</button>";
    echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
    echo "<a class='dropdown-item' href='./add_user.php'>Ajouter un utilisateur</a>";
    echo "  <a class='dropdown-item' href='./remove_user.php'>Supprimer un utilisateur</a>";
    echo "  </div>";
    echo "  </div>";
}else {

    }
}

     ?>
</div>
    </div>

    <section class="content-section container">

      <h3 style="font-weight:bold; margin-bottom:4vh;">Les articles déjà publiés :</h3>


<div class="row">



          <?php

            include ("config.php");

            $request = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user order by id_article desc";

            $Resultat = mysqli_query ( $database, $request ) or die(mysql_error() ) ;

            while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) {

                if ($ligne["image_link"] == "") {

                  echo "<div class='card col-lg-4 col-md-6 col-sm-12'>";
                  echo "<div class='card-body'>";
                  echo "<h5 class='card-title'>";
                  echo $ligne["title"];
                  echo "</h5>";
                  echo "<p class='card-text'>";
                  $text = strip_tags($ligne["text"]);
                  if (strlen($text) > 50 ) {
                      echo (substr($text, 0, 100) . "...") ;
                  }
                  else {
                    echo $text;
                  }
                  echo "</p>";
                  echo "</div>";
                  echo "<div class='card-footer'>";
                  echo '<a href="article.php?id='.$ligne["id_article"].'"> Lire la suite ... </a>';
                  echo "<br>";
                  echo "<small class='text-muted'>";
                  echo $ligne['date'];
                  echo "</small>";
                  echo "</div>";
                  echo "</div>";




                }

                else {



                  echo "<div class='card col-lg-4 col-md-6 col-sm-12'>";
                  echo "<img class='card-img-top' src=".$ligne["image_link"]." alt='Card image cap'>";
                  echo "<div class='card-body'>";
                  echo "<h5 class='card-title'>";
                  echo $ligne["title"];
                  echo "</h5>";
                  echo "<p class='card-text'>";
                  $text = strip_tags($ligne["text"]);
                  if (strlen($text) > 50 ) {
                      echo (substr($text, 0, 10) . "...") ;
                  }
                  else {
                    echo $text;
                  }
                  echo "</p>";
                  echo "</div>";
                  echo "<div class='card-footer'>";
                  echo '<a href="article.php?id='.$ligne["id_article"].'"> Lire la suite ... </a>';
                  echo "<br>";
                  echo "<small class='text-muted'>";
                  echo $ligne['date'];
                  echo "</small>";
                  echo "</div>";
                  echo "</div>";




                }
              }

          ?>

</div>
    </section>
    <?php include './footer.php'; ?>

  </body>
</html>
