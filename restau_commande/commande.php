<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = $_POST['client_id'];
    $produit = $_POST['produit'];
    $statut = $_POST['statut'];

    if (empty($client_id) || empty($produit) || empty($statut)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO commandes (client_id, produit, statut) VALUES (:client_id, :produit, :statut)");
            $stmt->execute([':client_id' => $client_id, ':produit' => $produit, ':statut' => $statut]);
            header("Location: commande.php");
            exit;
        } catch (PDOException $e) {
            $error = "Une erreur est survenue : " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passer une commande</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg">
        <h1 class="text-3xl font-bold underline text-center mb-4">PASSEZ UNE COMMANDE</h1>
        
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            
            <!-- Sélection du client -->
            <div class="mb-4">
                <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Nom du client :</label>
                <select name="client_id" id="client_id" class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow focus:outline-none focus:shadow-outline">
                    <option >Sélectionner un client</option>
                    <?php 
                        try {
                            $requete = "SELECT * FROM clients"; 
                            $stmt = $pdo->query($requete);
                            $clients = $stmt->fetchAll();

                            foreach ($clients as $client): ?>
                                <option value="<?= htmlspecialchars($client['client_id']); ?>">
                                    <?= htmlspecialchars($client['nom']); ?>
                                </option>
                            <?php endforeach; 

                        } catch (PDOException $e) {
                            echo "<p class='text-red-500'>Erreur de connexion : " . $e->getMessage() . "</p>";
                        }
                    ?>
                </select>
            </div>

            <!-- Champ produit -->
            <div class="mb-4">
                <label for="produit" class="block text-gray-700 text-sm font-bold mb-2">Produit :</label>
                <input type="text" name="produit" id="produit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div> 

            <!-- Sélection du statut -->
            <div class="mb-4">
                <label for="statut" class="block text-gray-700 text-sm font-bold mb-2">Statut :</label>
                <select name="statut" id="statut" class="block w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow focus:outline-none focus:shadow-outline">
                    <option value="en attente">En attente</option>
                    <option value="validée">Validée</option>
                    <option value="livrée">Livrée</option>
                </select>
            </div>

            <!-- Boutons -->
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Commandez</button>
                <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Annuler</a>
            </div>
        </form>
    </div>
</body>
</html>
