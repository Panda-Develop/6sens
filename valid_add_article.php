<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

  $title = $_POST["title"];


  $date = $_POST["date"];


  $author = $_POST["author"];


  $category = $_POST["category"];


  $text = $_POST["text"];

  $text = mysql_real_escape_string($text);

  $imagelink = $_POST["image"];

  include ("config.php");

  $Requete = 'INSERT INTO article (title, date, text,image_link,id_user, id_category) VALUE ("'.$title.'" ,"'.$date.'", "'.$text.'", "'.$imagelink.'" , "'.$author.'", "'.$category.'") ';
  $Resultat = mysqli_query( $database, $Requete ) ;

  header('Location: index.php');
  exit();

?>
