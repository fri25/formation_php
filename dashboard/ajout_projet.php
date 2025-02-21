<?php
    include "db.php";

    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_projet = $_POST['nom_projet'];
    $date_crea = $_POST['date_crea'];
    $description = $_POST['description'];
    $statut = $_POST['statut'];
    $budget = $_POST['budget'];


    // Validation des données
    if (empty($nom_projet) || empty($date_crea) || empty($description) || empty($budget)) {
        $error = "Tous les champs sont obligatoires.";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO projet (nom_projet, date_crea, description, statut, budget) VALUES (:nom_projet, :date_crea, :description, :statut, :budget)");
            $stmt->execute([':nom_projet' => $nom_projet, ':date_crea' => $date_crea, ':description' => $description, ':statut' => $statut, ':budget' => $budget]);
            header("Location:dashboard.php");
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
    <title>Ajouter projet</title>
    <!-- tailwindcss -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="w-full items-center">
        <h1 class="text-3xl font-bold underline  text-center">Ajouter projet</h1>
        <?php if (isset($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST" action="" class="bg-white shadow-md rounded px-40 pt-15 pb-8">
            <div class="mb-4">
                <label for="nom_projet" class="block text-gray-700 text-sm font-bold mb-2" for="nnom_projet">nom_projet :</label>
                <input type="text" name="nom_projet" id="nom_projet" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="date_crea" class="block text-gray-700 text-sm font-bold mb-2" for="date_crea">date_crea :</label>
                <input type="date" name="date_crea" id="date_crea" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2" for="description">description :</label>
                <input type="text" name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="statut" class="block text-gray-700 text-sm font-bold mb-2" for="statut">statut :</label>
                <input type="text" name="statut" id="statut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="budget" class="block text-gray-700 text-sm font-bold mb-2" for="budget">budget :</label>
                <input type="text" name="budget" id="budget" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
               <input type="reset" value="annuler" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">    
            </div>
        </form>
    </div>
</body>
</html> 