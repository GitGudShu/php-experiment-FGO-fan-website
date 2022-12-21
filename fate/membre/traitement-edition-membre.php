<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "MembreDAO.php";

if (isset($_POST['membre-modification'])) {

    if (empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse2']) {
        $_SESSION['erreur3'] = "Vos mots de passe doivent être identiques";
        header("location: modifier-compte.php");
    } else {
        header("location: ../membre.php");
    }

    $avatar = addslashes($_FILES['avatar']['name']);

    $filtreMembre = array();
    $filtreMembre['courriel'] = FILTER_SANITIZE_SPECIAL_CHARS;
    $filtreMembre['motdepasse'] = FILTER_SANITIZE_ENCODED;
    $filtreMembre['motdepasse2'] = FILTER_SANITIZE_ENCODED;

    $securite = filter_input_array(INPUT_POST, $filtreMembre);

    $_SESSION['membre']['motdepasse'] = $securite['motdepasse'];

    $securite['motdepasse'] = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);

    $imageRepository = "../images/";
    $fileDestination1 = $imageRepository . basename($face = addslashes($_FILES['avatar']['name']));
    $sourceFile1 = $_FILES['avatar']['tmp_name'];
    $extensionFile1 = strtolower(pathinfo($fileDestination1, PATHINFO_EXTENSION));

    if ($_FILES['avatar']['size'] > 500000) {
        echo ("l'image est trop volumineuse");
    } else if ($extensionFile1 != "jpg" && $extensionFile1 != "jpeg" && $extensionFile1 != "png" && $extensionFile1 != "svg" && $extensionFile1 != "") {
        echo ("veuillez ajoutez un format d'image valide");
    } else {

        if (move_uploaded_file($sourceFile1, $fileDestination1) || $extensionFile1 == "") {

            $_SESSION['membre']['avatar'] = $avatar;
            $update = MembreDAO::editerMembre($securite, $avatar, $_SESSION['membre']['pseudonyme']);

            if ($update) {
                echo "Account successfuly updated";
            }
        } else {
            echo "Failed";
        }
    }

}
