<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CritiqueDAO.php");
	
	class DeleteCritiqueAction extends CommonAction {

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {
			
			CritiqueDAO::delete($_GET["critiqueId"]);
		}

	}