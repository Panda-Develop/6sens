<?php      
    
    $id = $_GET["id"];

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

    $Requete2 = "UPDATE `group` SET permission = ".$perms." WHERE id_group = ".$id."";

    $Resultat2 = mysqli_query( $database, $Requete2 ) ;
    
    header('Location: group_perm.php?id='.$id.'');
    exit();    
?>
      