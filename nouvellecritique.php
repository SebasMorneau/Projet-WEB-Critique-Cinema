<?php

	require_once("action/NouvelleCritiqueAction.php");
	$action = new NouvelleCritiqueAction();
	$action->execute();

	if($action->getUserType() == "Administrateur"){
		header("location: admin.php");
	}else{
		header("location: home.php");
	}

?>