<?php include('config/settings.php'); 

include('includes/debutPhp.php'); 

if(!isset($_GET['page'])){
    redirect('agenda.php?page=1');
}

$nbElementPage = 5;
$un = 1;
$debutElementPage = ($_GET['page'] - $un) * $nbElementPage;

$nbElement = $db->prepare('SELECT * FROM event');
$nbElement->execute();

$count = $nbElement->rowCount();

$nbPage = ceil($count / $nbElementPage);


$bancal = $db->prepare('SELECT * FROM event LIMIT :p, :n');
$bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
$bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);

//on execute la requete
$bancal->execute();


$expiration = "1";

$expir = $db->prepare('SELECT * FROM event WHERE event_expiration = :e ORDER BY date_debut DESC LIMIT 3');
$expir->bindParam(':e', $expiration, PDO::PARAM_INT);
//on execute la requete
$expir->execute();

?><!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Agenda - Revue Bancal</title>
		<?php include('includes/head.php'); ?>
	</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="fond-pattern liste-article">
        <div class="wrapper">
            <h1 class="titre-page">Agenda</h1>
            <div class="row row-wrap wrap ">
                <section class="events-expiration col-8 marg-2 marg-1-m col-10-m">
                    <h2>Evenement à expiration</h2>
                    <div class="event-articles row wrap row-wrapp">
                        <?php 
			         //on crée une boucle qui lit tous les réultats trouvés par la requete
			         while($dataEx = $expir->fetch(PDO::FETCH_ASSOC)){ ?>
                        <article class="event-avant col-4">
                            <a href="<?= $dataEx['lien']; ?>" target="_blank">
                                <p class="date-event"><?= dateEU($dataEx['date_debut']); ?></p>
                                <h2><?= $dataEx['titre']; ?></h2>
                                <?php
                                    if(!empty($dataEx['lieu']))
                                        echo '<p class="event-lieu">'.$dataEx['lieu'].'</p>'
                                ?>
                            </a>
                        </article>
                    <?php } ?>
                    </div>
                </section>
            </div>
            <section class="event-contenu">
                <?php 
			         //on crée une boucle qui lit tous les réultats trouvés par la requete
			         while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
                        <div class="row">
                            <div class="event col-10 marg-1">
                                <a href="<?= $data['lien']; ?>" target="_blank">
                                        <p class="date-event col-12-s"><?= dateEU($data['date_debut']); ?>
                                        <?php
                                            if(!empty($data['date_fin']))
                                                echo '<br>'.dateEU($data["date_fin"]);
                                        ?>
                                        </p>
                                    <div class="col-12-s">    
                                        <h2><?= $data['titre']; ?></h2>
                                        <?php
                                            if(!empty($data['lieu']))
                                                echo '<p class="event-lieu">'.$data["lieu"].'</p>'
                                        ?>
                                              
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
            </section>
            <?php if($nbPage>1){?>
            <div class="pagination pagination-centrer">
                <?php if($_GET['page'] != 1){?>
                <a href="agenda.php?page=1"><img src="img/fleche-gauche-02-gris.png" alt="première page" ></a>
                <a href="agenda.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page - 1;
                    echo $page;
                         ?>"><img src="img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                <?php } 
                for($i=1; $i <= $nbPage; $i++){?>
                    <a href="agenda.php?page=<?= $i ?>"
                       <?php if($i == $_GET['page']){ ?> class="active"<?php } ?> ><?= $i ?></a>
                <?php } 
                if($_GET['page'] != $nbPage){?>
                <a href="agenda.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page + 1;
                    echo $page;
                         ?>"><img src="img/fleche-droite-01-gris.png" alt="page après" ></a>
                <a href="agenda.php?page=<?= $nbPage ?>"><img src="img/fleche-droite-02-gris.png" alt="dernière page" ></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
        
    <?php include('includes/footer.php'); ?>
    
        
        
        
</body>
</html>