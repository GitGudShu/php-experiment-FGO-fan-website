<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class ClicDAO
{
    public static function enregistrerVisite($donnees)
    {
        $MESSAGE_ENREGISTRER_VISITE = "INSERT INTO clic (ip, page, parametres, langue, moment, reference)
                                       VALUES (:ip, :page, :parametres, :langue, NOW(), :reference)";
        $requeteVisite = BaseDeDonnees::getConnexion()->prepare($MESSAGE_ENREGISTRER_VISITE);
        $requeteVisite->bindParam(':ip', $donnees["REMOTE_ADDR"], PDO::PARAM_STR);
        $requeteVisite->bindParam(':page', $donnees["PHP_SELF"], PDO::PARAM_STR);
        $requeteVisite->bindParam(':parametres', $donnees["QUERY_STRING"], PDO::PARAM_STR);
        $requeteVisite->bindParam(':langue', $donnees["HTTP_ACCEPT_LANGUAGE"], PDO::PARAM_STR);
        $requeteVisite->bindParam(':reference', $donnees["HTTP_REFERER"], PDO::PARAM_STR);
        $requeteVisite->execute();
    }

    public static function listerStatsParJour()
    {
        $MESSAGE_STATS_PAR_JOUR = "SELECT DAYOFWEEK(moment) AS jour
                                , COUNT(id_clic) AS clics
                                , COUNT(DISTINCT ip) AS visites
                                FROM clic
                                GROUP BY jour
                                ";
        $requeteStats = BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_PAR_JOUR);
        $requeteStats->execute();
        $statsParJour = $requeteStats->fetchAll();

        return $statsParJour;
    }

    public static function listerStatsParLangue()
    {
        $MESSAGE_STATS_PAR_LANGUE = "SELECT langue
                                , COUNT(id_clic) AS clics
                                , COUNT(DISTINCT ip) AS visites
                                FROM clic
                                GROUP BY langue
                                ";
        $requeteStats = BaseDeDonnees::getConnexion()->prepare($MESSAGE_STATS_PAR_LANGUE);
        $requeteStats->execute();
        $statsParLangue = $requeteStats->fetchAll();

        return $statsParLangue;
    }
}
