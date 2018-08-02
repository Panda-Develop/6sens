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
    <meta charset="UTF-8">
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