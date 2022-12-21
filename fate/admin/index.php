<?php
require "../configuration.php";
include "basededonnees.php";
require CHEMIN_ACCESSEUR . "ClicDAO.php";
require CHEMIN_ACCESSEUR . "ServantDAO.php";

$listeClass = ServantDAO::listerClassParAtk();
ClicDAO::enregistrerVisite($_SERVER);

$listeParJour = ClicDAO::listerStatsParJour();
$listerParLangue = ClicDAO::listerStatsParLangue();

$MESSAGE_SQL_FACE_SERVANT = "SELECT `face`, `name` FROM `servant` ORDER BY RAND() LIMIT 1";

$requeteFaceServants = $basededonnees->prepare($MESSAGE_SQL_FACE_SERVANT);
$requeteFaceServants->execute();
$face = $requeteFaceServants->fetch();

$joursDeLaSemaine = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$MESSAGE_SQL_LISTE_SERVANT = "SELECT `idServant`,`name`,`aka`,`class`,`description`, `face` FROM `servant`";

$requeteListeServants = $basededonnees->prepare($MESSAGE_SQL_LISTE_SERVANT);
$requeteListeServants->execute();
$listeServants = $requeteListeServants->fetchAll();

$pageActive = "listeServant";
require 'header.php';
?>

<div class="bg-black container px-5 my-5 text-center text-white" style="--bs-bg-opacity: .7">

        <h1 class="px-3 pt-3">Dashboard</h1>

        <div class="row">

            <div class="col my-3">
                <div class="card text-center p-4">
                    <h2 class="text-dark font-weight-bold p-2 mb-1">Contenu</h2>
                        <div class="chart-container mb-3">
                            <canvas id="pieCanvas2"></canvas>
                        </div>
                    <a href="contenu.php" class="btn btn-success">Contenu</a>
                </div>
            </div>

            <div class="col my-3">
                <div class="card text-center p-4">
                    <h2 class="text-dark font-weight-bold p-2 mb-3">Servant du jour : <strong class="text-warning"><?=$face['name']?></strong></h2>
                        <div class="container">
                            <img src="<?=$face['face']?>" alt="">
                        </div>
                </div>
            </div>

            <div class="col my-3">
                <div class="card text-center p-4">
                    <h2 class="text-dark font-weight-bold p-2 mb-1">Visite : jours</h2>
                        <div class="chart-container mb-3">
                            <canvas id="lineChart"></canvas>
                        </div>
                    <a href="visite.php" class="btn btn-success">Visite</a>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col my-3">
                <div class="card text-center p-4">
                        <h2 class="text-dark font-weight-bold p-2 mb-1">Gestion des servants</h2>
                        <div class="container mb-3">
                            <img src="../images/Capture.JPG" class="responsive w-100" alt="">
                        </div>
                    <a href="list-servant.php" class="btn btn-success">Editer les servants</a>
                </div>
            </div>

            <div class="col my-3">
                <div class="card text-center p-4">
                    <h2 class="text-dark font-weight-bold p-2 mb-1">Visite : langues</h2>
                        <div class="chart-container mb-3">
                            <canvas id="lineChart2"></canvas>
                        </div>
                    <a href="visite.php" class="btn btn-success">Visite</a>
                </div>
            </div>

            <div class="col my-3">
                <div class="card text-center p-4">
                    <h2 class="text-dark font-weight-bold p-2 mb-5">Wiggle Wiggle</h2>
                        <div class="container mb-3">
                            <img src="https://thumbs.gfycat.com/CloseGrimHedgehog-size_restricted.gif
" class="responsive w-100" alt="">
                        </div>
                </div>
            </div>


        </div>
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
</script>

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
    </script>

    <script src="js/script-visite.js"></script>

<script src="js/script-contenu.js">
</script>

<?php
require 'footer.php';
?>

