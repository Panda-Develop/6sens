<?php
session_start();
if (isset($_SESSION['id'])) {

} else {
  header('location: connexion.php');
}
setlocale (LC_TIME, 'fr_FR.utf8','fra');

    $id = $_GET["id"];
    $nom = $_GET["nom"];
    $prenom = $_GET["prenom"];
    $pseudo = $_GET["pseudo"];
    $email = $_GET["email"];
    
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

    $Requete2 = 'UPDATE `user` SET firstname = "'.$prenom.'", lastname = "'.$nom.'" , pseudo = "'.$pseudo.'", email = "'.$email.'" ,permission = "'.$perms.'" WHERE id_user = "'.$id.'" ' ;

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;

    header('Location: user_perm.php?id='.$id.'');
    exit();
?>
