<?php
session_start();
echo"au revoir" . $_SESSION['user_name'] . "<br>";
session_unset();
session_destroy();
?>
<p><a href='accueil.html'>Revenir à l'accueil</a></p>