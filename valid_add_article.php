<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

  $title = $_GET["title"];


  $date = $_GET["date"];


  $author = $_GET["author"];


  $category = $_GET["category"];


  $text = "<div>".$_GET["text"]. "</div>";

  $imagelink = $_GET["image"];

  include ("config.php");

  $Requete = 'INSERT INTO article (title, date, text,image_link,id_user, id_category) VALUE ("'.$title.'" ,"'.$date.'", "'.$text.'", "'.$imagelink.'" , "'.$author.'", "'.$category.'") ';
  $Resultat = mysqli_query( $database, $Requete ) ;

  header('Location: index.php');
  exit();

?>
