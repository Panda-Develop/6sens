<?php
session_start();
include './cockpit/config.php';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>6ème Sens By Trill$hit | Accueil</title>
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
    a{
      color: #000000;
    }
    a:hover{
      color: #000000;
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

    <section style="background-color:#000000;" >
      <video  src="./assets/style/video/logo.mp4" autoplay poster="./assets/style/img/logo.png" style="width:100%; height:400px;">

      </video>
    </section>

    <section class="main-content">

      <section>

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
    include ("./cockpit/config.php");
    $request6 = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user order by id_article desc limit 3";
    $Resultat6 = mysqli_query ( $database, $request6 ) or die(mysql_error() ) ;
    while (  $ligne6 = mysqli_fetch_array($Resultat6,MYSQLI_ASSOC)  ) {
      echo "<div class='carousel-item'>";
        echo "<img class='d-block w-100' src=".$ligne6["image_link"]." alt='First slide'>";
      echo "</div>";
      }
  ?>
</div>
</div>
</div>
      </section>

      <section class="flashs">
        <div class="container">
          <h3 class="section-title">Flashs :</h3>
          <div class="row">
            <?php
            include ("./cockpit/config.php");
            $request = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user where c.name = 'flashs' order by id_article desc limit 3";
            $Resultat = mysqli_query ( $database, $request ) or die(mysql_error() ) ;
            while (  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC)  ) {
              echo "<div class='flashs-card col-lg-4 col-md-6 col-sm-12'>";
			  echo '<a href="view_article.php?id='.$ligne["id_article"].'">';
              echo "<img src=".$ligne["image_link"].">";
              echo "<br>";
              echo "<hr class='hr-flashs'>";
              echo "<h6 class='flashs-date'>".strftime("%d %B %Y", strtotime($ligne['date']))."</h6>";
              echo "<h4 class='flashs-title'>".$ligne["title"]."</h4>";
			  echo "<p class='flashs-text'>";
			  $text = strip_tags($ligne["text"]);
			  if (strlen($text) > 150 ) {

				  echo (substr($text, 0, 150). "...") ;
			  }
			  else {
				echo $text;
			  }
			  echo "</p>";
			  echo "</a>";
			  echo "<center>";
			  echo '<a class="see-all" href="view_article.php?id='.$ligne["id_article"].'">';
			  echo "Lire le flashs";
			  echo "</a>";
			  echo "</center>";
              echo "</div>";
              }
          ?>
          </div>
          <center style="margin-top:6vh;">
            <a href="./flashs.php" class="see-all">Voir tous les flashs</a>
          </center>
        </div>
      </section>

      <section class="last-youtube-video">
          <h3 class="section-title" style="margin-left:4vh;">Notre dernière interview :</h3>
        <div class="embed-responsive embed-responsive-16by9" style="height:70vh;">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/O5MRlwh1DHg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
        <script src="https://apis.google.com/js/platform.js"></script>
        <div class="container">
          <br>
          <div class="g-ytsubscribe" data-channelid="UCH4VjqAwZ8qNa5tXmKGnG8w" data-layout="full" data-count="default"></div>
        </div>
      </section>

      <section class="musique-article-section">
          <div class="container">
            <h3 class="section-title">Nouveautés musicales :</h3>
        <div class="row">
          <?php
          include ("./cockpit/config.php");
          $request2 = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user where c.name = 'musique' order by id_article desc limit 6";
          $Resultat2 = mysqli_query ( $database, $request2 ) or die(mysql_error() ) ;
          while (  $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  ) {

            echo "<div class='flashs-card col-lg-4 col-md-6 col-sm-12' style='margin-top:4vh;'>";
            echo '<a href="view_article.php?id='.$ligne2["id_article"].'">';
            echo "<img src=".$ligne2["image_link"].">";
            echo "<br>";
            echo "<p class='see-all-active'>".$ligne2["title"]."</p>";
            echo "<h6 class='flashs-date'>".strftime("%d %B %Y", strtotime($ligne2['date']))." par ".$ligne2["pseudo"]."</h6>";
            echo "<hr class='hr-flashs'>";
            echo "<p class='flashs-text'>";
            $text = strip_tags($ligne2["text"]);
            if (strlen($text) > 150 ) {

                echo (substr($text, 0, 150). "...") ;
            }
            else {
              echo $text;
            }
            echo "</p>";
            echo "</a>";
            echo "<center>";
            echo '<a class="see-all" href="view_article.php?id='.$ligne2["id_article"].'">';
            echo "Lire la suite";
            echo "</a>";
            echo "</center>";
            echo "</div>";
            }
        ?>

        </div>
          <center style="margin-top:6vh;">
              <a href="./musique.php" class="see-all">Voir toutes les actus musicales</a>
          </center>
          </div>
      </section>

      <section class="lifestyle-section">
        <div class="container">
          <h3 class="section-title">Nouveautés Lifestyle :</h3>
      <div class="row">
        <?php
        include ("./cockpit/config.php");
        $request2 = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user where c.name = 'lifestyle' order by id_article desc limit 6";
        $Resultat2 = mysqli_query ( $database, $request2 ) or die(mysql_error() ) ;
        while (  $ligne2 = mysqli_fetch_array($Resultat2,MYSQLI_ASSOC)  ) {

          echo "<div class='flashs-card col-lg-4 col-md-6 col-sm-12' style='margin-top:4vh;'>";
          echo '<a href="view_article.php?id='.$ligne2["id_article"].'">';
          echo "<img src=".$ligne2["image_link"].">";
          echo "<br>";
          echo "<p class='see-all-active'>".$ligne2["title"]."</p>";
          echo "<h6 class='flashs-date'>".strftime("%d %B %Y", strtotime($ligne2['date']))." par ".$ligne2["pseudo"]."</h6>";
          echo "<hr class='hr-flashs'>";
          echo "<p class='flashs-text'>";
          $text = strip_tags($ligne2["text"]);
          if (strlen($text) > 150 ) {

              echo (substr($text, 0, 150). "...") ;
          }
          else {
            echo $text;
          }
          echo "</p>";
          echo "</a>";
          echo "<center>";
          echo '<a class="see-all" href="view_article.php?id='.$ligne2["id_article"].'">';
          echo "Lire la suite";
          echo "</a>";
          echo "</center>";
          echo "</div>";
          }
      ?>
      </div>
      <center style="margin-top:6vh;">
          <a href="./lifestyle.php" class="see-all">Voir toutes les actus lifestyle</a>
      </center>
        </div>
      </section>

    </section>


<section style="margin-top:6vh;">

  <?php include './assets/elements/footer.html'; ?>
</section>
  </body>
</html>
