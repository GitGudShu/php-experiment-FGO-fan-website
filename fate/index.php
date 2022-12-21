<?php
require "configuration.php";
include "basededonnees.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";

ClicDAO::enregistrerVisite($_SERVER);

$MESSAGE_SQL_LISTE_SERVANT = "SELECT `idServant`,`name`,`aka`,`class`,`description`, `face` FROM `servant`";

$requeteListeServants = $basededonnees->prepare($MESSAGE_SQL_LISTE_SERVANT);
$requeteListeServants->execute();
$listeServants = $requeteListeServants->fetchAll();

$pageActive = "listeServant";
require 'header.php';
?>
<div class="container-fluid">
    <div class="container">
        <div class="centered">
            <div class="bg-black px-5 text-center text-white" style="--bs-bg-opacity: .7">
                <h1 class="px-3 pt-3">Fate Grand Order Servant</h1>
                <h5 class="px-3 py-4">On this cool website, you will find a list of servants selected by yours truly ! Click on this message to redirect to the list page !</h5>
                <a class="stretched-link" href="list-servant.php"></a>
            </div>
        </div>
    </div>
</div>

<?php
require 'footer.php';
?>

