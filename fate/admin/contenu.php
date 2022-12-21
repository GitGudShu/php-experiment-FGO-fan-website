<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "ServantDAO.php";
$listeClass = ServantDAO::listerClassParAtk();
$analysis = ServantDAO::analyserServant();

require 'header.php';
?>

<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .9">

    <table class="table table-dark table-striped ">
        <caption class="text-warning h4">Tableau statistique sur l'attaque de tous les servants groupées par class</caption>
        <tr class="tr-head">
            <th>Class</th>
            <th>Nombre</th>
            <th>ATK totale</th>
            <th>ATK maximale</th>
            <th>ATK minimale</th>
            <th>ATK moyenne</th>
        </tr>

        <?php
foreach ($listeClass as $class) {
    ?>
            <tr>
                <th><?=$class['class']?></th>
                <th><?=$class['nombre']?></th>
                <th><?=$class['atk_totales']?></th>
                <th><?=$class['atk_maximum']?></th>
                <th><?=$class['atk_minimum']?></th>
                <th><?=$class['atk_moyenne']?></th>
            </tr>

            <?php
}
?>
<br>

    </table>

    <table class="table table-dark table-striped table-bordered border-white">
        <caption class="text-warning h4">Moyennes et ecart-types sur les stats des servants</caption>
        <tr class="tr-head">
            <th>Nombre de servants</th>
            <th>ATK Moyenne</th>
            <th>HP Moyenne</th>
            <th>Ecart type : ATK</th>
            <th>Ecart type : HP</th>
        </tr>

        <?php
foreach ($analysis as $i) {
    ?>
            <tr>
                <th><?=$i['nb_servant']?></th>
                <th><?=$i['atk_avg']?></th>
                <th><?=$i['hp_avg']?></th>
                <th><?=$i['atk_std']?></th>
                <th><?=$i['hp_std']?></th>
            </tr>

            <?php
}
?>


    </table>

<!-- CANVAS -->
<div class="chart-container" style="width:40vw; margin: 50px auto;">
    <canvas id="pieCanvas"></canvas>
</div>

<?php
foreach ($listeClass as $class) {
    $classes[] = $class['class'];
    $nombreParCategorie[] = $class['nombre'];
}

?>

<script>
    let labelPie = <?=json_encode($classes)?>;
    let dataPie = <?=json_encode($nombreParCategorie)?>;
    Chart.defaults.font.size = 25;
    Chart.defaults.color = "#ffffff";
</script>
<script src="js/script-contenu.js"></script>
    </div>


<?php
require "footer.php";
