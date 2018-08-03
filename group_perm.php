<?php
  session_start();

  if (isset($_SESSION['id'])){

  }
  else {
    header('Location: connexion.php');
    exit();
  }
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/css/reset.css">
    <link rel="stylesheet" href="./style/css/navbar.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Perm</title>
  </head>
  <body>

    <header>
      <?php
      include ("nav.php");
      ?>
    </header>
    <form action="valid_group_perm.php">
    <table border=1>

    <?php

      include ("config.php");

      $Requete2 = "SELECT id_group, permission as gperm from `group` where id_group = ".$_GET["id"]." ";

      $Resultat2 = mysqli_query( $database, $Requete2 ) ;
      $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC) ;
      $gperm = str_split($ligne2["gperm"]);

      $Requete = "SELECT * from category order by id_category asc";

      $Resultat = mysqli_query( $database, $Requete ) ;
      $i = 1;

      while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) {
        echo "<tr>";
          echo "<td> ". $ligne["name"] ." </td>";
          $m = 0;
          for ($j = 0 ; $j <= count($gperm)-1 ; $j++  ) {
            if ($gperm[$j] == $i){
              echo "<td> <input type='checkbox' checked  name='perm".$i."' </td>";
              $m = 1;
            }
            else {

            }
          }
          if ($m == 0) {
            echo "<td> <input type='checkbox' name='perm".$i."' </td>";
          }

          $i++;
        echo "</tr>";
      }


      echo "<input type='hidden' value='".$_GET["id"]."' name='id'>";

    ?>
      </table>
      <input type="submit" value="Envoyer">
    </form>

    <?php

    echo "Liste des utilisateurs dans le groupe :" ;
    echo "<br>";

    $Requete3 = "SELECT * from user where id_group = ".$_GET["id"]." ";
    $Resultat3 = mysqli_query( $database, $Requete3 ) ;
    while ($ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)){
      echo $ligne3["pseudo"];
      echo "<br>";
    }

    ?>

  </body>
</html>
