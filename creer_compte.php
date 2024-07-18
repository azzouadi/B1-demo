<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="styles.css">
</head>
<?php
include_once './test.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST["nom"]) &&
        isset($_POST["email"]) &&
        isset($_POST["password"])
    ) {
        $nom = htmlspecialchars($_POST["nom"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO users (nom, email, password) VALUES (:nom, :email, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'nom' => $nom,
                'email' => $email,
                'password' => $password
            ]);
            echo "Compte créé avec succès.";
        } catch (Exception $e) {
            echo 'Erreur de connexion à la base de données : ' . htmlspecialchars($e->getMessage());
        }
    }
}
?>
<body>
    <div class="container">
        <h1>Créer un compte</h1>
        <form action="post_user.php" method="post">
            <input type="text" name="nom" placeholder="Nom" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Mot de passe" required><br>
            <input type="submit" value="Créer le compte">
        </form>
    </div>
</body>
</html>

