<!DOCTYPE html>
<?php
session_start();
include("fonction.php");
?>
<html lang="en">
<head>
  <title>messages</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

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
<div class="container">
<form method="POST" action="forum.php">
<table class="table table-bordered table-sm table-hover">
    <thead  class="thead-light">
      <tr>
        <th>Theme</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$lesTheme = GetTheme();
    	foreach ($lesTheme as $theme) {
        echo "<tr>
          <td>"."<input type = 'submit' name = 'btnTheme' value = '".$theme["theme"]."'></td>
        </tr>";
      }?>
      </tbody>
  </table>
<table class="table table-bordered table-sm">
    <thead>
      <tr>
        <th>Envoyé par</th>
        <th>Commentaire</th>
        <th>Heure du poste</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($_POST["btnTheme"])) {
        $lesMessageDuTheme = GetMessageDuTheme($_POST["btnTheme"]);
      foreach ($lesMessageDuTheme as $message) {
          echo "<tr>
            <td>". $message["loginRedacteur"]."</td>
            <td>". $message["message"] ."</td>
            <td>". $message["heureDateCreation"]."
          </tr>";
       }
      }
      ?>
    </tbody>
</table>
  <table class="table table-bordered table-sm">
    <tbody>
      <tr>
        <td>Choisir le thème de votre message :</td>
        <td rowspan="2">
          <select name="lstTheme">
            <?php
            $lesTheme = GetTheme();
            foreach ($lesTheme as $t) {
              echo '<option value = "'.$t["theme"].'">'.$t["theme"].'</option>';
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
        if (isset($_POST['txtMessage']) && ($_POST['txtMessage'] != "") && (isset($_POST["lstTheme"]))) {
          $theme = $_POST["lstTheme"];
          $retour = InsertionMessageForum($_POST['txtMessage'], $_SESSION["login"], $theme);
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