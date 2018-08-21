<?php
include './cockpit/config.php';
  $id = $_GET["id"];
  $request = "Select a.*, u.pseudo from article a join user u on a.id_user = u.id_user where a.id_article = $id";
  $Resultat = mysqli_query ( $database, $request ) or die(mysql_error() ) ;
  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC);
?>


<html>
  <head>
    <title><?php echo $ligne["title"]; ?></title>
    <link rel="icon" type="image/png" href="./assets/style/img/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Customs StyleSheets -->

    <link rel="stylesheet" href="./assets/style/css/reset.css">
    <link rel="stylesheet" href="./assets/style/css/nav.css">
    <link rel="stylesheet" href="./assets/style/css/style.css">
    <link rel="stylesheet" href="./assets/style/css/fonts.css">
    <link rel="stylesheet" href="./assets/style/css/articles.css">

    <!-- Frameworks -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./assets/style/frameworks/bootstrap/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/style/frameworks/bootstrap/js/bootstrap.min.js"></script>
    <script src="./assets/style/frameworks/bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

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
    <?php
        include("./assets/elements/nav.html");
      ?>
      <nav class="navbar navbar-light bg-light" style="margin-top:8vh;position:fixed; width:100%; z-index:1000;">
  <span class="navbar-text" style=" text-align:center;">
    VOus lisez : <?php echo $ligne["title"]; ?>
  </span>
  </nav>
    </header>

    <div class="container" style="font-family: 'Comfortaa';padding-top:22vh;">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12">
          <section class="article-view">
            <?php
              echo "<article class='article'>";
              echo "<div>";
              echo "<img class='img-fluid' src=".$ligne["image_link"].">";
              echo "</div>";
              echo "</br>";
              echo "<h6 style='text-transform:uppercase; font-weight:bold;'> Par ".$ligne["pseudo"]." , le ".strftime("%d %B %Y", strtotime($ligne['date']));
              echo "<hr class='hr-flashs'>";
              echo "<br>";
              echo "<h2>";
              echo $ligne["title"];
              echo "</h2>";
              echo "</br>";
              echo $ligne["text"];
              echo "<br>";
              echo "</article>";
              echo "<hr style='color:#000000; hzig'>";
            ?>
          </section>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
          <section class="article-view">

            <h5>Dernières news :</h5>
            <hr class='hr-flashs'>
            <div class="row">

              <div class="list-group" style="margin-left:2vh;">

            <?php
            include ("./cockpit/config.php");
            $request3 = "SELECT a.*, c.name, u.pseudo  from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user order by id_article desc limit 5";
            $Resultat3 = mysqli_query ( $database, $request3 ) or die(mysql_error() ) ;
            while (  $ligne3 = mysqli_fetch_array($Resultat3,MYSQLI_ASSOC)  ) {
              echo '<a href="view_article.php?id='.$ligne3["id_article"].'">';
              echo "<h6 style='text-decoration:none; color:#000000; font-weight:bold;'>".$ligne3["title"]."</h6>";
              echo "<hr>";
              echo "</a>";
              }
          ?>
          </div>
          </div>
          </section>
        </div>
      </div>
		  <br>
		  <h5> Dernières actualitées de la catégorie </h5>
          <hr class="hr-flashs">
			<div class="row">
		  
		    <?php
            include ("./cockpit/config.php");
			
					  
		    $request4 = "SELECT id_category from article where id_article = ".$_GET['id']."";
			$Resultat4 = mysqli_query ( $database, $request4 ) or die(mysql_error() ) ;
			$ligne4 = mysqli_fetch_array($Resultat4,MYSQLI_ASSOC);
			
			$request5 = "SELECT a.*, c.name, u.pseudo from article a join category c on a.id_category = c.id_category join user u on a.id_user = u.id_user where a.id_category = ".$ligne4['id_category']." order by id_article desc limit 3;";
			$Resultat5 = mysqli_query ( $database, $request5 ) or die(mysql_error() ) ;
			while ($ligne5 = mysqli_fetch_array($Resultat5,MYSQLI_ASSOC)) {
              echo "<div class='flashs-card col-lg-4 col-md-6 col-sm-12'>";
			  echo '<a href="view_article.php?id='.$ligne5["id_article"].'">';
              echo "<img src=".$ligne5["image_link"].">";
              echo "<br>";
              echo "<hr class='hr-flashs'>";
              echo "<h6 class='flashs-date'>".strftime("%d %B %Y", strtotime($ligne5['date']))."</h6>";
              echo "<h4 class='flashs-title'>".$ligne5["title"]."</h4>";
			  echo "<p class='flashs-text'>";
			  $text = strip_tags($ligne5["text"]);
			  if (strlen($text) > 150 ) {

				  echo (substr($text, 0, 150). "...") ;
			  }
			  else {
				echo $text;
			  }
			  echo "</p>";
			  echo "</a>";
			  echo "<center>";
			  echo '<a class="see-all" href="view_article.php?id='.$ligne5["id_article"].'">';
			  echo "Lire l'article";
			  echo "</a>";
			  echo "</center>";
              echo "</div>";
              }
          ?>
		 </div>
    </div>
<section style="margin-top:6vh;">

  <?php include './assets/elements/footer.html'; ?>
</section>
  </body>
</html>
