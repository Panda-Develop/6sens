<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./perm.css">

    <title>Perm</title>
  </head>
  <body>

    <header>
      <?php
      include ("nav.php");
      ?>
    </header>

    <section class="article-view container">
      <nav aria-label="breadcrumb" style="margin-top:4vh;">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./index.php">Dashboard</a></li>
          <?php
            if (isset($_GET["id"])) {
              include ("config.php");
              $Requete4 = "SELECT * FROM `group` where id_group = ".$_GET["id"]." ";
              $Resultat4 = mysqli_query( $database, $Requete4 ) ;
              $ligne4 = mysqli_fetch_array($Resultat4,MYSQLI_ASSOC);
              echo '<li class="breadcrumb-item"><a href="./group_perm.php">Editer un groupe</a></li>';
              echo '<li class="breadcrumb-item active" aria-current="page"> '.$ligne4["name"].' </li>';
            }
            else {
              echo '<li class="breadcrumb-item active" aria-current="page"> Editer un groupe </li>';
            }
          ?>

        </ol>
      </nav>

      <?php
        if (isset($_GET["id"])) {
        }
        else {
      ?>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>Groupe</th>
          </tr>
        </thead>
        <tbody>

          <?php
            include ("config.php");
            $Requete = "SELECT * FROM `group` where 1";
            $Resultat = mysqli_query( $database, $Requete ) ;
            while ($ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)){
              echo "<tr>";
              echo "<td> <a href='group_perm.php?id=".$ligne["id_group"]."'>" .$ligne["name"]." </a> </td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>

      <?php
        }
      ?>

      <?php
        if (isset($_GET["id"])) {
          $Requete2 = "SELECT * from `group` where id_group = ".$_GET["id"]." ";
          $Resultat2 = mysqli_query( $database, $Requete2 ) ;
          $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC) ;
          $uperm = str_split($ligne2["permission"]);

          echo "<form action='valid_group_perm.php'>";

          echo '<input name="id" type="hidden" value="'.$ligne2["id_group"].'" class="form-control">';

          echo '<div class="form-group">';

          echo '<input name="name" type="text" placeholder="Nom" value="'.$ligne2["name"].'" class="form-control">';

          $Requete3 = "SELECT * from category order by id_category asc";

          $Resultat3 = mysqli_query( $database, $Requete3 ) ;
          $i = 1;
          echo "<table>";
          while (  $ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)  ) {
            echo "<tr>";
              echo "<td> ". $ligne3["name"] ." </td>";
              $m = 0;
              for ($j = 0 ; $j <= count($uperm)-1 ; $j++  ) {
                if ($uperm[$j] == $i){
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

          echo "</table>";

          echo "<br>";

          echo "<center>";
          echo '<input type="submit" value="Enregister les informations" class="btn btn-primary" style="margin-top:4vh;">';
          echo "<br>";
          echo '<input type="submit" name="delete" value="Supprimer le groupe" class="btn btn-danger" style="margin-top:2vh;">';
          echo "</center>";

          echo "</form>";

        }
        else {
        }
      ?>
  </section>
<footer>
<?php include './footer.php'; ?>
</footer>

  </body>
</html>
