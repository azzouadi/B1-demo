<?php
require './test.php';
 
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
 
    $sql = 'SELECT * FROM users WHERE email = :email';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
 
    $userpassword = $user['password'];
    if ($user) {
        if ($password === $userpassword) {
            header('Location: ./action.php');
        } else {
            echo "Identifiants invalides <br/>";
            echo "<a href='./index.php'> Revenir à la page de connexion</a>";
        }
    }  else {
        echo "Identifiants invalides <br/>";
        echo "<a href='./index.php'> Revenir à la page de connexion</a>";
    }
}
?>
