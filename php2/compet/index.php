<?php

//j'active la gestion et l'affichage des erreur parce je suis en dev.
//En prod je fais pas ça !!!

    ini_set('error reporting',E_ALL);
    ini_set('display error', true);
    session_start();
    $connected= isset($_SESSION['user_name']);
    require_once('db.php');
    //Ici on va gérer les différents formulaires
    if(isset($_POST['submit'])){
        switch($_POST['submit']) {
            case 'login' :
                //il faut logger l'utilisateur
                //on dispose de l'id de l'utilisateur mais pas de son prenom
                $rqtUser = "SELECT * FROM projet WHERE id_projet = ? ";
                try {
                    $stmt = $pdo->prepare($rqtUser);
                    $stmt->execute([$_POST['id_utilisateur']]);
                    $prenom = $stmt->fetch()[1];
                    $_SESSION['projet_name'] = $id_user;
                    $_SESSION['id_utilisateur'] = $_POST['id_utilisateur'];
                    $connected = TRUE;
                } catch (Exception $e){
                    $e->getMessage();
                }
                break;
            case 'supprimer' : // on supprime la compétence d'un utilisateur
                    $id_user = $_SESSION['id_utilisateur'];
                    $id_Cpt = $_POST['compet'];
                try {
                    $rqtSupp = "DELETE FROM competence_utilisateur WHERE id_competence = :idc
                    AND id_utilisateur = :idu ";
                    $stmtSupp = $pdo->prepare($rqtSupp);
                    $stmtSupp->execute(['idc' => $id_Cpt, 'idu' => $id_user]);
                }catch (exception $e) {
                    $e->GetMessage();
                }
                break;
            case 'ajouter' : // on ajouter une compétence d'un utilisateur
            case 'modifier' // modifier une compétence d'un utilisateur
                $id_user = $_SESSION['id_utilisateur'];
                $id_Cpt = $_POST['compet'];
                $niveaux = $_POST['niveaux']
            try{
                $rqtcheck = "INSERT INTO niveaux, competence_utilisateur VALUES (id_utilisateur, id_Cpt, id_niv) ON DUPLICATE KEY UPDATE";
                $stmtAdd =
            }
        }

    }
    ?>
        <html>
            <head>
                <title> Un titre c'est bien</title>
            </head>
            <body>
                <text>Page portfolio compétence</text>
    

<?php
    //si aucun utilisateur n'est connecté, on affiche un formulaire de connexion
    if(!$connected) {
        include('auth.php');

    } else {
        echo $_SESSION['user_name'] ."est connecté";

    //sinon, on affiche ses compétence, et un formulaire de déconnexion
    
    include('deco.php');
    include('competence.php');
    include('competence_form.php');
    
    }
?>