<?php
    if(!isset($_SESSION['user_name'])) {
       exit();
    }
    require_once('db.php');
    $user_name = $_SESSION['user_name'];
    $user_id = $_SESSION['user_id'];
    $rqtUC = "SELECT * FROM competence_utilisateur uc JOIN competence c on c.id_competence = uc.id_competence where uc.id_utilisateur = ?";
    try {
    $stmt = $pdo->prepare($rqtUC);
    $stmt->execute([$user_id]);
    } catch(Exception $e) {
        $e->getMessage();
    }
?>
<div>
    <?php
        while($c = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div>";
            echo "<img height='40px' width='40' src='" .$c['logo'] . "'/>";
            echo "<span>" . $c['libelle'] . "</span><span>" . $c['niveau'] . "</span>";
            echo "</div>";

        }
?>
</div>