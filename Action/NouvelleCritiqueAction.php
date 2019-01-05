<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CritiqueDAO.php");
	
	class NouvelleCritiqueAction extends CommonAction {

		public $erreur = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
			if(!empty($_POST["critique"])){
				$destination = null;

				if(isset($_FILES['fichier']) && file_exists($_FILES['fichier']['tmp_name']) && is_uploaded_file($_FILES['fichier']['tmp_name'])){

					$destination = "upload/".$_FILES["fichier"]["name"];
					if(!move_uploaded_file($_FILES["fichier"]["tmp_name"], $destination)){
						//die("Erreur d'upload de fichier");
					}
				}

				CritiqueDAO::ajouter($this->getUsername(), $_POST["titre"], $_POST["critique"], $destination);
			}
		}

	}
