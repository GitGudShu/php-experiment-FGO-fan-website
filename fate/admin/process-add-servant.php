<?php
require "../configuration.php";
require CHEMIN_ACCESSEUR . "ServantDAO.php";

$face = addslashes($_FILES['face']['name']);
$image = addslashes($_FILES['image']['name']);

$FILTRES_SERVANT = array(
    'name' => FILTER_SANITIZE_SPECIAL_CHARS,
    'aka' => FILTER_SANITIZE_SPECIAL_CHARS,
    'class' => FILTER_SANITIZE_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_SPECIAL_CHARS,
    'attribute' => FILTER_SANITIZE_SPECIAL_CHARS,
    'atk' => FILTER_SANITIZE_NUMBER_INT,
    'hp' => FILTER_SANITIZE_NUMBER_INT,
    'illustrator' => FILTER_SANITIZE_SPECIAL_CHARS,
    'alignement' => FILTER_SANITIZE_SPECIAL_CHARS,
    'lore' => FILTER_SANITIZE_SPECIAL_CHARS,
);

$servant = filter_input_array(INPUT_POST, $FILTRES_SERVANT);
$servant['name'] = addslashes($servant['name']);
$servant['aka'] = addslashes($servant['aka']);
$servant['class'] = addslashes($servant['class']);
$servant['description'] = addslashes($servant['description']);
$servant['attribute'] = addslashes($servant['attribute']);
$servant['illustrator'] = addslashes($servant['illustrator']);
$servant['alignement'] = addslashes($servant['alignement']);
$servant['lore'] = addslashes($servant['lore']);

$imageRepository = "../images/";
$fileDestination1 = $imageRepository . basename($face = addslashes($_FILES['face']['name']));
$sourceFile1 = $_FILES['face']['tmp_name'];
$extensionFile1 = strtolower(pathinfo($fileDestination1, PATHINFO_EXTENSION));

$fileDestination2 = $imageRepository . basename($image = addslashes($_FILES['image']['name']));
$sourceFile2 = $_FILES['image']['tmp_name'];
$extensionFile2 = strtolower(pathinfo($fileDestination2, PATHINFO_EXTENSION));

if ($_FILES['face']['size'] > 500000 || $_FILES['image']['size'] > 500000) {
    echo ("l'image est trop volumineuse");
} else if ($extensionFile1 != "jpg" && $extensionFile1 != "jpeg" && $extensionFile1 != "png" && $extensionFile1 != "svg" && $extensionFile1 != ""
    || $extensionFile2 != "jpg" && $extensionFile2 != "jpeg" && $extensionFile2 != "png" && $extensionFile2 != "svg" && $extensionFile2 != "") {
    echo ("veuillez ajoutez un format d'image valide");
} else {

    if (move_uploaded_file($sourceFile1, $fileDestination1) && move_uploaded_file($sourceFile2, $fileDestination2) || $extensionFile1 == "" || $extensionFile2 == "") {

        $addSuccessful = ServantDAO::addServant($servant, $face, $image);

        if ($addSuccessful) {
            echo "Your servant was added to the database";
        }
    } else {
        echo "Failed";
    }
}
?>
<br>
<a href="index.php" class="stretched-link"> Go back</a>
