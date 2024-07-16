
<?php
include './test.php';
if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $id = null;
 
    $sql = "INSERT INTO users (id, username, email, password) VALUES (:id, :username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id, 'username' => $nom, 'email' => $email, 'password' => $password]);
 
    header('Location: ./index.php');
    exit();
}
?>