<?php

	require_once("partial/header.php");
	require_once("action/HomeAction.php");

	$action = new HomeAction();
	$action->execute();
?>

	
	<!-- bouton retour qui sert juste à revenir à la page précédent pour des tests s-->
	<!-- <div class="boutonRetour"><button type="button" name="register" onclick="window.location.href='index.php';">Retour</button></div>
 -->
	
		<div class="corps">
			
			<div class="feed">

				<!--Entrer une nouvelle critique-->
				<div class="boiteEcrire">
					<form class="ecritureCritique" action="nouvelleCritique.php" method="post" enctype="multipart/form-data">
						<input id="inputTexteCritique" type="text" name="titre" placeholder="Écrire titre du film ici.." />
						<textarea id="textEcrire" name="critique" rows="4" cols="50" placeholder="Écrire ici.."></textarea>
						<input type="file" name="fichier"></input>
						<button id="boutonEcrireCritique" type="submit">Publier</button>
					</form>
				</div>
			<!-- lorsque l'on click sur le div, la fonction ajouter est appeler -->
			<!--<div class="critique" onclick="ajouter()">Critique 1</div>-->

			<!--afficher les critique-->
			<div>
				<?php foreach($action->listeCritiques as $critique) { ?>
				<div class="critique">
					<div class="titreCritique"> Titre: <?= $critique["TITRE"] ?> </div>
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

					<?php if($critique["FICHIER"]){ ?>
						<img src="<?= $critique["FICHIER"] ?>"/>
					<?php } ?>

				</div>
				<?php } ?>

			</div>

			</div>
			<div class="barGauche"></div>
		</div>

	<?php

	require_once("partial/footer.php");