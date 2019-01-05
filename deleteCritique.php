<?php

	require_once("action/DeleteCritiqueAction.php");
	$action = new DeleteCritiqueAction();
	$action->execute();

	header("location: admin.php");
?>