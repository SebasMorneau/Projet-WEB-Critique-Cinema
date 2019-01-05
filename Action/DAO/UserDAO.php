<?php 

	class UserDAO {


		public static function login($username, $password) {
			$connection = Connection::getConnection();
			//connection a la base de donnée via la classe connection
			$statement = $connection->prepare("SELECT * 
											   FROM USERS 
											   WHERE USERNAME = ?"); // Query pour selectionner une donnée
			$statement->bindParam(1, $username); // varibale ? est associé au parametre $username
			$statement->setFetchMode(PDO::FETCH_ASSOC); // aucune idée c'est quoi. surement rapport avec association ?!
			//setFetchMode -> clé de colonne sont des string(nom de colonne)
			$statement->execute();
			// si un username est == a celui en parametre
			if ($row = $statement->fetch()) {//Si row pas null
				if (password_verify($password, $row["PASSWORD"])){
					if($row["VISIBILITE"] == 1){
						$visibility = 1;
					return $visibility; // bon password ET membre public
					}
					else if($row["VISIBILITE"] == 3){
						$visibility = 3; // bon password et visibilite = admin
						return $visibility;
					}
				}
			}
			else{ // aucun username est egal et cela signifie que l'usager n'existe pas
				return 5; // 5 = visibilite n'exite pas. vois commonACtion
			}

		}

		public static function register($username, $password, $password2){
			$success = 1; // servia a voir si l'usage existe dans la BD!
			//$success = 1 -> user existant
			//$success = 2 -> mot de passe invalide
			//$success = 3 -> Succès
			// connection. similiare a LOGIN...
			$connection = Connection::getConnection();
			// ...tellement similaire....
			$statement = $connection->prepare("SELECT * 
											   FROM USERS 
											   WHERE USERNAME = ?"); // ...que c'est la meme affaire!!
			$statement->bindParam(1, $username);
			$statement->setFetchMode(PDO::FETCH_ASSOC);
			$statement->execute();
			// usager deja dans la base de donnée
			if ($row = $statement->fetch()) {
				return $success;
			}

			else if($password === $password2){
				// ajout de l'usager dans la base de donnée
				$statement = $connection->prepare("INSERT INTO USERS (USERNAME, PASSWORD, VISIBILITE) VALUES (?,?,?)");
				$statement->execute(array($username,password_hash($password, PASSWORD_BCRYPT),1));

				$success = 3;
				return $success;
 			}
 			else{
 				$success = 2;
				return $success;
 			}

		}
	}
