<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/UserDAO.php");
	
	class LoginAction extends CommonAction {
		public $wrongLogin = false;
		public $wasDenied = false;



		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			if (!empty($_GET["login-error"])) {
				$this->wasDenied = true;
				// aucun usager vailde
			}

			if (isset($_POST["UserCourriel"])) { //si le user name existe dans la DB
				$visibility = UserDAO::login($_POST["UserCourriel"], $_POST["MDP"]);
				//direction UserDAO pour voir si le mot de passe est valide

				if ($visibility == CommonAction::$VISIBILITY_MEMBER) {
					//si l'on rentre ici, le MDP est bon, il s'agit d'un membre et non admin.
					// la variable session contient la personalité de cet usager
					$_SESSION["visibility"] = $visibility;
					$_SESSION["UserCourriel"] = $_POST["UserCourriel"];
					// direction page princiale du site
					header("location:home.php"); 
					exit;
				}
				else if($visibility == CommonAction::$VISIBILITY_ADMINISTRATOR){
					// si l'on rentre ici, usager = admin et MDP = bon
					$_SESSION["visibility"] = $visibility;
					$_SESSION["UserCourriel"] = $_POST["UserCourriel"];
					// direction page ADMIN
					header("location:admin.php");
					exit;
				}
				else if($visibility == CommonAction::$VISIBILITY_NO_USERNAME){
					$this->wasDenied = true;
					// aucun usager valide

				}
				else {
					$this->wrongLogin = true;
					// usager valide mais MDP non valide
				}
			}
		}
	}
