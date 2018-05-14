<?php

$derniersEvent = $db->prepare('SELECT * FROM event ORDER BY date_debut DESC LIMIT 5');
//on execute la requete
$derniersEvent->execute();

$derniersEvent2 = $db->prepare('SELECT * FROM event ORDER BY date_debut DESC LIMIT 5');
//on execute la requete
$derniersEvent2->execute();

$reseaux = $db->prepare('SELECT * FROM social');
//on execute la requete
$reseaux->execute();


$categoriesH = $db->prepare('SELECT * FROM categories');
//on execute la requete
$categoriesH->execute();
$datacategoriesH = $categoriesH->fetchAll(PDO::FETCH_ASSOC);

$filepath = $_SERVER['PHP_SELF'];
$filepath = explode('/', $filepath);
$filename = array_pop($filepath);



