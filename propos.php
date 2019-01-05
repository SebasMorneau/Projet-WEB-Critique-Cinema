<?php 
	require_once("partial/header.php");
	require_once("Action/HomeAction.php");
	require_once("Action/emailAction.php");

	$action = new HomeAction();
	$action->execute();

?>

	<div class="corps">
		<div id="PageApropos">
			<p>Communiquer avec les administrateurs</p>

			<form action="emailAction.php" method="post" enctype="text/plain">
			Votre nom:<br>
			<input type="text" name="nomUsager" size="50"><br>
			Votre adresse courriel:<br>
			<input type="text" name="mailUsager" size="50"><br>
			Vos bons commentaires:<br>
			<textarea name="commentaire" id="text"></textarea><script> CKEDITOR.replace( 'text' );</script>

			<input type="submit" value="Envoyer"></input>	
			</form>


		</div>
<?php
