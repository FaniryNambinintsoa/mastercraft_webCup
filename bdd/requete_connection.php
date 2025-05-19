<?php
include('bdconnect.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();  // Démarre la session si elle n'est pas déjà démarrée
}

// 1) Vérifier que les champs existent
if (isset($_POST['adresse_email']) && isset($_POST['mdp'])) {
    $adresse_email = $_POST['adresse_email'];
    $mdp           = $_POST['mdp'];

    // 2) Récupérer l’utilisateur par email
    $requete = $bdd->prepare('SELECT *
                              FROM utilisateurs 
                              WHERE adresse_email = :adresse_email');
    $requete->bindValue(':adresse_email', $adresse_email);
    $requete->execute();
    $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
        if ($mdp == $utilisateur['mdp']) {
            $_SESSION['id_users']     = $utilisateur['id'];
            $_SESSION['nom_complet']  = $utilisateur['nom_complet'];
            $_SESSION['adresse_email']= $utilisateur['adresse_email'];
            $_SESSION['genre']        = $utilisateur['genre'];
            header("Location: ../index.php?login=loginsuccess");
            exit();
        } else {
            $message = 'Mot de passe incorrect';
            header("Location: ../index.php?login=mdp_error");
        }
    } else {
        $message = 'Utilisateur inexistant';
        header("Location: ../index.php?login=email_error");
    }    

    
}
