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
          <li class="breadcrumb-item active" aria-current="page"> Editer un utilisateur </li>
        </ol>
      </nav>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>Pseudo</th>
          </tr>
        </thead>
        <tbody>

          <?php
            include ("config.php");
            $Requete = "SELECT * FROM user where 1";
            $Resultat = mysqli_query( $database, $Requete ) ;
            while ($ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)){
              echo "<tr>";
              echo "<td> <a href='user_perm.php?id=".$ligne["id_user"]."'>" .$ligne["pseudo"]." </a> </td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      <table>

      <?php
        if (isset($_GET["id"])) {
          $Requete2 = "SELECT * from user where id_user = ".$_GET["id"]." ";
          $Resultat2 = mysqli_query( $database, $Requete2 ) ;
          $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC) ;
          $uperm = str_split($ligne2["permission"]);

          echo "<form action='valid_user_perm.php'>";

          echo '<div class="form-group">';

          echo '<input name="id" type="hidden" value="'.$ligne2["id_user"].'" class="form-control">';

          echo '<input name="nom" type="text" placeholder="Nom" value="'.$ligne2["lastname"].'" class="form-control">';

          echo "<br>";

          echo '<input name="prenom" type="text" placeholder="Prénom" value="'.$ligne2["firstname"].'" class="form-control">';

          echo "<br>";

          echo '<input name="pseudo" type="text" placeholder="Pseudo" value="'.$ligne2["pseudo"].'" class="form-control">';

          echo "<br>";

          echo '<input name="email" type="text" placeholder="Email" value="'.$ligne2["email"].'" class="form-control">';

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

          echo "<select class='form-control'>" ;

          $Requete4 = "SELECT g.* , (SELECT id_group from user where id_user = 1) as userg from `group` g";

          $Resultat4 = mysqli_query( $database, $Requete4 ) ;

          while (  $ligne4 = mysqli_fetch_array($Resultat4,MYSQLI_ASSOC)  ) {

            if ($ligne4["id_group"] == $ligne4["userg"]) {

             echo "<option name='usergroup' value='".$ligne4['name']."' selected> ".$ligne4['name']." </option>";
            }
            else {

              echo "<option name='usergroup' value='".$ligne4['name']."'> ".$ligne4['name']." </option>";
            }
          }

          echo "</select>";

          echo "<center>";
          echo '<input type="submit" value="Enregister les informations" class="btn btn-primary" style="margin-top:4vh;">';
          echo "</center>";

          echo "</form>";
        }
        else {
        }
      ?>
</section>
<?php include './footer.php'; ?>

  </body>
</html>
