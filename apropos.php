<?php
//on importe le setting
include('config/settings.php');

include('includes/debutPhp.php'); 

$nompage = 'apropos';

$bancal = $db->prepare('SELECT * FROM content WHERE page = :p');
$bancal->bindParam(':p', $nompage, PDO::PARAM_STR);
$bancal->execute();

$data = $bancal->fetch(PDO::FETCH_ASSOC);


?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>A propos - Revue Bancal</title>
        <?php include('includes/head.php'); ?>
    </head>
<body>
    
    <?php include('includes/header.php');  ?>
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
           <h1 class="titre-page">A Propos</h1>
            <hr class="half-rule">
            <section class="page-form liste-article">
                <div class="row">
                    <section class="col-10 marg-1">
                        <div class="row no-padding">
                            <article class="col-10 marg-mobile marg-1 article-contenu">
                            <p><?php echo $data['content'] ?></p>
                            </article>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </div>
 
    <?php include('includes/footer.php');  ?>        
        
</body>
</html>