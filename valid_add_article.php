<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');
include ("config.php");
  $title = $_POST["title"];


  $date = $_POST["date"];


  $author = $_POST["author"];


  $category = $_POST["category"];


  $text = $_POST["text"];

  $text = mysqli_real_escape_string($database,$text);

  $imagelink = $_POST["image"];

  $Requete = 'INSERT INTO article (title, date, text,image_link,id_user, id_category) VALUE ("'.$title.'" ,"'.$date.'", "'.$text.'", "'.$imagelink.'" , "'.$author.'", "'.$category.'") ';
  $Resultat = mysqli_query( $database, $Requete ) ;

  header('Location: index.php');
  exit();

?>
