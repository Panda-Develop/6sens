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
    <title>Ajouter une catégorie</title>
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
              <li class="breadcrumb-item active" aria-current="page">Ajouter une catégorie</li>
          </ol>
      </nav>


      <h3 style="font-weight:bold; margin-bottom:4vh;">Ajouter une catégorie :</h3>

      <form action="valid_add_categorie.php" method="GET">
        <div class="form-group">

          <input name="name" type="text" placeholder="Nom" class="form-control">
          <br>
          <center>
          <input type="submit" value="Ajouter la catégorie" class="btn btn-primary" style="margin-top:4vh;">

          </center>
          <br>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Catégories déjà existantes</th>
              </tr>
            </thead>
            <tbody>
          <?php
              include ("config.php");

              $Requete3 = "SELECT * from category order by id_category asc";

              $Resultat3 = mysqli_query( $database, $Requete3 ) ;
              while (  $ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)  ) {
                echo "<tr>";
                  echo "<td> ". $ligne3["name"] ." </td>";
                echo "</tr>";
              }
          ?>
        </tbody>
      </table>
        </div>

      </form>
  </div>

    <?php include './footer.php'; ?>
  </body>
</html>
