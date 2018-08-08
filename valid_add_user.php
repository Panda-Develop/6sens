<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

  $lastname = $_GET["nom"];
  $firstname = $_GET["prenom"];
  $pseudo = $_GET["pseudo"];
  $password = $_GET["password"];
  $repassword = $_GET["repassword"];
  $email = $_GET["email"];
  $idgroup = $_GET["group"];

  if ($password != $repassword) {
     header('Location: user_perm.php');
     exit(); 
  }
  else {
    $password = SHA1($password);
    echo $password;
  }

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

  include ("config.php");

  $Requete2 = 'INSERT INTO `user` (`firstname`, `lastname` , `pseudo` , `password` , `email` ,`permission`, `id_group`) VALUE ("'.$firstname.'" ,"'.$lastname.'", "'.$pseudo.'","'.$password.'","'.$email.'" , "'.$perms.'", "'.$idgroup.'") ';
  $Resultat2 = mysqli_query( $database, $Requete2 ) ;

  header('Location: user_perm.php');
  exit();

?>
