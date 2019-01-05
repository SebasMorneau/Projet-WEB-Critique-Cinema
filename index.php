<?php
	require_once("action/LoginAction.php");
	require_once("partial/headerLogin.php");

	// la variable $action sert d'object de session ici.
	// elle sert pour savoir si le MDP ou l'usager est legit
	$action = new LoginAction();
	$action->execute();

?>



	<div class="sectionAuthentification">
	<h1><?= $trans->read("index", "h1") ?></h1>
	<form action="index.php" method="post">
			<!-- etape qui verifie si l'usager est legit -->
			<?php
				if ($action->wrongLogin) {
					?>
					<div class="error-div"><strong>Erreur : </strong>Mauvais Mots de passe</div>
					<?php
				}
				if ($action->wasDenied) {
					?>
					<div class="error-div"><strong>Erreur : </strong>Aucun usager avec ce nom d'utilisateur, êtes-vous inscrit?</div>
					<?php
				}
			?>


		<div class="formInputUser"><input type="text" name="UserCourriel" placeholder="Nom d'utilisateur.."/></div>
		<div class="formSeparator"></div>
		<div class="formLabel">&nbsp;</div>
		
		<div class="formInput"><input type="password" name="MDP" placeholder="Mot de passe.."/></div>
		<div class="formSeparator"></div>
		
		<div class="formLabel">&nbsp;</div>
		<div class="boutonConnecter"><button id="bouton" type="submit"><?= $trans->read("index", "connexion") ?></button></div>
		<div class="formSeparator"></div>

		<h2><?= $trans->read("index", "h2") ?></h2>
		<div class="boutonRegister"><button id="bouton" type="button" name="register" onclick="window.location.href='register.php';"><?= $trans->read("index", "register") ?></button></div>
	</form>
</div>
</body>
</html>

<?php