<?php
session_start();
include './cockpit/config.php';
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>6ème Sens By Trill$hit | Lifestyle</title>
    <link rel="icon" type="image/png" href="./assets/img/logo.png" />

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
      <div class="container">
        <h3 class="section-title">Nous contacter :</h3>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-3">
                <div class="alert alert-success" role="alert">
  Votre message à été transmis à notre équipe, Merci !
</div>
                  <form id="contact-form" class="form" action="./valid_email.php" method="POST" role="form">
                      <div class="form-group">
                          <label class="form-label" for="name">Votre nom</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Votre nom" tabindex="1" required>
                      </div>
                      <div class="form-group">
                          <label class="form-label" for="email">Votre email</label>
                          <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" tabindex="2" required>
                      </div>
                      <div class="form-group">
                          <label class="form-label" for="subject">Sujet</label>
                          <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" tabindex="3">
                      </div>
                      <div class="form-group">
                          <label class="form-label" for="message">Message</label>
                          <textarea rows="5" cols="50" name="message" class="form-control" id="message" placeholder="Message..." tabindex="4" required></textarea>
                      </div>
                      <div class="text-center">
                          <button type="submit" class="btn btn-start-order">Envoyer</button>
                      </div>
                  </form>
              </div>
        </div>
        </form>
      </div>
    </section>


<section style="margin-top:6vh;">

  <?php include './assets/elements/footer.html'; ?>
</section>
  </body>
</html>
