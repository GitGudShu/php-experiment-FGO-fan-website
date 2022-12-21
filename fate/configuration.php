<?php
session_start();

$addresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$estSurServeurTim = strpos($addresseCourante, 'tiweb.cgmatane.qc.ca') !== false ? true : false;

if ($estSurServeurTim) {
    define("CHEMIN_ACCESSEUR", $_SERVER["DOCUMENT_ROOT"] . "/etudiants/2022/chut/fate/accesseurs/");
} else {
    define("CHEMIN_ACCESSEUR", $_SERVER["DOCUMENT_ROOT"] . "/fate/accesseurs/");

}
