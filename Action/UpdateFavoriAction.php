<?php
	require_once("action/CommonAction.php");
	require_once("action/DAO/CritiqueDAO.php");
	
	class UpdateFavoriAction extends CommonAction {

		public function __construct() {

			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			CritiqueDAO::updateFavori($this->getUsername(),$_GET["critiqueid"]);
		}
	}