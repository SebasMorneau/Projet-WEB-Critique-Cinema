<?php
	require_once("partial/headerLogin.php");
	require_once("action/RegisterAction.php");

	$action = new RegisterAction();
	$action->execute();

?>

	<form class="sectionAuthentification" action="register.php" method="post">


	<h1>Cinéma Critique</h1>

	<?php 
				if ($action->wasDenied) {
					?>
					<div class="error-div"><strong>Erreur : </strong>Nom d'utilisateur non disponible!</div>
					<?php
				}
				if ($action->wrongLogin) {
					?>
					<div class="error-div"><strong>Erreur : </strong>Votre mot de passe n'est pas le même!</div>
					<?php
				}
				if($action->isRegister){
					?>
					<div class="confirmation"><strong>Bravo!</strong></div>
					<p>Confirmer votre inscription en cliquant sur connexion et en vous connectant!</p>
					<?php
				}
			if(!$action->isRegister){
				?>

		<div class="formLabel">Créer votre nom d'utilisateur</div>
		<div class="formInputUser"><input type="text" name="UserCourriel" /></div>
		<div class="formSeparator"></div>
		<div class="formLabel">&nbsp;</div>
		
		<div class="formLabel">Créer votre mot de passe</div>
		<div class="formInput"><input type="password" name="MDP" /></div>
		<div class="formSeparator"></div>
		
		<div class="formLabel">Confirmer votre mot de passe</div>
		<div class="formInput"><input type="password" name="MDP2" /></div>
		<div class="formSeparator"></div>

		<div class="formLabel">&nbsp;</div>
		<div><button id="bouton" type="submit">S'inscrire</button></div>
		<div class="formSeparator"></div>
		<div class="formLabel">&nbsp;</div>

			<?php
			}
			?>

		<div><button id="boutonretour" type="button" name="register" onclick="window.location.href='index.php';"><?php
						if($action->isRegister){
							?>Connexion!<?php 
						}
						else if(!$action->isRegister){							
							?>Retour <?php
						}
						?>
						</button></div> 

	<?php