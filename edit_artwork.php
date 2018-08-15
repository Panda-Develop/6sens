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
    <title>Editer un Artwork</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="./summernote-bs4.js"></script>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./perm.css">
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
    <?php
            if (isset($_GET["id"])) {
              include ("config.php");
              $Requete4 = "SELECT * FROM `artwork` where id_artwork = ".$_GET["id"]." ";
              $Resultat4 = mysqli_query( $database, $Requete4 ) ;
              $ligne4 = mysqli_fetch_array($Resultat4,MYSQLI_ASSOC);
              echo '<li class="breadcrumb-item"><a href="./edit_article.php">Editer un artwork</a></li>';
              echo '<li class="breadcrumb-item active" aria-current="page"> '.$ligne4["title"].' </li>';
            }
            else {
              echo '<li class="breadcrumb-item active" aria-current="page"> Editer un artwork </li>';
            }
          ?>

        </ol>
      </nav>


  <h3 style="font-weight:bold; margin-bottom:4vh;">Editer un artwork :</h3>

    <form onsubmit="postForm()" action="valid_edit_artwork.php" method="POST" >
      <div class="form-group">

      <?php
        if (isset($_GET["id"])) {
        }
        else {
      ?>
      
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Nom</th>
          </tr>
        </thead>
        <tbody>

          <?php
            include ("config.php");
            $Requete3 = "SELECT * FROM artwork where 1";
            $Resultat3 = mysqli_query( $database, $Requete3 ) ;
            while ($ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)){
              echo "<tr>";
              echo "<td> <a href='edit_artwork.php?id=".$ligne3["id_artwork"]."'>" .$ligne3["title"]." </a> </td>";
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
          $Requete2 = "SELECT a.* from `artwork` a  where a.id_artwork = ".$_GET["id"]." ";
          $Resultat2 = mysqli_query( $database, $Requete2 ) ;
          $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC) ;

          echo '<input name="id" type="hidden" value="'.$_GET["id"].'" >';

          echo '<input name="title" type="text" placeholder="Titre" value="'.$ligne2["title"].'" class="form-control">';
          echo "<br>";

          include ("config.php");

          echo "<div class='row'>";
          echo "<div class='col'>";
          echo '<input type="text" placeholder="Lien de l\'image principale" name="image" value="'.$ligne2["image_link"].'" class="form-control">';
          echo "</div>";

          echo "<br>";

          echo '<div class="row">';
            echo '<div class="col">';
                echo '<input type="text" placeholder="Facebook" name="facebook" value="'.$ligne2["facebook"].'" class="form-control">';
                echo "</div>";
            echo '<div class="col">';
                echo '<input type="text" placeholder="Twitter" name="twitter" value="'.$ligne2["twitter"].'" class="form-control">';
            echo "</div>";
          echo "</div>";

          echo "<br>";

          echo '<div class="row">';
            echo '<div class="col">';
                echo '<input type="text" placeholder="Instagram" name="instagram" value="'.$ligne2["instagram"].'" class="form-control">';
                echo "</div>";
            echo '<div class="col">';
                echo '<input type="text" placeholder="Site web" name="site" value="'.$ligne2["web_site"].'" class="form-control">';
            echo "</div>";
        echo "</div>";
        echo "</div>";

        ?>

      <br>

        <div id="summernote" style="margin-top:4vh;"></div>
        <script type="text/javascript">

        var markupStr = '<?php echo $ligne2["text"] ?>';

          $(document).ready(function() {
            $('#summernote').summernote('code', markupStr)({
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
          <input type="submit" value="Enregister les modifications" class="btn btn-primary" style="margin-top:4vh;">
          <br>
          <input type="submit" name="delete" value="Supprimer l'article" class="btn btn-danger" style="margin-top:2vh;">       
        </center>

        
        
                      </div>
            </form>
        </div>
        <?php
          }
        ?>
      </div>
      </div>
<?php include './footer.php'; ?>


  </body>
</html>
