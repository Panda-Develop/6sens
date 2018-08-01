<?php   
    $user = $_POST["pseudo"];

    if ($_POST["psw"] == "") {
        $psw = "";
    }
    else {
        $psw = SHA1($_POST["psw"]) ;
    }
    
    $database = mysqli_connect("localhost", "root", "", "6sens");

    $requete = "Select * from user where pseudo = '".$user."' and password = '".$psw."' " ;
    
    $resultat = mysqli_query ( $database, $requete )  or  die(mysql_error() ) ;

    $connect = mysqli_fetch_array($resultat,MYSQLI_ASSOC);
    $id = $connect['id_user'];
    $password = $connect['password'] ;
    $pseudo = $connect['pseudo'] ;

   
        
    if ($pseudo != "" or $psw != "") {
        if ( $user == $pseudo ) {   
            if ($psw == $password) {       
                session_start();
                $_SESSION['id'] = $id;
                mysqli_close ( $database ) ;
                header('Location: index.php');
            }

  

            else if ($psw != $password) {   
                mysqli_close ( $database ) ; 
                header('Location: connexion.php?erreur=3');
                exit();              
            }   
        }

        else if ($user != $pseudo and $psw != $password ) {
            mysqli_close ( $database ) ; 
            header('Location: connexion.php?erreur=4');
            exit();    
        }

        else if ($user != $pseudo) {  
            mysqli_close ( $database ) ; 
            header('Location: connexion.php?erreur=2');
            exit();    
        }   

    }

    else if ($pseudo == "" or $psw == "") {
        mysqli_close ( $database ) ; 
        header('Location: connexion.php?erreur=1');
        exit();   
    }


?>