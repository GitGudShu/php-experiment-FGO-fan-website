<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";

ClicDAO::enregistrerVisite($_SERVER);

require CHEMIN_ACCESSEUR . "ServantDAO.php";

$idServant = filter_var($_GET['idServant'], FILTER_SANITIZE_NUMBER_INT);
$servant = ServantDAO::lireServant($idServant);

require 'header.php';
?>

<div class="container h-100 mt-5">
    <div class="row">
      <div class="col my-4 ">
        <div class="card mb-3" style="max-width: 1100px;">
            <div class="row g-0">
                <div class="col-md-4 p-3">
                <img src="<?=$servant['image']?>" class="img-fluid rounded-start border border-dark border-4" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title"><?=$servant['name']?></h1>
                    <h3 class="text-black-50">AKA : <?=$servant['aka']?></h3>
                    <div class="row row-cols-3 py-3 h-100">
                        <h5 class="col text-body">Class : <?=$servant['class']?></h5>
                        <h5 class="col text-body">ATK : <?=$servant['atk']?></h5>
                        <h5 class="col text-body">Illustrator : <?=$servant['illustrator']?></h5>
                        <h5 class="col text-body">Attribute : <?=$servant['attribute']?></h5>
                        <h5 class="col text-body">HP : <?=$servant['hp']?></h5>
                        <h5 class="col text-body">Alignements : <?=$servant['alignement']?></h5>
                    </div>
                    <p><?=$servant['description']?> <?=$servant['lore']?></p>
                    <a class="text-success stretched-link" href="list-servant.php?retour=<?=$servant['idServant']?>">Return to list</a>
                </div>
                </div>
            </div>
            </div>
      </div>
    </div>
</div>

<?php
require 'footer.php';
?>

