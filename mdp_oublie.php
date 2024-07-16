
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Réinitialiser le mot de passe</h1>
        <form action="mdp_oublie.php" method="post">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="submit" value="Réinitialiser le mot de passe">
        </form>
    </div>
</body>
</html>

<?php
if (
    isset($_SESSION["user_email"]) &&
    isset($_POST["ancien_mdp"]) &&
    isset($_POST["nouveau_mdp"])
) {
    require_once ROOT . "app/controllers/Nouveau_mdp.php";
    $nouveau_mdp = new \ppe4\controllers\Nouveau_mdp();
    $nouveau_mdp->modifier_mot_de_passe(
        $_SESSION["user_email"],
        $_POST["ancien_mdp"],
        $_POST["nouveau_mdp"],
    );
}
if (isset($_SESSION["user_email"]) && isset($_POST["ancien_mdp"])) {
    require_once ROOT . "app/controllers/Nouveau_mdp.php";
    $nouveau_mdp = new \ppe4\controllers\Nouveau_mdp();
    $nouveau_mdp->mot_de_passe_utilisateur_valide(
        $_SESSION["user_email"],
        $_POST["ancien_mdp"],
    );
}
?>

