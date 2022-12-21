<?php
require '../configuration.php';

if (isset($_POST['inscription-identification'])) {
    if (empty($_POST['prenom']) || empty($_POST['nom'])) {
        $_SESSION['erreur'] = "Veuillez renseigner tous les champs";
        header("location: inscription-identification.php");
    } elseif (empty($_POST['courriel']) || !filter_var($_POST['courriel'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['erreur'] = "Courriel invalide";
        header("location: inscription-identification.php");
    } else {
        require CHEMIN_ACCESSEUR . "MembreDAO.php";
        $membre = MembreDAO::trouverCourriel($_POST['courriel']);

        if ($membre) {
            $_SESSION['erreur'] = "Ce courriel est déjà utilisé";
            header("location: inscription-identification.php");
        }

        $avatar = addslashes($_FILES['avatar']['name']);
        $imageRepository = "../images/";
        $fileDestination1 = $imageRepository . basename($face = addslashes($_FILES['avatar']['name']));
        $sourceFile1 = $_FILES['avatar']['tmp_name'];
        $extensionFile1 = strtolower(pathinfo($fileDestination1, PATHINFO_EXTENSION));

        if ($_FILES['avatar']['size'] > 500000) {
            $_SESSION['erreur'] = "l'image est trop volumineuse";
            header("location: inscription-identification.php");
        } else if ($extensionFile1 != "jpg" && $extensionFile1 != "jpeg" && $extensionFile1 != "png" && $extensionFile1 != "svg" && $extensionFile1 != "") {
            $_SESSION['erreur'] = "veuillez ajoutez un format d'image valide";
            header("location: inscription-identification.php");

        } else {

            if (move_uploaded_file($sourceFile1, $fileDestination1) || $extensionFile1 == "") {

                if (!empty($_POST['inscription-identification'])) {
                    $filtreMembre = array(
                        'prenom' => FILTER_SANITIZE_SPECIAL_CHARS,
                        'nom' => FILTER_SANITIZE_SPECIAL_CHARS,
                        'courriel' => FILTER_SANITIZE_EMAIL,
                    );

                    $_SESSION['membre'] = filter_var_array($_POST, $filtreMembre);
                    $_SESSION['membre']['avatar'] = $avatar;

                }

            } else {
                $_SESSION['erreur'] = "Failed somehow";
                header("location: inscription-identification.php");
            }
        }
    }
}
require 'header.php';

?>


<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .7">
        <div class="mb-3 text-center text-white" style="max-width: 300px;">
            <h2>Create Member - informations (2/2)</h2>
        </div>
        <span id="error2" class="text-danger">
            <?php if (!empty($_SESSION['erreur2'])) {
    echo $_SESSION['erreur2'];
    unset($_SESSION['erreur2']);
}
?>
        </span>
    <form action="traitement-inscription.php" method="post">
        <div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="pseudonyme">Pseudonyme: </label>
                <input type="text" name="pseudonyme" id="pseudonyme"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="motdepasse">Mot de passe: </label>
                <input type="password" name="motdepasse" id="motdepasse"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="motdepasse2">Vérification du mot de passe: </label>
                <input type="password" name="motdepasse2" id="motdepasse2"><br>
            </div>

            <input class="card mb-3 text-center p-2" type="submit" name="inscription-informations" value="Register"><br>
        </div>
    </form>
</div>

<?php
require '../footer.php'
?>
