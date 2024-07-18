<?php
include 'test.php'; 
include_once './test.php';

try {
    $sql = "SELECT * FROM pharmacie;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '<div class="error">Erreur de connexion à la base de données : ' . htmlspecialchars($e->getMessage()) . '</div>';
    $products = [];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZZ-SAF Page Login</title>
    <link rel="stylesheet" href="stock.css"> 
</head>
<body>
<div class="pharmacie">
    <div class="page-container align-top">
        <div class="flex-col-container">
            <div class="filter-wrapper">
                <div class="filter-header">
                    <label for="filter">Filtres :</label>
                    <button class="button-outlined" type="submit" form="filter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"/>
                            <path d="M21 21l-6 -6"/>
                        </svg>
                    </button>
                </div>
                <form class='form-filter-user padding-one' id='filter' action='<?php echo htmlspecialchars($host); ?>/product/filter' method='GET'>
                    <div class="textfield-label">
                        <label for="searchbar">Rechercher</label>
                        <input type='text' name='search' id='searchbar' value='<?php echo isset($data["searchName"]) ? htmlspecialchars($data["searchName"]) : ''; ?>'>
                    </div>
                    <div class="textfield-label">
                        <label for="filterBy">Catégorie</label>
                        <select name="category" id="filterBy">
                            <option value='all'>Tous</option>
                            <?php if (isset($data["categories"])): ?>
                                <?php foreach ($data["categories"] as $category): ?>
                                    <option value='<?php echo htmlspecialchars($category["id_cat"]); ?>' <?php echo $data["filterCat"] == $category["id_cat"] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category["name_cat"]); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </form>
                <form class='filter-footer' action='<?php echo htmlspecialchars($host); ?>/product' method='GET'>
                    <button class="button-outlined" type="submit">Réinitialiser les filtres</button>
                </form>
            </div>

            <div>
                <?php if (isset($data["error"])): ?>
                    <span class='text-error'><?php echo htmlspecialchars($data["error"]); ?></span>
                <?php endif; ?>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>  
                        <th>Prix (€)</th>
                        <th>Stock</th>
                        <th>Date D'Expiration</th>                   
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['id']); ?></td>
                            <td><?php echo htmlspecialchars($product['nom']); ?></td>
                            <td><?php echo htmlspecialchars($product['prix']); ?></td>
                            <td><?php echo htmlspecialchars($product['stock']); ?></td>
                            <td><?php echo htmlspecialchars($product['date_expiration']); ?></td>
                            <td>
                            <a href="detail.php?id=<?php echo urlencode($product['id']); ?>" class="button-detail">Détail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
