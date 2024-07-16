* Tout d'abord, j'ai créé une base de données que j'ai nommée `isitech`.

J'ai créé deux tables :
1. **pharmacie** :
   - Cette table contient les informations liées aux pharmacies.

2. **users** :
   - Cette table contient les informations sur les utilisateurs qui créent un nouveau compte sur le site.

Sur la page `index.php`, on peut trouver la page de connexion du site qui permet de se connecter à l'interface ou de créer un compte utilisateur. Les informations saisies lors de la création d'un compte sont stockées dans la table `users` grâce au code suivant, que j'ai placé dans `post_user.php` :


```
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
```

au moment de se connecter avec un email on trouve un stock de produits pharmaceutique avec des info comme (`l'id`; `nom`; `date d'expiration`; `stock`; `Prix €`; `Detail`)  toutes ces donnees proviennent directement de la base de donnees sql grace au PDO que j'ai configure dans le **test.php**:

```
<?php
$host = 'localhost';
$db   = 'isitech';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
} 
```
et grace a cette connexion a la base sql je peux recuperer toutes les donnees et aussi les modifier pour qu'elle se mettent a jour dans le site.

Quand j'appuie sur le detail de chaque produit je recupere automatiquement l'ID et ça me mets ce message par exemple : 
``Vous avez recupere l'ID 3``
Pour avoir ce message automatiquement avec chaque ID de chaque produit lui correspondant : 

```
<?php
if(isset($_GET['id'])) {
    echo "Vous avez recupere l'ID ";
    echo $_GET['id'];
}
?>
```
