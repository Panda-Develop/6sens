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

    $Requete2 = 'DELETE FROM `article` WHERE id_article = '.$id.' ';

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: edit_article.php');
    exit();
  }
  else {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $category = $_POST["category"];
    $text = $_POST["text"];
	$text = mysqli_real_escape_string($database,$text);
    $imagelink = $_POST["image"];

    $Requete = 'UPDATE article SET title = "'.$title.'", id_category = '.$category.', text = "'.$text.'" , image_link = "'.$imagelink.'"  WHERE id_article = '.$id.' ';

    $Resultat = mysqli_query( $database, $Requete ) ;

    header('Location: article.php?id='.$id.'');
    exit();
  }
?>

