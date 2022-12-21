<?php
class BaseDeDonnees
{
    public static function getConnexion()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $adresseCourante = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $estSurServeurTiweb = strpos($adresseCourante, 'tiweb.cgmatane.qc.ca') !== false ? true : false;

        if ($estSurServeurTiweb) {
            $utilisateur = 'tiweb_chut';
            $motdepasse = 'k8NHo6Du2y';
            $hote = 'localhost';
            $base = 'tiweb_chut';
        } else {
            $utilisateur = 'root';
            $motdepasse = '';
            $hote = 'localhost';
            $base = 'fate';
        }

        $dsn = 'mysql:dbname=' . $base . ';host=' . $hote;

        // On essaie de se connecter
        // l'objet $basededonnees sera avec lequel que nous allons pouvoir travailler avec la base de données
        $basededonnees = new PDO($dsn, $utilisateur, $motdepasse);

        // On définit le mode d'erreur de PDO sur Exception
        $basededonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Définir l'encodage pour empêcher les problèmes d'affichage
        $basededonnees->exec('SET CHARACTER SET UTF8');
        //echo "Connexion réussie";

        return $basededonnees;

    }
}
