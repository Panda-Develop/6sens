<?php
session_start();
  $id = $_GET["id"];
  $database = mysqli_connect("localhost", "root", "", "6sens");
  $request = "Select * from article where id_article = $id";
  $Resultat = mysqli_query ( $database, $request ) or die(mysql_error() ) ;
  $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC);
?>


<html>
  <head>
    <title> Blog </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./index.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>

  <body>
    <header>
    <?php
        include("nav.php");
      ?>

    </header>

    <section class="article-view container">
      <nav aria-label="breadcrumb" style="margin-top:4vh;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./index.php">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $ligne["title"]; ?></li>
      </ol>
    </nav>
      <?php
        echo "<article class='article'>";
        echo "<div class='text-center'>";
        echo "<img class='img-fluid' src=".$ligne["image_link"].">";
        echo "</div>";
        echo "</br>";
        echo "<h6 style='text-transform:uppercase; font-weight:bold;'> Par ".$ligne["author"]." ,le ".$ligne["date"]."</h6>";
        echo "<br>";
        echo "<h2>";
        echo $ligne["title"];
        echo "</h2>";
        echo "</br>";
        echo $ligne["text"];
        echo "<br>";
        echo "</article>";
      ?>
    </section>

    <?php include './footer.php'; ?>
  </body>
</html>
