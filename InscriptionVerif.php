<html>
<?php
include ("fonction.php");
$login = $_POST['login'];
$password = $_POST['password'];
$urlImage = $_POST["urlImage"];
$retour = VerifUtilisateur ($login, $password);
if ($retour) {
	echo "Cet utilisateur existe déjà.";
}
else {
	Inscription($login, $password, $urlImage);
	echo "Merci de patienter :)";
	header ("Refresh: 2;URL=AccueilProjetMessagerie.php");
}
?>
</html>