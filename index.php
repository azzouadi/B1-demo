<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZZ-SAF Page Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>AZZSAF</h1>
          
        <p>AZZSAF vous aide à vous connecter<br> Ce site est fait pour gérer le stock.</p>
    </div>

    <header>
        <div class="box">
            <form action="action.php" method="post">
                <input type="email" name="nom" id="nom" placeholder="Nom d'utilisateur" required><br>
                <input type="text" name="mot de passe oublie" placeholder="mot de passe" required/><br>
                <input type="submit" value="Connexion">
            </form>
        </div>

        <nav>
            <ul>
            <li><a href="mdp_oublie.php">Changer de mot de passe</a></li>
            <li><a href="creer_compte.php">Nouveau Compte</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
