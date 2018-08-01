<?php
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
    <link rel="stylesheet" href="style.css"/>
  </head>

  <body>
    <header>
    <?php
        include("nav.php");
        echo $ligne["title"];
      ?>
      
    </header>

    <section>
      <?php
        echo "<article class='article'>";
        echo $ligne["date"];
        echo "<br>";
        echo $ligne["text"];
        echo "<br>";
        echo $ligne["id_user"];
        echo "<br>";
        echo $ligne["id_category"];
        echo "<br>";
      echo "</article>"; 
      ?>
    </section>

  </body>
</html>


