<?php

include('../config/settings.php');

?><!DOCTYPE html>
<html>
<head>
    <title>Connection</title>
    <?php include('../includes/head_back.php'); ?>
</head>
    
<body>
<div class="wrapper">
    <?php flash_out(); ?>
	<div class="marg-3 col-6 connection">
  		<div class="container">
  			<h1 class="titre-connection">CMS</h1>
  				<div class="imgcontainer">
    				<img src="../img/bancal.png" alt="Avatar" class="avatar">
  				</div>
  			<div class="marg-2 col-8">
               <form action="../core/login.php" method="post"> 
   					<p>
                        <label id="pseudo">Email</label>
    					<input name="pseudo" type="text" class="login-form-2" placeholder="Entrez votre nom d'utilisateur">
                    </p>	
   					<p>
                        <label id="password">Mot de passe</label>
    				    <input name="password" type="text" class="login-form-2" placeholder="Entrez votre mot de passe">
                    </p>
                    <p class="centrer">
	 				 <button class="button-page" type="submit">Valider</button>
	 		 	    </p>
                </form>
	 		 </div>
	  	</div>
	</div>
 		</div>  

</body></html>