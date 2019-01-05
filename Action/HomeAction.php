<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CritiqueDAO.php");
	
	class HomeAction extends CommonAction {

		public $listeCritiques = array();
	
		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
			$this->listeCritiques = CritiqueDAO::lister($this->getUsername());
			
		}

	}

