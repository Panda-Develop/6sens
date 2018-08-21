<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

  if (isset($_GET["delete"])){

    include ("config.php");

    $id = $_GET["id"];

    $Requete2 = 'DELETE FROM `group` WHERE `group`.`id_group` = '.$id.'';

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: group_perm.php');
  }
  else {


    $id = $_GET["id"];
    $name = $_GET["name"];

    $Requete2 = 'UPDATE `group` SET  `name` = "'.$name.'" WHERE id_group = '.$id.' ';

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: group_perm.php?id='.$id.'');
    exit();
  }
?>
