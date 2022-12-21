<?php
require '../configuration.php';
require 'header.php';
?>
<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .7">
        <div class="mb-3 text-center text-white" style="max-width: 300px;">
            <h2>Create Member - identification (1/2)</h2>
        </div>

        <span id="error" class="text-danger">
            <?php if (!empty($_SESSION['erreur'])) {
    echo $_SESSION['erreur'];
    unset($_SESSION['erreur']);
}
?>
        </span>
    <form action="inscription-informations.php" method="post" enctype="multipart/form-data">
        <div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="prenom">Prenom: </label>
                <input type="text" name="prenom" id="prenom"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="nom">Nom: </label>
                <input type="text" name="nom" id="nom"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="courriel">Courriel: </label>
                <input type="text" name="courriel" id="courriel"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="col-form-label text-white" for="avatar">Avatar: </label>
                <input type="file" name="avatar" id="avatar"><br>
            </div>

            <input class="card mb-3 text-center p-2" type="submit" name="inscription-identification" value="Next"><br>
        </div>
    </form>
</div>
<?php
require '../footer.php'
?>
