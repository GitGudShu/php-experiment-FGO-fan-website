<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

if (isset($_POST['membre-authentification'])) {
    $filtreMembre = array();
    $filtreMembre['pseudonyme'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['motdepasse'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['courriel'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['prenom'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['nom'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['avatar'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $membre = filter_input_array(INPUT_POST, $filtreMembre);

    $membreTrouve = MembreDAO::trouverMembre($membre);
}

if (password_verify($membre['motdepasse'], $membreTrouve['motdepasse'])) {

    $_SESSION['membre']['pseudonyme'] = $membreTrouve['pseudonyme'];
    $_SESSION['membre']['prenom'] = $membreTrouve['prenom'];
    $_SESSION['membre']['nom'] = $membreTrouve['nom'];
    $_SESSION['membre']['courriel'] = $membreTrouve['courriel'];
    $_SESSION['membre']['avatar'] = $membreTrouve['avatar'];

    header('location: ../membre.php');
} else {
    $_SESSION['erreur'] = "Votre pseudonyme ou votre mot de passe est invalide";
    header('location: ../membre.php');

}
