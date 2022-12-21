<?php
require '../configuration.php';
require 'header.php';

?>
<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .7">
        <div class="mb-3 text-center text-white" style="max-width: 300px;">
            <h2>Edit your account</h2>
        </div>

                <span id="error" class="text-danger">
            <?php if (!empty($_SESSION['erreur3'])) {
    echo $_SESSION['erreur3'];
    unset($_SESSION['erreur3']);
}
?>
        </span>


    <form action="traitement-edition-membre.php" method="POST" enctype="multipart/form-data">
        <div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="courriel">Courriel: </label>
                <input type="text" name="courriel" id="courriel"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="avatar">Avatar: </label>
                <input type="file" name="avatar" id="avatar"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="motdepasse">Nouveau mot de passe: </label>
                <input type="password" name="motdepasse" id="motdepasse"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="motdepasse2">Vérification du mot de passe: </label>
                <input type="password" name="motdepasse2" id="motdepasse2"><br>
            </div>

            <input class="card mb-3 text-center p-2" type="submit" name="membre-modification" value="Edit"><br>
            <input type="hidden" name="pseudonyme" value='<?=$membre['pseudonyme']?>'>
        </div>
    </form>
</div>
