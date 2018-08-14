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

  $facebook = $_POST["facebook"];
  $twitter = $_POST["twitter"];
  $instagram = $_POST["instagram"];
  $site = $_POST["site"];

  echo $facebook;
  echo $twitter;
  echo $instagram;
  echo $site;

  $text = $_POST["text"];

  $text = mysql_real_escape_string($text);

  $imagelink = $_POST["image"];

  include ("config.php");

  $Requete = 'INSERT INTO artwork (title, date, text,image_link, facebook , twitter, instagram, web_site, id_user) VALUE ("'.$title.'" ,"'.$date.'", "'.$text.'", "'.$imagelink.'" , "'.$facebook.'" , "'.$twitter.'" , "'.$instagram.'" , "'.$site.'"  ,"'.$author.'") ';
  $Resultat = mysqli_query( $database, $Requete ) ;

  header('Location: index.php');
  exit();

?>
