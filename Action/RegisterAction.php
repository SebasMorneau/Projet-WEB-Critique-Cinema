<?php
	require_once("action/DAO/UserDAO.php");
	require_once("action/CommonAction.php");

	class RegisterAction extends CommonAction {
		public $wrongLogin = false;
		public $wasDenied = false;
		public $isRegister = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			$success = null;

			if(!empty($_POST["UserCourriel"]) && !empty($_POST["MDP"])){
				$success = UserDAO::register($_POST["UserCourriel"], $_POST["MDP"], $_POST["MDP2"]);
				if ($success === 1){	
					//echo "usager déjà présent dans la table";
					$this->wasDenied = true;
				}
				else if ($success === 2){
					//echo "mots de passe invalides";
					$this->wrongLogin = true;
				}
				else{
					//echo "réussi";
				
					$this->isRegister = true;
				}	
			}
		}
	}