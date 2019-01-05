<?php 
require_once("action/HomeAction.php");
require_once("Translator.php");

	if (empty($_SESSION["lang"])) {
		$_SESSION["lang"] = "fr";
	}

	if (!empty($_GET["lang"])) {
		$_SESSION["lang"] = $_GET["lang"];
	}

	$trans = new Translator($_SESSION["lang"]);

	$action = new HomeAction();
	$action->execute();
	
	?>

	<!DOCTYPE html>
<html>
	<head>

		<link href="css/global.css" rel="stylesheet"/>
		<link rel="import" href="path/to/favorite-star.html">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/home.js"></script>
		<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> 

			<title><?= $trans->read("index", "title") ?></title>
	</head>


	<body>

		<header id="enteteUserNAme">
			<h1><?php echo $action->getUserType();?>:
			<!-- 	Fonctions dans CommonAction -->
				<?php 
					echo $action->getUsername();
				?> 
			</h1>
		</header>


	<nav class="menu">
		<ul>
			<li onclick="window.location.href='home.php';"><?= $trans->read("index", "home") ?></li>
			<li onclick="window.location.href='recherche.php';"><?= $trans->read("index", "search") ?></li>
			<li onclick="window.location.href='favori.php';"><?= $trans->read("index", "love") ?></a></li>
			<li id="boutonEcrire"><?= $trans->read("index", "write") ?></li>
			<li onclick="window.location.href='propos.php';"><?= $trans->read("index", "about") ?></li>
			<li id="boutLogOut" onclick="window.location.href='index.php';"><?= $trans->read("index", "logout") ?></li>
		</ul>

	</nav>

			
