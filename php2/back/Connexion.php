<?php
session_start();
if(isset($_SESSION['id'])){?>
<meta http-equiv="refresh" content="0;URL=index.html">
<?php
}
else{ ?>
<html>
<head>
<?php require_once('headAdmin.php'); ?>
</head>

<body>
  <main>
<div class="grid-container">
    <?php if(!isset($_SESSION['id'])){
      require_once('backAdmin/connect.php');
      ?>

      <div class="connect">
        <center><a href='index.php'>Retour accueil</a></center>
        <center><form class="flex-form" action="connect.php" method="post">
          <input type="text" name="login" placeholder="Identifiant" required>
          <input type="password" name="pwd" placeholder="Mot de passe" required>
          <input type="submit" name="submitConnect" value="Valider">
        </form></center>
        <?php if(isset($message)){echo($message);} ?>
      </div>

</div>
</main>
</body>

</html>
<?php }}
?>