<?php
include "basededonnees.php";

$MESSAGE_SQL_LISTE_SERVANT = "SELECT `idServant`,`name`,`aka`,`class`,`description`, `face` FROM `servant`";

$requeteListeServants = $basededonnees->prepare($MESSAGE_SQL_LISTE_SERVANT);
$requeteListeServants->execute();
$listeServants = $requeteListeServants->fetchAll();

$pageActive = "listeServant";
require 'header.php';
?>

<div class="bg-black container px-5 my-5" style="--bs-bg-opacity: .7">
    <h1 class="text-white px-5 pt-3">Servant List</h1>
        <a href="add-servant.php" class="btn ms-3 px-3 my-3 text-center text-white font-weight-bold border border-3" data-bs-toggle="modal" data-bs-target="#modal<?=$servant['idServant']?>"> Add servant</a>
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

            <a href="update-servant.php?idServant=<?=$servant['idServant']?>" class="stretched-link"></a>

            <div class="d-flex justify-content-between install mt-3  position-relative">
                <a href="update-servant.php?idServant=<?=$servant['idServant']?>" class="btn btn-success text-center text-white font-weight-bold border border-3"> Edit</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal<?=$servant['idServant']?>">
                Delete
                </button>
            </div>
        </div>
      </div>
      <?php
}
?>
        <?php
foreach ($listeServants as $servant) {
    ?>
            <!-- Modal -->
                <div class="modal fade" id="modal<?=$servant['idServant']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal<?=$servant['idServant']?>Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modal<?=$servant['idServant']?>Label">Deletion of <?=$servant['name']?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you really REALLY want to delete <?=$servant['name']?> ? <br>
                        <i>There's no going back</i>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <form action="delete-servant.php" method="post">
                            <button type="submit" class="btn btn-primary">Yes</button>
                            <input type="hidden" name="idServant" value="<?=$servant['idServant']?>">
                        </form>
                    </div>
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