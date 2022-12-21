<?php
require_once '../configuration.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" href="C:\xampp\htdocs\fate\images\icon\favicon.ico"> -->
  <!-- CSS only -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style/fate.css">
  <title>Fate Grand Order</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navigation -->
    <div class="fixed-top">

      <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
        <div class="container">
          <a class="navbar-brand text-white" style="text-transform: uppercase;"> FATE GRAND ORDER </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ms-auto">

              <li class="nav-item">
                <a class="nav-link" href="index.php">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="list-servant.php">Edit Servant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../advanced-search.php">Advanced Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../membre.php">Member</a>
              </li>

            </ul>

            <div class="ps-5 justify-content-center" id="quick-search">
              <form action="quick-search.php" method="get">
                  <input type="text" name="word" placeholder="Search">
                  <input type="submit" value="OK">
              </form>
            </div>

          </div>
                      <div class="collapse navbar-collapse justify-content-end">
                  <?php
if (isset($_SESSION['membre']['pseudonyme']) && !empty($_SESSION['membre']['pseudonyme'])) {
    ?>
        <span class="text-white">
            Hi <?=$_SESSION['membre']['pseudonyme']?>
            <img src="../images/<?=$_SESSION['membre']['avatar']?>" class="image ms-1" alt="avatar" width="40">
        </span>
        <?php
}
?>
            </div>
        </div>
      </nav>

    </div>
