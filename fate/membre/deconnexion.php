<?php
require "../configuration.php";

if (isset($_SESSION['membre']['pseudonyme'])) {
    // Destruction des variables de la session
    session_unset();
    // Destruction de la session
    session_destroy();

    header('location: ../membre.php');
} else {
    echo "You are not logged in";
}
