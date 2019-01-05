<?php

	
	require_once("partial/header.php");
	require_once("action/RechercheAction.php");
	$action = new RechercheAction();
	$action->execute();




?>
	<!--Chercher par user-->

	<div id="formRecherche">
		<form action="recherche.php" method="post">
			<div>Rechercher par utilisateur:</div>
			<input type="text" name="username"></input>
			<button type="submit">Rechercher</button>
		</form>
	</div>

	<!--afficher les critique-->
	<div>
		<?php foreach($action->listeCritiques as $critique) { ?>
		<div class="critique">
			<div> Titre: <?= $critique["TITRE"] ?> </div>
			<div> <?= $critique["COMMENTAIRE"] ?> </div>
			<div> Par <?= $critique["USERNAME"] ?> </div>
			<div> Ecrit le <?= $critique["DATE_ENVOI"] ?> </div>
			
			<!--La redirection à la page efface la recherche, j'ai décidé d'enlevé l'étoile pour le moment-->
			<!--<a href="updateFavori.php?critiqueid=<?= $critique["CRITIQUEID"] ?>">
				<?php if($critique["FAVORI"]) { ?>
					<img src="images/star_yellow.png"/ class="etoile"/>
				<?php }
					else{ ?>
					<img src="images/star_white.png" class="etoile"/>
				<?php } ?>
			</a>-->
		</div>
		<?php } ?>

	</div>

<?php

	require_once("partial/footer.php");