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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="./summernote-bs4.js"></script>
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
    <li class="breadcrumb-item active" aria-current="page">Add Artwork</li>
  </ol>
</nav>


  <h3 style="font-weight:bold; margin-bottom:4vh;">Publier un nouvel artwork :</h3>

    <form onsubmit="postForm()" action="valid_add_artwork.php" method="POST" >
      <div class="form-group">

        <input name="title" type="text" placeholder="Titre" class="form-control">
        <br>
        <?php

          $date = date("Y-m-d H-i-s");

          echo "<input type='hidden' name='date' value='$date'>";



          include ("config.php");

          $Requete = "SELECT u.id_user ,u.permission as uperm from user u join `group` g on u.id_group = g.id_group where u.id_user = ".$_SESSION["id"]." order by u.lastname ASC";

          $Resultat = mysqli_query( $database, $Requete ) ;

          while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) {
              echo "<input type='hidden' value=".$ligne["id_user"]." name='author'>";
          }
          
          echo '<input type="text" placeholder="Lien de l\'image principale" name="image" class="form-control">';
          
          echo "<br>";

          echo '<div class="row">';
            echo '<div class="col">';
                echo '<input type="text" placeholder="Facebook" name="facebook" class="form-control">';
                echo "</div>";
            echo '<div class="col">';
                echo '<input type="text" placeholder="Twitter" name="twitter" class="form-control">';
            echo "</div>";
          echo "</div>";

          echo "<br>";

          echo '<div class="row">';
            echo '<div class="col">';
                echo '<input type="text" placeholder="Instagram" name="instagram" class="form-control">';
                echo "</div>";
            echo '<div class="col">';
                echo '<input type="text" placeholder="Site web" name="site" class="form-control">';
            echo "</div>";
        echo "</div>";
        echo "</div>";
        ?>

<br>

        <div id="summernote" style="margin-top:4vh;"></div>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#summernote').summernote({
              height: "500px"
            });
          });

        function postForm () {
          var content = $('textarea[name="text"]').html($('#summernote').summernote('code'));
        }
        </script>

        	<textarea name="text" style="display:none;" >
					</textarea>


<center>
  <input type="submit" value="Publier l'article" class="btn btn-primary" style="margin-top:4vh;">

</center>
      </div>
    </form>
</div>

<?php include './footer.php'; ?>
  </body>
</html>
