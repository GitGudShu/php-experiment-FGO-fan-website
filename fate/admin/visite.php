<?php
include "../configuration.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
$listeParJour = ClicDAO::listerStatsParJour();
$listerParLangue = ClicDAO::listerStatsParLangue();

$joursDeLaSemaine = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

require 'header.php';
?>

<div class="bg-black container px-5 mt-5 py-3" style="--bs-bg-opacity: .9">

    <table class="table table-dark table-striped">
        <caption class="text-warning h4">Tableau statistique par jour de la semaine</caption>
        <tr class="tr-head">
            <th>Jour</th>
            <th>Clics</th>
            <th>Visites totales</th>
        </tr>

         <?php
foreach ($listeParJour as $jourEnregistre) {
    ?>
            <tr>
                <th><?=$joursDeLaSemaine[$jourEnregistre['jour'] - 1]?></th>
                <th><?=$jourEnregistre['clics']?></th>
                <th><?=$jourEnregistre['visites']?></th>
            </tr>

            <?php
}
?>


    </table>

    <table class="table table-dark table-striped">
        <caption class="text-warning h4">Tableau statistique par langue</caption>
        <tr class="tr-head">
            <th>Langues</th>
            <th>Clics</th>
            <th>Visites totales</th>
        </tr>

         <?php
foreach ($listerParLangue as $langueEnregistre) {
    ?>
            <tr>
                <th><?=$langueEnregistre['langue']?></th>
                <th><?=$langueEnregistre['clics']?></th>
                <th><?=$langueEnregistre['visites']?></th>
            </tr>

            <?php
}
?>
    </table>

    <!-- CANVAS -->
<div class="chart-container" style="width:40vw; margin: 50px auto;">
    <canvas id="lineChart"></canvas>
    <br><br>
    <canvas id="lineChart2"></canvas>
</div>

    <!-- Graphique ligne -->
    <script>
        <?php
foreach ($listeParJour as $jour) {
    $nombreParJour[] = $jour['visites'];
    $clicsParJour[] = $jour['clics'];
    $listeDejour[] = $joursDeLaSemaine[$jour['jour'] - 1];
}

foreach ($listerParLangue as $langue) {
    $visitesParLangues[] = $langue['visites'];
    $clicsParLangues[] = $langue['clics'];
    $listeDeLangues[] = $langue['langue'];
}
?>

    let labelLine = <?=json_encode($listeDejour)?>;
    let dataLine = <?=json_encode($nombreParJour)?>;
    let dataLine2 = <?=json_encode($clicsParJour)?>;

    let labelLine1 = <?=json_encode($listeDeLangues)?>;
    let dataLine3 = <?=json_encode($visitesParLangues)?>;
    let dataLine4 = <?=json_encode($clicsParLangues)?>;

    Chart.defaults.color = "#ffffff";
    Chart.defaults.borderColor = "#ffffff";
    Chart.defaults.font.size = 15;
    </script>

    <script src="js/script-visite.js"></script>

</div>



<?php
require "footer.php";
