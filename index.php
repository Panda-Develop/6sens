<?php 
  session_start();
  if (isset($_SESSION['id'])) {

  } else {
    header('location: connexion.php');
  }
  
  setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
?>

<html>
  <head>
    <title> Blog </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./navbar.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <body>
    <header>
      <?php
        include("nav.php");
      ?>
    </header>

    <section class="content-section">
      <?php

        include ("config.php");

        $request = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user order by date desc";

        $Resultat = mysqli_query ( $database, $request ) or die(mysql_error() ) ;

        while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) {

            if ($ligne["image_link"] == "") {
              echo "<article class='article'>";
              echo "<div class=row >";
              echo "<div class='col-ms-12 col-sm-12'>";
              echo "<h6 class='category'>";
              echo $ligne["name"];
              echo "</h6>";

              echo "<a href='article.php?id=".$ligne["id_article"]."'>";
              echo "<h2 class='title'>";
              echo $ligne["title"];
              echo "</h2>";
              echo "</a>";
              echo "<div class='text-descirption'>";

              $text = strip_tags($ligne["text"]);

              if (strlen($text) > 200 ) {
                echo (substr($text, 0, 200) . '<a href="article.php?id='.$ligne["id_article"].'"> Lire la suite ... </a>' ) ;
              }
              else {
                echo $text;
              }
              echo "</div>";

              echo "<div class='author'>";
              echo "Par ".$ligne["pseudo"]. " le ".strftime("%d %B %Y", strtotime($ligne['date']));
              echo "</div>";

              echo "</div>";
              echo "</div>";
              echo "</article>";
            }

            else {
              echo "<article class='article'>";
              echo "<div class=row >";
              echo "<div class='col-ms-5 col-sm-5'>";
              echo "<div class='card-image'>";
              echo "<a href='article.php?id=".$ligne["id_article"]."' title='".$ligne["title"]."'>";
              echo "<img width=360 height=240 src='".$ligne["image_link"]."' >";
              echo "</a>";
              echo "</div>";
              echo "</div>";
              echo "<div class='col-ms-7 col-sm-7'>";
              echo "<h6 class='category'>";
              echo $ligne["name"];
              echo "</h6>";
              echo "<a href='article.php?id=".$ligne["id_article"]."'>";
              echo "<h2 class='title'>";
              echo $ligne["title"];
              echo "</h2>";
              echo "</a>";

              echo "<div class='text-descirption'>";
              $text = strip_tags($ligne["text"]);

              if (strlen($text) > 200 ) {
                echo (substr($text, 0, 200) . '<a href="article.php?id='.$ligne["id_article"].'"> Lire la suite ... </a>' ) ;
              }
              else {
                echo $text;
              }
              echo "</div>";

              echo "<div class='author'>";

              echo "Par ".$ligne["pseudo"]. " le ".strftime("%d %B %Y", strtotime($ligne['date']));
              echo "</div>";

              echo "</div>";
              echo "</div>";
              echo "</article>";
            }
          }

      ?>
    </section>

  </body>
</html>
