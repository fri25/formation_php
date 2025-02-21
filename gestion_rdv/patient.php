<?php 

require "db.php";

$search = isset($_GET['search']) ? trim($_GET['search']) : "";

if (!empty($search)) {
    $requete = $pdo->prepare("SELECT * FROM patients WHERE nom_prenom LIKE :search");
    $requete->bindValue(':search', "%" . $search . "%", PDO::PARAM_STR);
    $requete->execute();
} else {
    $requete = $pdo->query("SELECT * FROM patients");
}

$patients = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html> 
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes Patients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-900 min-h-screen flex flex-col items-center p-6">

<!-- barre de navigation -->

<nav class="bg-green-50 dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MediSync</span>
  </a>
  <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      
      <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
        <a href="index.php" class="block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">Home</a>
      </li>
      <li>
        <a href="index.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
      </li>
      <li>
        <a href="index.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
      </li>
      <li>
        <a href="index.php" class="block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
 <br> <br> <br>
 
    <h2 class="bg-green-500 text-white text-center text-2xl font-bold p-4 rounded-lg shadow-md w-full max-w-4xl">
        Liste des patients
    </h2> <br> 
    
    <form method="GET" class="my-4 w-full max-w-4xl flex justify-between">
        <input type="text" name="search" placeholder="Rechercher un patient" class="w-full p-2 border rounded-lg" value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg ml-2 hover:bg-green-700">Rechercher</button>
    </form>

    <div class="my-6 w-full max-w-4xl flex justify-end">
        <a class="bg-green-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-pink-700 transition" href="form_patient.php">
            Ajouter un patient
        </a>
    </div>
    
    <div class="overflow-x-auto w-full max-w-4xl">
        <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-green-300 text-gray-800">
                <tr>
                    <th class="py-3 px-4 text-left">NUM</th>
                    <th class="py-3 px-4 text-left">NOM ET PRENOM</th>
                    <th class="py-3 px-4 text-left">TELEPHONE</th>
                    <th class="py-3 px-4 text-left">EMAIL</th>
                    <th class="py-3 px-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-300">
                <?php foreach ($patients as $patient): ?>
                    <tr class="hover:bg-green-100 transition">
                        <td class="py-3 px-4"> <?= htmlspecialchars($patient['id_patient']) ?> </td>
                        <td class="py-3 px-4"> <?= htmlspecialchars($patient['nom_prenom']) ?> </td>
                        <td class="py-3 px-4"> <?= htmlspecialchars($patient['telephone']) ?> </td>
                        <td class="py-3 px-4"> <?= htmlspecialchars($patient['email']) ?> </td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="modifier_patients.php?id_patient=<?= $patient['id_patient'] ?>" 
                               class="bg-gray-900 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition">Modifier</a>
                            
                            <a href="supprimer_patients.php?id_patient=<?= $patient['id_patient'] ?>" 
                               class="delete-patient bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-700 transition">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const deleteLinks = document.querySelectorAll(".delete-patient");

            deleteLinks.forEach(link => {
                link.addEventListener("click", function (event) {
                    event.preventDefault();
                    const url = this.getAttribute("href");
                    Swal.fire({
                        title: "Êtes-vous sûr ?",
                        text: "Cette action est irréversible !",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Oui, supprimer !",
                        cancelButtonText: "Annuler"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>

</body>
</html>
