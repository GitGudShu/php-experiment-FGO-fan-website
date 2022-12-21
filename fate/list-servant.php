<?php
require 'header.php';
require CHEMIN_ACCESSEUR . "ClicDAO.php";

ClicDAO::enregistrerVisite($_SERVER);

require CHEMIN_ACCESSEUR . "ServantDAO.php";

$listeServants = ServantDAO::listerServants();

$pageActive = "listeServant";
?>

<div class="bg-black container px-5 my-5" style="--bs-bg-opacity: .7">
    <h1 class="text-white px-5 pt-3">Servant List</h1>
    <div class="row row-cols-lg-2">

        <?php
foreach ($listeServants as $servant) {
    ?>
      <div class="col my-4 ">
        <div class="card p-3">
            <div class="d-flex flex-row mb-3">
                <img src="<?=$servant['face']?>" class="img-fluid rounded-start border border-dark border-4" alt="face" width="120">
                <div class="d-flex flex-column ms-2">
                    <h3 class="font-weight-bold"><?=$servant['name']?></h3>
                    <h5 class="text-black-50">AKA : <?=$servant['aka']?></h5>
                    <h5 class="aka text-body">Class : <?=$servant['class']?></h5>
                </div>
            </div>
            <span class="text-body"><?=$servant['description']?></span>
            <div class="d-flex justify-content-between install mt-3">
                <a href="servant.php?idServant=<?=$servant['idServant']?>" class="stretched-link"></a>
            </div>
        </div>
      </div>
      <?php
}
?>

    </div>
</div>

<?php
require 'footer.php';
?>

