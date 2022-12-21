<?php
include "basededonnees.php";
$idServant = filter_var($_GET['idServant'], FILTER_SANITIZE_NUMBER_INT);

$SQL_SERVANT = "SELECT * FROM servant WHERE idServant = :idServant";

$requeteServant = $basededonnees->prepare($SQL_SERVANT);
$requeteServant->bindParam(':idServant', $idServant, PDO::PARAM_INT);
$requeteServant->execute();
$servant = $requeteServant->fetch();

require 'header.php';
?>

<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .7">
        <section id="content">
            <div class="card mb-3 text-center" style="max-width: 300px;">
                <h2>Update Servant</h2>
            </div>

                <form action="process-update-servant.php" method="post" enctype="multipart/form-data">
                    <div>
                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="name">Name: </label>
                            <input type="text" name="name" id="name" value="<?=$servant['name']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="aka">AKA: </label>
                            <input type="text" name="aka" id="aka" value="<?=$servant['aka']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="class">Class: </label>
                            <input type="text" name="class" id="class" value="<?=$servant['class']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="description">Description: </label>
                            <textarea name="description" id="description" cols="30" rows="10"><?=$servant['description']?></textarea>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="attribute">Attribute: </label>
                            <input type="text" name="attribute" id="attribute" value="<?=$servant['attribute']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="atk">ATK: </label>
                            <input type="number" name="atk" id="atk" value="<?=$servant['atk']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="hp">HP: </label>
                            <input type="number" name="hp" id="hp" value="<?=$servant['hp']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="illustrator">Illustrator: </label>
                            <input type="text" name="illustrator" id="illustrator" value="<?=$servant['illustrator']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="alignement">Alignement: </label>
                            <input type="text" name="alignement" id="alignement" value="<?=$servant['alignement']?>"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="lore">Lore : </label>
                            <textarea name="lore" id="lore" cols="30" rows="10"><?=$servant['lore']?></textarea>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="face">Face: </label>
                            <input type="file" name="face" id="face"><br>
                        </div>

                        <div class="champs form-outline mb-4">
                            <label class="col-form-label text-white" for="image">Image: </label>
                            <input type="file" name="image" id="image"><br>
                        </div>

                        <input class="card mb-3 text-center p-2" type="submit" value="Save"><br>
                        <input type="hidden" name="idServant" value="<?=$servant['idServant']?>">
                    </div>
                </form>

        </section>
</div>
<?php
require 'footer.php';
?>
