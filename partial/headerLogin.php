<?php

	require_once("Translator.php");

	if (empty($_SESSION["lang"])) {
		$_SESSION["lang"] = "fr";
	}

	if (!empty($_GET["lang"])) {
		$_SESSION["lang"] = $_GET["lang"];
	}

	$trans = new Translator($_SESSION["lang"]);
	
?>

<!DOCTYPE html>
<html>
	<head>

		<link href="css/pageLogin.css" rel="stylesheet"/>

			<title><?= $trans->read("index", "title") ?></title>
	</head>
	
	<body>
	
			<div class="boutonLang francais" onclick="window.location.href='?lang=fr';">Francais</div>
			<div class="boutonLang anglais" onclick="window.location.href='?lang=en';">English</div>
	