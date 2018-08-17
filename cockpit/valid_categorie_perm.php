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

    $Requete2 = 'DELETE FROM `category` WHERE id_category = '.$id.'';

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: categorie_perm.php');
  }
  else {

    $id = $_GET["id"];
    $name = $_GET["name"];

    include ("config.php");

    $Requete = "SELECT COUNT(*) as nbr from category";

    $Resultat = mysqli_query( $database, $Requete ) ;
    $ligne = mysqli_fetch_array($Resultat,MYSQLI_ASSOC) ;

    $perms = "";

    for ($i = 1; $i <= $ligne["nbr"]; $i++) {
      if (isset($_GET["perm".$i])) {
        $perms = $perms . $i;
      }
      else {
      }
    }

    echo $perms;

    $Requete2 = 'UPDATE `category` SET  `name` = "'.$name.'", permission = "'.$perms.'" WHERE id_category = '.$id.' ';

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: categorie_perm.php?id='.$id.'');
    exit();
  }
?>
