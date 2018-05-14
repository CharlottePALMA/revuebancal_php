<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Formulaire envoyé - Revue Bancal</title>
		<?php include('includes/head.php'); ?>        
	</head>
<body>
    
    <?php include('includes/header.php'); ?>
      
    <div class="fond-pattern" id="form-envoi">
        <div class="wrapper">
            <section class="page-form col-8 marg-2 col-12-m marg-mobile">
                <p class="margin-para">Le formulaire a bien été envoyé !</p>
            </section>
        </div>
    </div>
    
    <?php include('includes/footer.php'); ?>
    
</body>
</html>