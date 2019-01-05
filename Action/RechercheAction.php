<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CritiqueDAO.php");
	
	class RechercheAction extends CommonAction {

		public $listeCritiques = array();
		
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
			if(!empty($_POST["username"])){
				
				$this->listeCritiques = CritiqueDAO::listerparuser($_POST["username"], $this->getUsername());
			}
		}

	}
