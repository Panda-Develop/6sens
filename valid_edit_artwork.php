<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');
include ("config.php");
  if (isset($_POST["delete"])){

    include ("config.php");

    $id = $_POST["id"];

    $Requete2 = 'DELETE FROM `artwork` WHERE id_artwork = '.$id.' ';

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: edit_artwork.php');
    exit();
  }
  else {
    $id = $_POST["id"];
    $title = $_POST["title"];
	$facebook = $_POST["facebook"];
	$twitter = $_POST["twitter"];
	$instagram = $_POST["instagram"];
	$site = $_POST["site"];
    $text = $_POST["text"];
	$text = mysqli_real_escape_string($database,$text);
    $imagelink = $_POST["image"];

    $Requete = 'UPDATE artwork SET title = "'.$title.'", text = "'.$text.'" , image_link = "'.$imagelink.'", facebook = "'.$facebook.'" , twitter = "'.$twitter.'" , instagram = "'.$instagram.'" , web_site = "'.$site.'"  WHERE id_artwork = '.$id.' ';

    $Resultat = mysqli_query( $database, $Requete ) ;

    header('Location: artwork.php?id='.$id.'');
    exit();
  }
?>

