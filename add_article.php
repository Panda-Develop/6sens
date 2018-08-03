<?php
  session_start();
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Add Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="summernote-bs4.js"></script>
  </head>
  <body>

    <header>
      <?php
      include ("nav.php");
      ?>
    </header>
    
    <form action="valid_add_article.php" method="GET">
      <center>

        <input name="title" type="text" placeholder="Titre">
        <br>
        <?php

          $date = date("Y/m/d");

          echo "<input type='hidden' name='date' value='$date'>";



          include ("config.php");

          $Requete = "SELECT u.id_user,CONCAT(u.firstname ,' ', u.lastname) as name ,u.permission as uperm,g.permission as gperm from user u join `group` g on u.id_group = g.id_group where u.id_user = ".$_SESSION["id"]." order by u.lastname ASC";

          $Resultat = mysqli_query( $database, $Requete ) ;

          while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) { 
              echo "<input type='hidden' value=".$ligne["id_user"]." name='author'>";
          }

          echo "<input type='text' placeholder='Link image' name='image'>";
          
          $Requete2 = "SELECT u.id_user, g.permission as gperm, u.permission as uperm from `group` g join user u on g.id_group = u.id_group where u.id_user = ".$_SESSION["id"]."";

          $Resultat2 = mysqli_query( $database, $Requete2 ) ;

          $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC) ;
          $uperm = str_split($ligne2["uperm"]);
          $gperm = str_split($ligne2["gperm"]);

          $perm_array = array_unique(array_merge($uperm,$gperm));

          $Requete3 = "SELECT * FROM category order by id_category asc";

          $Resultat3 = mysqli_query( $database, $Requete3 ) ;

          echo "<select name='category'>";
          $i = 0;
          while ( $ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC) ) {
            for ($i = 0 ; $i <= count($perm_array)-1 ; $i++  ) {
              if ($perm_array[$i] == $ligne3["permission"]) {
                echo "<option value=".$ligne3["permission"]."> ".$ligne3["name"]."  </option>";
              }
              else {

              }
            }
          }

          echo "</select>";
        ?>


        <div id="summernote"></div>
        <script>
          $('#summernote').summernote({
            tabsize: 2,
            height: 100,
          });
        </script>

        <input type="submit" value="Envoyer">

      </center>
    </form>

  </body>
</html>
