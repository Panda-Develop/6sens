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
    <title>bootstrap4</title>
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
    
    <form action="" method="GET">
      <center>
              
        <input name="title" type="text" placeholder="Titre">
        <br>
        <?php

          $date = date("Y/m/d");

          echo "<input type='hidden' name='date' value='$date'>"; 

          

          $database = mysqli_connect("localhost", "root", "", "6sens");

          $Requete = "SELECT u.id_user,CONCAT(u.firstname ,' ', u.lastname) as name ,u.permission as uperm,g.permission as gperm from user u join `group` g on u.id_group = g.id_group order by u.lastname ASC";

          $Resultat = mysqli_query( $database, $Requete ) ;

          echo "<select name='author'>";
          while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) { 
              echo "<option value=".$ligne["id_user"].">".$ligne["name"]." </option>";
          }
          echo "</select>";

          echo "</br>";
          
          

          $Requete2 = "SELECT u.id_user, g.permission as gperm, u.permission as uperm, c.* from `group` g join user u on g.id_group = u.id_group join article a on a.id_user = u.id_user join category c on c.id_category = a.id_category where u.id_user = ".$_SESSION["id"]." group by c.id_category";

          $Resultat2 = mysqli_query( $database, $Requete2 ) ;

          while (  $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  ) { 

            $uperm = str_split($ligne2["uperm"]);
            $nbruperm = count($uperm);  
            $gperm = str_split($ligne2["uperm"]);
            $nbrgperm = count($uperm) ;              
            
            echo "<select name='category'>";
              if ($ligne2["uperm"] == $ligne2["permission"] or $ligne2["gperm"] == $ligne2["permission"] ) {
                echo "<option value=".$ligne2["permission"].">".$ligne2["name"]."</option>   ";
              }
              else {
              }
          }

          echo "</select>";          

          
        ?>


        <div id="summernote"></div>
        <script>
          $('#summernote').summernote({
            placeholder: 'Hello bootstrap 4',
            tabsize: 2,
            height: 100
          });
        </script>

        <input type="submit" value="Envoyer">   

      </center>
    </form>

  </body>
</html>
