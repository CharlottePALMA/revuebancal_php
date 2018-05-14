<?php include('../config/settings.php'); 

//on regarde si l'utilisateur n'est pas connecté
if(empty($_SESSION['bancal_user'])){
	//on le vire vers login
	redirect('login.php');
}


if(isset($_GET['page'])){
        $debutElementPage = ($_GET['page'] - $un) * $nbElementPage;
    }else{
        $debutElementPage = 0;
    }

$nbElementPage = 15;
$un = 1;
$une = 1;

$nbElement = $db->prepare('SELECT * FROM article WHERE slider = :u');
$nbElement->bindParam(':u', $une, PDO::PARAM_INT);
$nbElement->execute();

$count = $nbElement->rowCount();

$nbPage = ceil($count / $nbElementPage);


$bancal = $db->prepare('
SELECT * 
FROM article 
WHERE a_la_une = :u
ORDER BY created DESC 
LIMIT :p, :n');

$bancal->bindParam(':u', $une, PDO::PARAM_INT);
$bancal->bindParam(':p', $debutElementPage, PDO::PARAM_INT);
$bancal->bindParam(':n', $nbElementPage, PDO::PARAM_INT);


//on execute la requete
$bancal->execute();

?><!DOCTYPE html>
<html>
<head>
    <title>Liste des articles du moment</title>
    <?php include('../includes/head_back.php'); ?>
</head>

<body>
    <?php include('../includes/header_back.php'); ?>
    <div class="wrapper">
        <div class="bloc-page liste-page">
            <section class="entete-page">
                <div class="row">
                    <h1 class="titre-page">Articles du moment</h1>
	           </div>
            </section>
            <section class ="module-recherche">
                <div class="wrapper">
                    <div class="row">
                        <div class= "col-10 marg-1">
                            <table class="table-box">
                                <tr class="table-row">
                                    <td>Titre</td>
                                    <td>Editeur</td>
                                    <td>Date</td>
                                </tr><?php 
                                    //on cree une boucle qui lit tous les réultats trouvés par la requete
                                    while($data = $bancal->fetch(PDO::FETCH_ASSOC)){ ?>
                                    <tr>
                                        <td><a href="updateArticle.php?id=<?= $data['id'] ?>">
						              <?= $data['titre']; ?>
					                   </a></td>
                                        <td><?=$data['editeur_article']; ?></td>
                                        <td><?php
                                                if($data['etat'] == 1){
                                                    echo 'Brouillon';
                                                }else{
                                                    echo 'Publié';
                                                }
                                            ?><br><?= dateEU($data['created']); ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <?php if($nbPage>1){?>
            <div class="pagination pagination-centrer">
                <?php if($_GET['page'] != 1){?>
                <a href="page_liste_articlemoment.php?page=1"><img src="../img/fleche-gauche-02-gris.png" alt="première page" ></a>
                <a href="page_liste_articlemoment.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page - 1;
                    echo $page;
                         ?>"><img src="../img/fleche-gauche-01-gris.png" alt="page avant" ></a>   
                <?php } 
                for($i=1; $i <= $nbPage; $i++){?>
                    <a href="page_liste_articlemoment.php?page=<?= $i ?>"
                       <?php if($i == $_GET['page']){ ?> class="active"<?php } ?> ><?= $i ?></a>
                <?php } 
                if($_GET['page'] != $nbPage){?>
                <a href="page_liste_articlemoment.php?page=<?php
                    $page = $_GET['page'];
                    $page = $page + 1;
                    echo $page;
                         ?>"><img src="../img/fleche-droite-01-gris.png" alt="page après" ></a>
                <a href="page_liste_articlemoment.php?page=<?= $nbPage ?>"><img src="../img/fleche-droite-02-gris.png" alt="dernière page" ></a>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>