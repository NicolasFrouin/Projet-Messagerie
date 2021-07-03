<?php
session_start();
include("fonction.php");
?>
<html lang="en">
<head>
  <title>Messages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
$loginHeure = AfficherHeureDatePseudo($_SESSION["login"]);
echo "Votre pseudo est : ".$loginHeure['login']." et vos date et heure de connexion sont : ".$loginHeure['heureDateConnexion'];
//header("content-type:image/jpeg"); le .readfile ne se remplie pas correctement et le header fait arriver sur une page vide avec une image non chargée
// $image = $_SESSION["urlImage"];
// echo "<br>l'image est : ".$image;
//readfile($image);
// echo '<img="'.$image.'" alt="texte alternatif"/>';
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="forum.php">Forum</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="chatPublic.php">Messagerie publique</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="message.php">Messagerie privée</a>
    </li>
  </ul>
</nav>
<form method="POST" action="message.php">
  <div class="container">
  <table class="table table-bordered table-sm table-hover">
    <thead  class="thead-light">
      <tr>
        <th>Message</th>
        <th>Envoyé par</th>
        <th>Date Heure</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$lesmessages = getMessage($_SESSION["login"]);
    	foreach ($lesmessages as $message)
      		echo "<tr>
        		<td>". $message["message"] ."</td>
        		<td>". $message["loginRedacteur"]."</td>
        		<td>". $message["heureDateCreation"]."</td>
        		
      		</tr>"
      ?>
    </tbody>
  </table>
</div>

<div class="container">
  <table class="table table-bordered table-sm">
    <tbody>
      <tr>
        <td>Choisir le destinataire du message :</td>
        <td rowspan="2">
          <select name="lstDestinataire">
            <?php
            $username = GetUtilisateurs();
            foreach ($username as $log) {
              echo '<option value = "'.$log["login"].'">'.$log["login"].'</option>';
            } ?>
          </select><br>
        <TEXTAREA cols="60" rows="5" name="txtMessage"></TEXTAREA>
        </td>
      </tr>
      <tr>
        <td>Votre message: </td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:center;">
          <input type="submit" value="Envoyer" />
        </td>
        <?php 
        if (isset($_POST['txtMessage']) && isset($_POST["lstDestinataire"])) {
          $loginDestinataire = $_POST["lstDestinataire"];
          $retour = InsertionMessage($_POST['txtMessage'], $_SESSION["login"], $loginDestinataire);
          if ($retour == true) {
            echo "Message envoyé";
          }
        }
        ?>
      </tr>
    </tbody>
  </table>
</div>
</form>
</body>
</html>