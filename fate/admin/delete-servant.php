<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "ServantDAO.php";

$idServant = filter_var($_POST['idServant'], FILTER_SANITIZE_NUMBER_INT);

$deleteSuccessful = ServantDAO::deleteServant($idServant);

if ($deleteSuccessful) {
    echo "Your servant was deleted from the database";
} else {
    echo "Failed";
}
?>
<br>
<a href="index.php" class="stretched-link"> Go back</a>
