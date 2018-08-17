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
    <link rel="stylesheet" href="./index.css">
    <title>Add Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  </head>
  <body>

    <header>
      <?php
      include ("nav.php");
      ?>
    </header>

    <div class="container" style="margin-top:14vh;">

      <nav aria-label="breadcrumb" style="margin-top:4vh;">
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./index.php">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ajouter un utilisateur</li>
          </ol>
      </nav>


      <h3 style="font-weight:bold; margin-bottom:4vh;">Ajouter un nouvel utilisateur :</h3>

      <form action="valid_add_user.php" method="GET">
        <div class="form-group">

          <input name="nom" type="text" placeholder="Nom" class="form-control">

          <br>

          <input name="prenom" type="text" placeholder="Prénom" class="form-control">

          <br>

          <input name="pseudo" type="text" placeholder="Pseudo"  class="form-control">

          <br>

          <div class="row">
            <div class="col-sm-6"> <input name="password" type="password" placeholder="Mot de passe"  class="form-control"> </div>
            <div class="col-sm-6"> <input name="repassword" type="password" placeholder="Vérification de mot de passe"  class="form-control"> </div>
          </div>

          <br>

          <input name="email" type="email" placeholder="Email" class="form-control">

          <br>

          <?php
              include ("config.php");

              $Requete3 = "SELECT * from category order by id_category asc";

              $Resultat3 = mysqli_query( $database, $Requete3 ) ;
              echo "<table>";
              while (  $ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)  ) {
                echo "<tr>";
                  echo "<td> ". $ligne3["name"] ." </td>";
                  echo "<td> <input type='checkbox' name='perm".$ligne3['permission']."' </td>";
                echo "</tr>";
              }
              echo "</table>";

              echo "<br>";

              echo "<select name='group' class='form-control'>" ;

              $Requete4 = "SELECT g.* from `group` g";
              $Resultat4 = mysqli_query( $database, $Requete4 ) ;

              while (  $ligne4 = mysqli_fetch_array($Resultat4,MYSQLI_ASSOC)  ) {
                 echo "<option value='".$ligne4['id_group']."'> ".$ligne4['name']." </option>";
              }

              echo "</select>";
          ?>



          <center>
          <input type="submit" value="Ajouter l'utilisateur" class="btn btn-primary" style="margin-top:4vh;">

          </center>
        </div>

      </form>
  </div>

    <?php include './footer.php'; ?>
  </body>
</html>
