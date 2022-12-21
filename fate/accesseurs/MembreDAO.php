<?php
require_once CHEMIN_ACCESSEUR . "BaseDeDonnees.php";

class MembreDAO
{
    public static function trouverMembre($membre)
    {
        $SQL_AUTHENTIFICATION = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteAuthentification = BaseDeDonnees::getConnexion()->prepare($SQL_AUTHENTIFICATION);
        $requeteAuthentification->bindParam(':pseudonyme', $membre['pseudonyme'], PDO::PARAM_STR);
        $requeteAuthentification->execute();
        $membreTrouve = $requeteAuthentification->fetch();

        return $membreTrouve;
    }

    public static function trouverCourriel($user)
    {
        $TROUVER_COURRIEL = "SELECT id_membre FROM membre WHERE courriel = :courriel";
        $requete = BaseDeDonnees::getConnexion()->prepare($TROUVER_COURRIEL);
        $requete->bindParam(':courriel', $user, PDO::PARAM_STR);
        $requete->execute();
        $courrielTrouve = $requete->fetch();

        return $courrielTrouve;
    }

    public static function editerMembre($securite, $avatar, $pseudonyme)
    {
        $SQL_UPDATE = "UPDATE membre
                                 SET motdepasse = :motdepasse, courriel = :courriel, avatar = :avatar
                                 WHERE pseudonyme = :pseudonyme";
        echo $SQL_UPDATE;
        $requeteUpdate = BaseDeDonnees::getConnexion()->prepare($SQL_UPDATE);
        $requeteUpdate->bindParam(':motdepasse', $securite['motdepasse'], PDO::PARAM_STR);
        $requeteUpdate->bindParam(':courriel', $securite['courriel'], PDO::PARAM_STR);
        $requeteUpdate->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteUpdate->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $requeteUpdate->execute();
        $membreModifie = $requeteUpdate->fetch();

        return $membreModifie;
    }

    public static function lireMembreParPseudonyme($pseudonyme)
    {
        $SQL_LIRE_MEMBRE = "SELECT * FROM membre WHERE pseudonyme = :pseudonyme";
        $requeteMembre = BaseDeDonnees::getConnexion()->prepare($SQL_LIRE_MEMBRE);
        $requeteMembre->bindParam(':pseudonyme', $pseudonyme, PDO::PARAM_STR);
        $requeteMembre->execute();
        $membre = $requeteMembre->fetch();

        return $membre;
    }

    public static function enregistrerMembre($nouveauMembre, $avatar)
    {
        $AJOUTER_MEMBRE = "INSERT INTO membre(prenom, nom, pseudonyme, motdepasse, courriel, avatar)
                           VALUES (:prenom, :nom, :pseudonyme, :motdepasse, :courriel, :avatar)";
        $requeteAddMember = BaseDeDonnees::getConnexion()->prepare($AJOUTER_MEMBRE);
        $requeteAddMember->bindParam(':prenom', $nouveauMembre['prenom'], PDO::PARAM_STR);
        $requeteAddMember->bindParam(':nom', $nouveauMembre['nom'], PDO::PARAM_STR);
        $requeteAddMember->bindParam(':pseudonyme', $nouveauMembre['pseudonyme'], PDO::PARAM_STR);
        $requeteAddMember->bindParam(':motdepasse', $nouveauMembre['motdepasse'], PDO::PARAM_STR);
        $requeteAddMember->bindParam(':courriel', $nouveauMembre['courriel'], PDO::PARAM_STR);
        $requeteAddMember->bindParam(':avatar', $avatar, PDO::PARAM_STR);

        $reussiteInscription = $requeteAddMember->execute();

        return $reussiteInscription;

    }
}
