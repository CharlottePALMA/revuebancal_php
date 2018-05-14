<?php include('../config/settings.php');

//on vide les éléments de la session utilisateur
unset($_SESSION['bancal_user']);
unset($_SESSION['bancal_user_id']);

//on crée un message de confimtation


//on va vers la page de connecion
redirect('../back/login.php');