<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CritiqueDAO.php");
	
	class FavoriAction extends CommonAction {

		public $listeCritiques = array();
	
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
			$this->listeCritiques = CritiqueDAO::listerparfavori($this->getUsername());
			
		}
	}