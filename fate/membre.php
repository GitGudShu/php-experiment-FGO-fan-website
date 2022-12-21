<?php
require 'header.php';
require CHEMIN_ACCESSEUR . "MembreDAO.php";
?>

<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .7">
    <?php
if (isset($_SESSION['membre']['pseudonyme']) && !empty($_SESSION['membre']['pseudonyme'])) {
    ?>
        <span class="h2 text-white">
            Hi there <?=$_SESSION['membre']['pseudonyme']?>
            <img src="images/<?=$_SESSION['membre']['avatar']?>" class="image" alt="avatar" width="60">
        </span>
        <div class="justify-content-end">
            <div ><a href="membre/deconnexion.php" class="link-danger">Log out</a></div>
            <div ><a href="membre/modifier-compte.php" class="link-success">Edit</a></div>
        </div>
        <?php

}
if (empty($_SESSION['membre']['pseudonyme'])) {
    include_once "membre/formulaire-membre.php";
    echo '<div><a href="membre/inscription-identification.php" class="btn-light text-white">Créer un compte</a></div>';
} else {
    $membre = MembreDAO::lireMembreParPseudonyme($_SESSION['membre']['pseudonyme']);
    include_once "membre/vue_membre-detail.php";
}
?>
</div>

<?php
require 'footer.php';
?>
