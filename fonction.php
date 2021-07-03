<?php
function VerifUtilisateur ($login, $password)
{
	$retour = false;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select * from utilisateur where login = '$login' and password = '$password';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}
function Inscription ($login, $password, $urlImage)
{
	$retour = false;
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "insert into utilisateur VALUES ('$login', '$password', CURRENT_TIMESTAMP, NULL, '$urlImage');";
    $retour = $bdd->exec($requete);
    return $retour;
}
function GetImageUser($login) {
    $retour = null;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select urlImage from utilisateur where login = '$login';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}
function GetUtilisateurs()
{
	$retour = null;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select login from utilisateur;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function InsertionMessage($contenuMessage, $loginRedacteur, $loginDestinataire)
{
	$retour = false;
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "insert into message VALUES (NULL, '$contenuMessage', CURRENT_TIMESTAMP, 
    '$loginRedacteur', '$loginDestinataire');";
    $retour = $bdd->exec($requete);
    return $retour;
}
function InsertionMessagePublic($contenuMessage, $loginRedacteur)
{
    $retour = false;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "insert into messagepublique VALUES (NULL, '$contenuMessage', CURRENT_TIMESTAMP, 
    '$loginRedacteur');";
    $retour = $bdd->exec($requete);
    return $retour;
}
function InsertionMessageForum($contenuMessage, $loginRedacteur, $theme)
{
	$retour = false;
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "insert into forum VALUES (NULL, '$contenuMessage', CURRENT_TIMESTAMP, 
    '$loginRedacteur', '$theme');";
    $retour = $bdd->exec($requete);
    return $retour;
}
function GetMessage($loginDestinataire)
{
    $retour = null;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select * from message where LoginDestinataire = '$loginDestinataire' ;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function GetMessagePublic()
{
    $retour = null;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select * from messagePublique;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function GetTheme()
{
    $retour = null;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select * from theme;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function GetMessageDuTheme($theme)
{
    $retour = null;
    $bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select * from forum where theme = '$theme';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
function ModifPers($login) {
    $retour = false;
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "UPDATE `utilisateur` SET `heureDateConnexion`= CURRENT_TIMESTAMP where login = '$login';";
    $retour = $bdd->exec($requete);
    return $retour;
}
function AfficherHeureDatePseudo($login) {
    $retour = null;
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select login, heureDateConnexion from utilisateur where login = '$login';";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetch();
    return $retour;
}
function FiltrerMessages() {
    $retour = false;
	$bdd = new PDO('mysql:host=localhost;port=3308;dbname=bddmessagerie', 'root', '')
        or die('Erreur connexion à la base de données');
    $requete = "select * from filtre;";
    $resultat = $bdd->query($requete);
    $retour = $resultat->fetchAll();
    return $retour;
}
?>