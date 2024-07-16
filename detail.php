<?php
include './test.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $stock = htmlspecialchars($_POST['stock']);
        $expiration = htmlspecialchars($_POST['expiration']);

        try {
            $sql_update = "UPDATE pharmacie SET nom = :nom, prix = :prix, stock = :stock, date_expiration = :expiration WHERE id = :id";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->execute([
                'id' => $id,
                'nom' => $nom,
                'prix' => $prix,
                'stock' => $stock,
                'expiration' => $expiration
            ]);

            header('Location: action.php');
            exit(); 
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    try {
        $sql = "SELECT * FROM pharmacie WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        exit();
    }

    if (!$product) {
        echo "Produit non trouvé";
        exit();
    }
} else {
    echo "ID du produit non spécifié";
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour un produit</title>
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <div class="container">
        <h1>Mettre à jour un produit</h1>
        <form action="detail.php?id=<?php echo $id; ?>" method="post">
            <label for="nom">Nom du produit</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($product['nom']); ?>" required>
            <label for="prix">Prix du produit</label>
            <input type="number" step="0.01" id="prix" name="prix" value="<?php echo htmlspecialchars($product['prix']); ?>" required>
            <label for="stock">Stock disponible</label>
            <input type="number" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
            <label for="expiration">Date d'expiration</label>
            <input type="date" id="expiration" name="expiration" value="<?php echo htmlspecialchars($product['date_expiration']); ?>" required>
            <input type="submit" value="Mettre à jour">
        </form>
        <a href="action.php">Retour à la liste des produits</a>
    </div>
</body>
</html>
