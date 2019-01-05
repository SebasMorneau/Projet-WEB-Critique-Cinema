<?php

    if(isset($_POST['submit'])){
        $vers = "s_morneau@msn.com";
        $de = $_POST['mailUsager'];
        $nomusager = $_POST['nomUsager'];
        $subject = "SiteWeb";
        $commentaire = $nomusager . "  A écrit:" . "\n\n" . $_POST['commentaire'];

        $headers = "de:" . $de;
      
        mail($vers,$subject,$commentaire,$headers);
       
        echo "Courriel envoyé. Merci " . $nomusager . "!";

        header("location:home.php");
    
        }


?>