<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');
  include ("config.php");
  $title = $_POST["title"];

  echo $title;
  echo "<br>";
  
  $date = $_POST["date"];

  echo $date;
  echo "<br>";
  
  $author = $_POST["author"];

  echo $author;
  echo "<br>";
  
  $category = $_POST["category"];

  echo $category;
  echo "<br>";
  
  $text = $_POST["text"];

  $text = mysqli_real_escape_string($database,$text);
  
  echo $text;
  echo "<br>";
  
  
  $imagelink = $_POST["image"];
  
  echo $imagelink;
  echo "<br>";
  
  $Requete = 'INSERT INTO article (title, date, text,image_link, id_user, id_category) VALUE ("'.$title.'" ,"'.$date.'", "'.$text.'", "'.$imagelink.'" ,"'.$author.'", "'.$category.'" ) ';
  $Resultat = mysqli_query( $database, $Requete ) ;

 // header('Location: index.php');
 // exit();

?>

