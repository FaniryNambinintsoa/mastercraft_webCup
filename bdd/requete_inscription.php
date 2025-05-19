<?php
include('bdconnect.php');
if (session_status() === PHP_SESSION_NONE) {
  session_start();  // Démarre la session si elle n'est pas déjà démarrée
}

if (
    isset($_POST["nom_complet"]) &&
    isset($_POST["adresse_email"]) &&
    isset($_POST["mdp"]) &&
    isset($_POST["conf_mdp"]) &&
    isset($_POST["genre"])
) {
    $nom_complet   = $_POST["nom_complet"];
    $adresse_email = $_POST["adresse_email"];
    $mdp           = $_POST["mdp"];
    $conf_mdp      = $_POST["conf_mdp"];
    $genre         = $_POST["genre"];

    // 1) Vérifier que l'email n'existe pas
    $requete = $bdd->prepare('SELECT COUNT(*) FROM utilisateurs WHERE adresse_email = :adresse_email');
    $requete->bindValue(":adresse_email", $adresse_email);
    $requete->execute();
    $verification = $requete->fetchColumn();

    if ($verification > 0) {
        // Email déjà utilisé
        header("Location: ../index.php?signup=error_email");
        exit;
    }

    // 2) Vérifier que mdp et conf_mdp correspondent
    if ($mdp !== $conf_mdp) {
        header("Location: ../index.php?signup=error_mdp");
        exit;
    }

    // 3) Insérer l'utilisateur
    $requete = $bdd->prepare(
        'INSERT INTO utilisateurs (nom_complet, adresse_email, mdp, conf_mdp, genre)
         VALUES (?, ?, ?, ?, ?)'
    );
    $requete->execute([
        $nom_complet,
        $adresse_email,
        $mdp, $conf_mdp, 
        $genre
    ]);

    // 4) Redirection vers la page principale avec succès
    header("Location: ../index.php?signup=success");
    exit;
}
?>
