<?php
include "db.php"; // Fichier de connexion à la base de données

// Vérifier si une mise à jour a été soumise
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['statut'])) {
    $id = $_POST['id'];
    $statut = $_POST['statut'];

    try {
        $stmt = $pdo->prepare("UPDATE commandes SET statut = :statut WHERE id = :id");
        $stmt->execute([':statut' => $statut, ':id' => $id]);
        $message = "Le statut de la commande a été mis à jour.";
    } catch (PDOException $e) {
        $message = "Erreur : " . $e->getMessage();
    }
}

// Récupérer les commandes
$commandes = $pdo->query("SELECT id, clients.nom, commandes.produit, commandes.statut 
                          FROM commandes 
                          JOIN clients ON commandes.client_id = clients.client_id")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le statut des commandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
    <h1 class="text-2xl font-bold mb-4">Gestion des commandes</h1>

    <?php if (isset($message)): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-4">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Commande ID</th>
                <th class="border p-2">Client</th>
                <th class="border p-2">Produit</th>
                <th class="border p-2">Statut</th>
                <th class="border p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande): ?>
                <tr class="border">
                    <td class="border p-2"><?= $commande['id'] ?></td>
                    <td class="border p-2"><?= htmlspecialchars($commande['nom']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($commande['produit']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($commande['statut']) ?></td>
                    <td class="border p-2">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?= $commande['id'] ?>">
                            <select name="statut" class="p-1 border rounded">
                                <option value="en attente" <?= $commande['statut'] === 'en attente' ? 'selected' : '' ?>>En attente</option>
                                <option value="validée" <?= $commande['statut'] === 'validée' ? 'selected' : '' ?>>Validée</option>
                                <option value="livrée" <?= $commande['statut'] === 'livrée' ? 'selected' : '' ?>>Livrée</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded ml-2">Modifier</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
