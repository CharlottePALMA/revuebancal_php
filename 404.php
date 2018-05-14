<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Erreur 404 - Page non trouvée</title>
        <?php include('includes/head.php'); ?>
    </head>
<body>
    
    <?php include('includes/header.php');  ?>
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <div>
                <figure><img src="img/404.png" alt="Erreur 404"/></figure>  
            </div>
        </div>
    </div>
 
    <?php include('includes/footer.php');  ?>        
        
</body>
</html>