<html>
<form method="POST" action="Inscription.php">
<?php
session_start();
include ('fonction.php');

$_SESSION["login"] = $_POST['login'];
$login = $_SESSION["login"];
$_SESSION["password"] = $_POST['password'];
$password = $_SESSION["password"];
$image = GetImageUser($login);
$_SESSION["urlImage"] = $image;

$resultat = VerifUtilisateur($login, $password);

if (!$resultat) {
	echo "Utilisateur inconnu, voulez-vous vous inscrire ? <br> <br>";
	echo "<input type='submit' value='Inscription'>";
}
else {
	$r = ModifPers($login);
	echo $r;
	header ("Refresh:3;URL=message.php");
	exit;
}

?>
</form>
</html>