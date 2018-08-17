<?php
session_start();
include './cockpit/config.php';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
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
<section class="head-about" style=" margin-top: 0;width: 100%;
  height: 80vh;
  background-image: url('./assets/style/img/bg.jpg')">

</section>

<section>
  <div class="container" style="font-family: 'Comfortaa';">
    <h2 class="about-title">A propos de nous :</h2>
    <hr class="hr-flashs" style="text-align:left;">
    <p>Nous sommes deux amis passionnés de street culture depuis notre plus jeune âge. De vrais diggers toujours à l’affût des dernières sorties (artistes, morceaux, albums…), nous avons décidé de créer notre propre structure afin de poursuivre notre reve, et faire découvrir à un maximum de personnes l'univers rap et urbain, qui est aussi le nôtre.</p>
    <br>
    <h3 class="about-title">Le concept en bref :</h3>
    <hr class="hr-flashs" style="text-align:left;">
    <p>6ème sens by Trill$hit est avant tout une plateforme où tous les passionnés de rap et street culture pourront se retrouver. Notre but est de mettre en lumière des artistes de la scène internationale actuelle. Nous proposons du contenu exclusif tels que des interviews, des news, des clips , des artworks et d’autres projets...
6ème sens by Trill$hit est un nouveau média centré sur la street culture d’aujourd'hui. Le contenu du site sera toujours varié, le but étant de vous faire découvrir un maximum de projets artistiques différents.
Nous voulons donner de l’exposition aux rappeurs, beatmakers, artistes en qui nous voyons du talent, peu importe le style, en privilégiant toujours les artistes les moins connus.
</p>
<hr class="hr-flashs" style="text-align:left;">
<p>Nous tenons à remercier <a href="https://www.panda-develop.fr" target="_blank">Panda-Develop</a> sans qui ce projet n'aurait jamais vu le jour.</p>
  </div>
</section>
<section style="margin-top:6vh;">

  <?php include './assets/elements/footer.html'; ?>
</section>
  </body>
</html>
