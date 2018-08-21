<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

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
    
    if ($i == $ligne["nbr"]) {
      $perms = $perm . $i+1;
    } 
  }

  

  include ("config.php");

  $Requete2 = 'INSERT INTO category (name, permission) VALUE ("'.$name.'" ,"'.$perms.'") ';
  $Resultat2 = mysqli_query( $database, $Requete2 ) ;

  header('Location: categorie_perm.php');
  exit();

?>
