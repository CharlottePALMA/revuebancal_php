<?php
//on importe le setting
include('../config/settings.php'); 

//si on a pas reçu le formulaire
if(empty($_POST)){
	//on va sur le formulaire
	redirect('../back/login.php');
//sinon
}else{
	//on crée une requete pour lire les utilisateur tels que le login le pseudo et le password
	$users = $db->prepare('SELECT * FROM user WHERE email = :l AND password = :p ');
	//il relie :l et le login
	$users->bindParam(':l', $_POST['pseudo'], PDO::PARAM_STR);
	//il crypte le mot de passe que nous a mis l'utilisaetur
	$pass = cryptPassword($_POST['password']);
    
    var_dump($pass);
    
	//il lie les paramètres du password
	$users->bindParam(':p', $pass, PDO::PARAM_STR);
	$users->execute();

	//(rowCount de la requete) si on a pas trouvé l'utilisateur
	if($users->rowCount() == 0){
		//on crée un message d'erreur
		flash_in('error', 'Le pseudo et mot de passe ne correspondent pas');
		//on va vers la page login
		redirect('../back/login.php');
	//sinon
	}else{
		
		$data =$users->fetch(PDO::FETCH_ASSOC);

		//on crée les données dans la session
		$_SESSION['bancal_user'] = $data['email'];
		$_SESSION['bancal_user_id'] = $data['id'];
        $_SESSION['bancal_user_nom'] = $data['nom'];
        $_SESSION['bancal_user_prenom'] = $data['prenom'];

		//on va vers index.php
		redirect('../back/index.php');
	//fin du test
	}
//fin du test
}