<?php
require "configuration.php";
require CHEMIN_ACCESSEUR . "ServantDAO.php";

if (!empty($_GET['word'])) {
    $word = filter_var($_GET['word'], FILTER_SANITIZE_SPECIAL_CHARS);
    $results = ServantDAO::quickSearch($word);
}

require 'header.php';
if (sizeof($results) != 0) {
    ?>

<div class="bg-dark container px-5 mt-5" style="--bs-bg-opacity: .8">
    <h1 class="text-white px-5 pt-3">Filtered Servant List using : <?=$word?></h1>
    <div class="row row-cols-lg-2">

        <?php
foreach ($results as $result) {
        ?>
      <div class="col my-4 ">
        <div class="card p-3">
            <div class="d-flex flex-row mb-3">
                <img src="<?=$result['face']?>" class="img-fluid rounded-start border border-dark border-4" alt="face" width="120">
                <div class="d-flex flex-column ms-2">
                    <h3 class="font-weight-bold"><?=$result['name']?></h3>
                    <h5 class="text-black-50">AKA : <?=$result['aka']?></h5>
                    <h5 class="aka text-body">Class : <?=$result['class']?></h5>
                </div>
            </div>
            <span class="text-body"><?=$result['description']?></span>
            <div class="d-flex justify-content-between install mt-3">
                <a href="servant.php?idServant=<?=$result['idServant']?>" class="stretched-link"></a>
            </div>
        </div>
      </div>

      <?php
}
    ?>
    </div>
</div>
<?php

} else {
    ?>
    <div class="bg-dark container h-100 mt-5" style="--bs-bg-opacity: .8">
    <div class="row">
        <h1 class="text-white px-5 pt-3">You searched a servant using the word : <strong><?=$word?></strong></h1>
      <div class="col my-4 ">
        <div class="card mb-3" style="max-width: 1100px;">
            <div class="row g-0">
                <div class="col-md-4 p-3">
                <img src="https://w0.peakpx.com/wallpaper/823/178/HD-wallpaper-cool-cat-glasses-animal-apple-fun-funny-glass-happy-pet.jpg
" class="img-fluid rounded-start border border-dark border-4" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title">Cat of the 404</h1>
                    <h3 class="text-black-50">You've been trolled</h3><br><br>
                    <h5>A...A...A...test...test<br>
                    Oh you can read this?<br> Looks like the word you used is not in our servant list.<br>
                    I'm sorry, do you know how long it took me to write all those servants manually on phpmyadmin ?

                    <br><br>
                    Hey Bruno, How are you doing ? <br>Yeah "<strong class="text-danger"><?=$word?></strong>" didn't work, try using a class name,
                    you should find at least one servant ;) !
                    <br><br>
                    .-. . .- .-.. .-.. -.-- -.-.-- ..--.. / -.-- --- ..- .----. .-. . / .... .- ...- .. -. --. / ..-. ..- -. / -.. --- -. .----. - / -.-- --- ..- ..--.. / .-- . .-.. .-.. / .. ..-. / -.-- --- ..- / .-. . .- -.. / - .... .. ... / -- . ... ... .- --. . .-.-.- .-.-.- .-.-.- / .... --- .--. . / -.-- --- ..- / .... .- ...- . / .- / .-- --- -. -.. . .-. ..-. ..- .-.. / -- --- .-. -. .. -. --. / .- ..-. - . .-. -. --- --- -. / . ...- . -. .. -. --. / -.-.--
                    </h5>
                    <a class="text-success stretched-link" href="list-servant.php">Return to list</a>
                </div>
                </div>
            </div>
            </div>
      </div>
    </div>
</div>
      <?php
}
?>

<?php
require 'footer.php';
?>