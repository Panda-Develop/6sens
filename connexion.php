<?php
    session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title> 6sens </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="./style/css/connexion.css">
        <link rel="stylesheet" href="./style/css/reset.css">
        <link rel="stylesheet" href="./style/css/navbar.css">


    </head>

    <body>
      <header id="connexion-header">
        <h1 class="title">Se connecter :</h1>
      </header>
        <section>


	<div class="login">
		<div class="login-screen">

			<form action="connect.php" method="post">
        <div class="login-form">
  				<div class="control-group">
  				<input type="text" class="login-field" value="" placeholder="Identifiant" id="login-name" name="pseudo">
  				<label class="login-field-icon fui-user" for="login-name"></label>
  				</div>

  				<div class="control-group">
  				<input type="password" class="login-field" value="" placeholder="Mot de passe" id="login-pass" name="psw">
  				<label class="login-field-icon fui-lock" for="login-pass"></label>
  				</div>

          <input type="submit" value="Connexion" class="btn btn-primary btn-large btn-block">
  				<a class="login-link" href="../index.php">Retour</a>
  			</div>
      </form>
		</div>
	</div>
</body>
        </section>
    </body>
</html>
