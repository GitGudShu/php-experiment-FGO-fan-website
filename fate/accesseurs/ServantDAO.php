<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class ServantDAO
{

    public static function listerServants()
    {
        $MESSAGE_SQL_LISTE_SERVANT = "SELECT `idServant`,`name`,`aka`,`class`,`description`, `face` FROM `servant`";
        $requeteListeServants = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_LISTE_SERVANT);
        $requeteListeServants->execute();
        $listeServants = $requeteListeServants->fetchAll();

        return $listeServants;
    }

    public static function lireServant($idServant)
    {
        $MESSAGE_SQL_SERVANT = "SELECT * FROM servant WHERE idServant = :idServant";

        $requeteServant = BaseDeDonnees::getConnexion()->prepare($MESSAGE_SQL_SERVANT);
        $requeteServant->bindParam(':idServant', $idServant, PDO::PARAM_INT);
        $requeteServant->execute();
        $servant = $requeteServant->fetch();

        return $servant;
    }

    public static function quickSearch($word)
    {
        $word = '%' . $word . '%';
        $QUICK_SEARCH = "SELECT `idServant`,`name`,`aka`,`class`,`description`, `face` FROM `servant`
                        WHERE `name` LIKE :word
                        OR `class` LIKE :word
                        OR `aka` LIKE :word";
        print($QUICK_SEARCH);

        $requeteQuickSearch = BaseDeDonnees::getConnexion()->prepare($QUICK_SEARCH);
        $requeteQuickSearch->bindParam(':word', $word, PDO::PARAM_STR);
        $requeteQuickSearch->execute();
        $results = $requeteQuickSearch->fetchAll();

        return $results;
    }

    public static function addServant($servant, $face, $image)
    {
        $SQL_ADD_SERVANT = "INSERT INTO servant(name, aka, class, description, attribute, atk, hp, illustrator, alignement, lore, face, image)
                    VALUES(:name
                         , :aka
                         , :class
                         , :description
                         , :attribute
                         , :atk
                         , :hp
                         , :illustrator
                         , :alignement
                         , :lore
                         , 'images/" . $face . "'
                         , 'images/" . $image . "'
                         )";

        $requestAddServant = BaseDeDonnees::getConnexion()->prepare($SQL_ADD_SERVANT);
        $requestAddServant->bindParam(':name', $servant['name'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':aka', $servant['aka'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':class', $servant['class'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':description', $servant['description'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':attribute', $servant['attribute'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':atk', $servant['atk'], PDO::PARAM_INT);
        $requestAddServant->bindParam(':hp', $servant['hp'], PDO::PARAM_INT);
        $requestAddServant->bindParam(':illustrator', $servant['illustrator'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':alignement', $servant['alignement'], PDO::PARAM_STR);
        $requestAddServant->bindParam(':lore', $servant['lore'], PDO::PARAM_STR);

        $addSuccessful = $requestAddServant->execute();

        return $addSuccessful;
    }

    public static function deleteServant($idServant)
    {
        $SQL_DELETE_SERVANT = "DELETE FROM servant WHERE idServant = :idServant";

        $requestDeleteServant = BaseDeDonnees::getConnexion()->prepare($SQL_DELETE_SERVANT);
        $requestDeleteServant->bindParam(':idServant', $idServant, PDO::PARAM_INT);
        $deleteSuccesful = $requestDeleteServant->execute();

        return $deleteSuccesful;
    }

    public static function updateServant($servant, $face, $image)
    {
        $SQL_UPDATE_SERVANT = "UPDATE servant SET name = :name
                                        , aka = :aka
                                        , class = :class
                                        , description = :description
                                        , attribute = :attribute
                                        , atk = :atk
                                        , hp = :hp
                                        , illustrator = :illustrator
                                        , alignement = :alignement
                                        , lore = :lore
                                        , face = 'images/" . $face . "'
                                        , image = 'images/" . $image . "'
                                        WHERE idServant = :idServant
                                        ";

        $requestUpdateServant = BaseDeDonnees::getConnexion()->prepare($SQL_UPDATE_SERVANT);
        $requestUpdateServant->bindParam(':idServant', $servant['idServant'], PDO::PARAM_INT);
        $requestUpdateServant->bindParam(':name', $servant['name'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':aka', $servant['aka'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':class', $servant['class'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':description', $servant['description'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':attribute', $servant['attribute'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':atk', $servant['atk'], PDO::PARAM_INT);
        $requestUpdateServant->bindParam(':hp', $servant['hp'], PDO::PARAM_INT);
        $requestUpdateServant->bindParam(':illustrator', $servant['illustrator'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':alignement', $servant['alignement'], PDO::PARAM_STR);
        $requestUpdateServant->bindParam(':lore', $servant['lore'], PDO::PARAM_STR);

        $updateSuccesful = $requestUpdateServant->execute();

        return $updateSuccesful;
    }

    public static function advancedSearch($searchName, $searchAka, $searchClass, $searchIllustrator)
    {
        $SQL_ADVANCED_SEARCH = "SELECT * FROM servant WHERE 1 = 1";

        if (!empty($searchName)) {
            $searchName = '%' . $searchName . '%';
            $SQL_ADVANCED_SEARCH = $SQL_ADVANCED_SEARCH . " AND name LIKE :name";
        }
        if (!empty($searchAka)) {
            $searchAka = '%' . $searchAka . '%';
            $SQL_ADVANCED_SEARCH = $SQL_ADVANCED_SEARCH . " AND aka LIKE :aka";
        }
        if (!empty($searchClass)) {
            $searchClass = '%' . $searchClass . '%';
            $SQL_ADVANCED_SEARCH = $SQL_ADVANCED_SEARCH . " AND class LIKE :class";
        }
        if (!empty($searchIllustrator)) {
            $searchIllustrator = '%' . $searchIllustrator . '%';
            $SQL_ADVANCED_SEARCH = $SQL_ADVANCED_SEARCH . " AND illustrator LIKE :illustrator";
        }

        $requeteSearch = BaseDeDonnees::getConnexion()->prepare($SQL_ADVANCED_SEARCH);
        if (!empty($searchName)) {
            $requeteSearch->bindParam(':name', $searchName, PDO::PARAM_STR);
        }

        if (!empty($searchAka)) {
            $requeteSearch->bindParam(':aka', $searchAka, PDO::PARAM_STR);
        }

        if (!empty($searchClass)) {
            $requeteSearch->bindParam(':class', $searchClass, PDO::PARAM_STR);
        }

        if (!empty($searchIllustrator)) {
            $requeteSearch->bindParam(':illustrator', $searchIllustrator, PDO::PARAM_STR);
        }

        $requeteSearch->execute();
        $results = $requeteSearch->fetchAll();

        return $results;
    }

    public static function listerClassParAtk()
    {
        $MESSAGE_LISTER_CLASS = "SELECT class
                                , COUNT(*) AS nombre
                                , ROUND(AVG(atk),2) AS atk_moyenne
                                , SUM(atk) AS atk_totales
                                , MAX(atk) AS atk_maximum
                                , MIN(atk) AS atk_minimum
                                FROM servant
                                GROUP BY class
                                ";
        $requeteClass = BaseDeDonnees::getConnexion()->prepare($MESSAGE_LISTER_CLASS);
        $requeteClass->execute();
        $classes = $requeteClass->fetchAll();

        return $classes;
    }

    public static function analyserServant()
    {
        $ANALYSER_SERVANT = "SELECT COUNT(*) AS nb_servant
                                , ROUND(AVG(atk),1) AS atk_avg
                                , ROUND(AVG(hp),1) AS hp_avg
                                , ROUND(STDDEV(atk),1) AS atk_std
                                , ROUND(STDDEV(hp),1) AS hp_std
                                FROM servant
                                ";
        $requeteAnalyse = BaseDeDonnees::getConnexion()->prepare($ANALYSER_SERVANT);
        $requeteAnalyse->execute();
        $analyse = $requeteAnalyse->fetchAll();

        return $analyse;
    }
}
