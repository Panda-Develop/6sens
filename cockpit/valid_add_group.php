<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

  $name = $_GET["name"];

  include ("config.php");

  $Requete2 = 'INSERT INTO `group` (name) VALUE ("'.$name.'") ';
  $Resultat2 = mysqli_query( $database, $Requete2 ) ;

  header('Location: group_perm.php');
  exit();

?>
