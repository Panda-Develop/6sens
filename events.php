<?php
session_start();
include './cockpit/config.php';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>6ème Sens By Trill$hit | Events</title>
    <link rel="icon" type="image/png" href="./assets/style/img/logo.png" />

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
    body{
background-image: linear-gradient(to right,#674172,#F03434, #89C4F4 ,#F03434, #674172);
    }
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
      <div class="container" style="background-color:rgba(0,0,0,0.5);color:#ffffff;padding-top:4vh;padding-bottom:4vh;">
        <center>
          <h1 style="font-family:'Bangers'">HYPETALK</h1>
          <hr class="hr-flashs" style="background-color:#ffffff;">
          <h4 style="font-family:'Bangers'">Tattoo, Food, Clothing, Music</h4>
          <br>
          </center>
          <h5>HYPETALK est l’événement des amoureux de street culture, des marques nées d’INSTAGRAM, des dernières tendances rap actuelles et de tous les curieux intéressés par cet univers.
<br><br>
Nous serons aux commandes toute la journée pour vous proposer diverses animations de 10h à 18h30.
<br><br>
ARTISTES, MARQUES, RAP ... Le tout additionné à un lieu d’envergure : le Rough Club Riders LE SKATEPARK indoor de Valence, venez donc profiter de cette journée pour découvrir de nouveaux talents, cop les plus belles pièces de nos exposants pour élargir votre garde-robe ou vous promener au rythme du va et vient des riders.
<br><br>
En point d’orgue de ce jour sacré vous aurez le droit à un show de 4 artistes qui seront succédés par des Dj’s jusqu’à 3h du matin.
<br><br>
BEAUCOUP DE SURPRISES SONT À VENIR POUR CETTE JOURNÉE !
<br><br>
RESTEZ VIFS NOUS ANNONCERONS LES ARTISTES LES UNS APRÈS LES AUTRES 👀
<br><br>
Des informations clés vous seront communiquées au fur et à mesure jusqu’au 15 Septembre
<br><br>
Tarif journée : participation libre
<br><br>
Tarif concert : (Billetterie bientôt en ligne)
<br><br>
Suivez l’œil partout pour des news en direct ⬇️
<br><br>
Twitter : @6emesensbyTS
<br><br>
Instagram : 6emesensbytrillshit</h5>
<br>
<center>
  <hr class="hr-flashs" style="background-color:#ffffff;">
  <br>
  <img class="img-fluid" src="./assets/style/img/hypetalk.jpg_large" alt="">
</center>
      </div>
    </section>


<section style="margin-top:6vh;">

  <?php include './assets/elements/footer.html'; ?>
</section>
  </body>
</html>
