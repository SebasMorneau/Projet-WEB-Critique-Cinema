<?php

	class CritiqueDAO {

		public static function ajouter($username, $titre, $critique,$destination){
			$connection = Connection::getConnection();

			$requete = $connection->prepare('
				INSERT INTO critique(username, titre, commentaire, date_envoi, fichier)
				VALUES(?,?,?,SYSDATE,?)');

			$requete->bindParam(1, $username);
			$requete->bindParam(2, $titre);
			$requete->bindParam(3, $critique);
			$requete->bindParam(4, $destination);

			$requete->execute();
		}

		public static function lister($username){
			$connection = Connection::getConnection();
			
			$requete = $connection->prepare('
				SELECT 
  					users.username,
  					critique.critiqueid,
  					critique.titre,
  					critique.commentaire,
  					critique.date_envoi,
  					critique.fichier,
  					favori.critiqueid AS favori
				FROM critique 
				INNER JOIN users ON users.username = critique.username
				LEFT JOIN favori ON critique.critiqueid = favori.critiqueid
					AND favori.username = ? 
				ORDER BY critique.date_envoi DESC
				');

			$requete->bindParam(1, $username);
			$requete->execute();

			$listeCritiques= array();
			while($ligne = $requete->fetch()){
				$listeCritiques[] = $ligne;
			}
			return $listeCritiques;
		}

		public static function listerparuser($username,$userlogged){
			$connection = Connection::getConnection();
			
			$requete = $connection->prepare('
				SELECT 
  					users.username,
  					critique.critiqueid,
  					critique.titre,
  					critique.commentaire,
  					critique.date_envoi,
  					critique.fichier,
  					favori.critiqueid AS favori
				FROM critique 
				INNER JOIN users ON users.username = critique.username 
				LEFT JOIN favori ON critique.critiqueid = favori.critiqueid
					AND favori.username = ? 
				WHERE users.username = ?
				ORDER BY critique.date_envoi DESC
				');

			$requete->bindParam(1, $userlogged);
			$requete->bindParam(2, $username);
			
			$requete->execute();

			$listeCritiquesParUser= array();
			while($ligne = $requete->fetch()){
				$listeCritiquesParUser[] = $ligne;
			}

			return $listeCritiquesParUser;
		}

		public static function updateFavori($username,$critiqueId){
			$connection = Connection::getConnection();
			
			$requete = $connection->prepare('
				SELECT 
					critiqueid
				FROM favori
				WHERE critiqueid = ?
				AND username = ?');
			$requete->bindParam(1, $critiqueId);
			$requete->bindParam(2, $username);
			$requete->execute();

			if($ligne = $requete->fetch()){
				//Si la critique existe dans favori on  la delete pour plus qu'elle ne soit favori
				$requete2 = $connection->prepare('
					DELETE FROM favori
					WHERE critiqueid = ?
					AND username = ?
					');
				$requete2->bindParam(1, $critiqueId);
				$requete2->bindParam(2, $username);
				$requete2->execute();
			}else{
				//Sinon on l'ajoute pour qu'elle devienne favori
				$requete2 = $connection->prepare('
					INSERT INTO favori(critiqueid,username)
					VALUES(?,?)');	
				$requete2->bindParam(1, $critiqueId);
				$requete2->bindParam(2, $username);
				$requete2->execute();
			}
		}

		public static function listerparfavori($usernameLogged){
			$connection = Connection::getConnection();
			
			$requete = $connection->prepare('
				SELECT 
  					users.username,
  					critique.titre,
  					critique.commentaire,
  					critique.date_envoi,
  					critique.fichier,
  					1 AS favori,
  					critique.critiqueid
				FROM critique 
				INNER JOIN users ON users.username = critique.username
				INNER JOIN favori ON critique.critiqueid = favori.critiqueid 
				WHERE favori.username = ?
				ORDER BY critique.date_envoi DESC
				');

			$requete->bindParam(1, $usernameLogged);
			
			$requete->execute();

			$listeCritiquesParFavori= array();
			while($ligne = $requete->fetch()){
				$listeCritiquesParFavori[] = $ligne;
			}

			return $listeCritiquesParFavori;
		}

		public static function delete($critiqueid){
			$connection = Connection::getConnection();

			$requete = $connection->prepare('
				DELETE FROM favori
				WHERE critiqueid = ?');

			$requete->bindParam(1, $critiqueid);

			$requete->execute();

			$requete = $connection->prepare('
				DELETE FROM critique
				WHERE critiqueid = ?');

			$requete->bindParam(1, $critiqueid);

			$requete->execute();
		}
	}