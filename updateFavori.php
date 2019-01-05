<?php 
	require_once("action/UpdateFavoriAction.php");
	$action = new UpdateFavoriAction();
	$action->execute();

	if (isset($_SERVER["HTTP_REFERER"])) {

        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else{
    	location: home.php;
    }
?>