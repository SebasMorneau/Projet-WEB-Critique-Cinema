<?php 
	session_start();
	require_once("action/Constants.php");
	require_once("action/DAO/Connection.php");

	abstract class CommonAction {
		public static $VISIBILITY_PUBLIC = 0;		
		public static $VISIBILITY_MEMBER = 1;
		public static $VISIBILITY_MODERATOR = 2;
		public static $VISIBILITY_ADMINISTRATOR = 3;
		public static $VISIBILITY_NO_USERNAME = 5;

		private $pageVisibility;

		public function __construct($pageVisibility) {
			$this->pageVisibility = $pageVisibility;
		}


		public final function execute() {
			if (!empty($_GET["logout"])) {
				session_unset();
				session_destroy();
				session_start();
			}

			if (empty($_SESSION["visibility"])) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			}

			if ($_SESSION["visibility"] < $this->pageVisibility) {
				header("location:login.php?login-error=true");
				exit;
			}

			$this->executeAction();
		}

		public function isLoggedIn() {
			return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
		}
		
		public function getUsername() {
			$username = "Invité";

			if ($this->isLoggedIn()) {
				$username = $_SESSION["UserCourriel"];
			}

			return $username;
		}
		// utiliser pour le header //
		public function getUserType() {
			$userType = $_SESSION["visibility"];

			if ($this->isLoggedIn()) {
				if($userType == 1){
					$userType = "Utilisateur";
				}
				else if($userType == 3){
					$userType = "Administrateur";
				}
			}

			return $userType;
		}

		// Design pattern : Template method
		protected abstract function executeAction();
	}