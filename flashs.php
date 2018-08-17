<?php
session_start();
include './cockpit/config.php';

 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>6ème Sens By Trill$hit | Flashs</title>

    <link rel="icon" type="image/png" href="./assets/style/img/logo.png" />
    <meta name="keywords" content="6ème sens, Trill$hit, musique, rap, rap us, rap fr, artistes, jeunes artistes, 6eme sens, sixième sens">
		<meta name="author" content="Trill$hit">
		<meta name="Description" content="Découvre les dernières news, interviews, articles et clips sur la street-culture et l'univers rap.">
		<meta name="copyright" content="© 6ème Sens" />

    <!-- Customs StyleSheets -->

    <link rel="stylesheet" href="./assets/style/css/reset.css">
    <link rel="stylesheet" href="./assets/style/css/nav.css">
    <link rel="stylesheet" href="./assets/style/css/style.css">
    <link rel="stylesheet" href="./assets/style/css/fonts.css">

    <!-- Frameworks -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/style/frameworks/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/style/frameworks/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/style/frameworks/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



    <style media="screen">
    a:hover{
      text-decoration: none;
    }
    .flashs-card img{
      width: 100%;
      height: 225px;
      transition: .3s;
    }
    .flashs-card img:hover{
      opacity: .5;
      transition: .5s;
    }
    footer a{
      color: #ffffff;
      text-decoration: none;
    }

    </style>
  </head>
  <body>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v3.1&appId=905142046205270&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <header>
      <?php include './assets/elements/nav.html'; ?>
    </header>

    <section class="main-content" style="margin-top:20vh;">

      <section class="musique-article-section">
          <div class="container">
            <h3 class="section-title">Les derniers flashs :</h3>
        <div class="row">
          <?php
          include ("./cockpit/config.php");
          $request2 = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user where c.name = 'flashs' order by id_article desc";
          $Resultat2 = mysqli_query ( $database, $request2 ) or die(mysql_error() ) ;
          while (  $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  ) {
            echo "<div class='flashs-card col-lg-4 col-md-6 col-sm-12'>";
            echo "<img src=".$ligne2["image_link"].">";
            echo "<br>";
            echo "<hr class='hr-flashs'>";
            echo "<h6 class='flashs-date'>".strftime("%d %B %Y", strtotime($ligne2['date']))."</h6>";
            echo "<h4 class='flashs-title'>".$ligne2["title"]."</h4>";
            echo "<p>".$ligne2["text"]."</p>";
            echo "</div>";
            }
        ?>

        </div>
          </div>
      </section>

    </section>


<section style="margin-top:6vh;">

  <?php include './assets/elements/footer.html'; ?>
</section>
  </body>
</html>
