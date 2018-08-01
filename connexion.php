<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> 6sens </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    
    <body>
        <section>
            <div class="Connexion">
                <form action="connect.php" method="POST">
                    <center>
                    
                        Identifiant : <br>
                        <input type="text" name="pseudo" placeholder="Identifiant"> 

                        <br>

                        Mot de passe :<br>
                        <input type="password"  name="psw" placeholder="Mot de passe"> 

                        <br>
                        
                        <input type="submit" value="Connexion">

						<br>

						<a href="index.php">
							<input type="button" value="Retour"/>
						</a>
                        
                    </center>
                </form>
            </div> 
        </section>      
    </body>
</html>