<!DOCTYPE html>
<?php
session_start();
include("fonction.php");
?>
<html lang="en">
<head>
  <title>Messagerie publique</title>
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
<form method="POST" action="chatPublic.php">
  <div class="container text-center">
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
      $lesmessagesPublics = getMessagePublic();
      $motInterdits = FiltrerMessages();
      foreach ($lesmessagesPublics as $message) {
        foreach ($motInterdits as $mI) {
          if (!strstr($message["message"], $mI["mot"])) {
            echo "<tr>
            <td>".$message["message"]."</td>
            <td>".$message["loginRedacteur"]."</td>
            <td>".$message["heureDateCreation"]."</td>
          </tr>";
          }
        }
      }
      ?>
    </tbody>
  </table>
  </div>

  <div class="container">
    <table class="table table-bordered table-sm">
      <tbody>
        <tr>
          <td>Votre message :</td>
          <td>
            <TEXTAREA cols="60" rows="5" name="txtMessage"></TEXTAREA>
          </td>
        </tr>
        <tr>
          <td colspan="2" style="text-align:center;">
            <input type="submit" value="Envoyer" />
          </td>
          <?php 
          if (isset($_POST['txtMessage'])) {
            $retour = InsertionMessagePublic($_POST['txtMessage'], $_SESSION["login"]);
            if ($retour == true) {
              echo "Message envoyé";
              header("refresh:0");
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
