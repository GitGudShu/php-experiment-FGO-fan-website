<?php
require '../configuration.php';

if (isset($_POST['inscription-informations'])) {

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreur2'] = "Vos mots de passe doivent être identiques";
        header("location: inscription-informations.php");
    }

    if (empty($_POST['pseudonyme']) || !preg_match('/^[A-Za-z0-9]+([A-Za-z0-9]*|[._-]?[A-Za-z0-9]+)*$/', $_POST['pseudonyme'])) {
        $_SESSION['erreur2'] = "Votre pseudo est invalide";
        header("location: inscription-informations.php");

    } else {
        require CHEMIN_ACCESSEUR . "MembreDAO.php";
        $membre = MembreDAO::lireMembreParPseudonyme($_POST['pseudonyme']);

        if ($membre) {
            $_SESSION['erreur2'] = "Ce pseudo est déjà utilisé";
            header("location: inscription-informations.php");
        }
    }

    if (empty($_SESSION['erreur2'])) {
        //require 'header.php';

        $filtreMembre = array(
            'pseudonyme' => FILTER_SANITIZE_ENCODED,
            'motdepasse' => FILTER_SANITIZE_ENCODED,
        );

        $nouveauMembre = filter_input_array(INPUT_POST, $filtreMembre);
        $_SESSION['membre']['pseudonyme'] = $nouveauMembre['pseudonyme'];
        $_SESSION['membre']['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

        $reussiteInscription = MembreDAO::enregistrerMembre($_SESSION['membre'], $_SESSION['membre']['avatar']);

        if ($reussiteInscription) {
            header('location: ../membre.php');
        }
    }
}
