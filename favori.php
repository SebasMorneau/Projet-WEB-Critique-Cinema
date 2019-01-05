<?php

	require_once("partial/header.php");
	require_once("action/FavoriAction.php");

	$action = new FavoriAction();
	$action->execute();
?>
	
	<!-- bouton retour qui sert juste à revenir à la page précédent pour des tests s-->
	<!-- <div class="boutonRetour"><button type="button" name="register" onclick="window.location.href='index.php';">Retour</button></div>
 -->
	
		<div class="corps">
			
			<div class="feed">

			<!--afficher les critiques favoris-->
			<div>
				<?php foreach($action->listeCritiques as $critique) { ?>
				<div class="critique">
					<div> Titre: <?= $critique["TITRE"] ?> </div>
					<div> <?= $critique["COMMENTAIRE"] ?> </div>
					<div> Par <?= $critique["USERNAME"] ?> </div>
					<div> Ecrit le <?= $critique["DATE_ENVOI"] ?> </div>
					
					<a href="updateFavori.php?critiqueid=<?= $critique["CRITIQUEID"] ?>">
					<?php if($critique["FAVORI"]) { ?>
						<img src="images/star_yellow.png"/ class="etoile"/>
					<?php }
					else{ ?>
						<img src="images/star_white.png" class="etoile"/>
					<?php } ?>
					</a>
				</div>
				<?php } ?>

			</div>

			</div>
			<div class="barGauche"></div>
		</div>

	<?php

	require_once("partial/footer.php");