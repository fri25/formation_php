<?php
require 'db.php'; // Connexion à la base de données

// Fonction pour retourner la liste des contacts
function getContacts($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM contacts");
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($contacts);
}

// Fonction pour ajouter un nouveau contact
function addContact($pdo) {
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->name) || !isset($data->email) || !isset($data->phone)) {
        echo json_encode(['error' => 'Missing required fields']);
        return;
    }

    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone) VALUES (:name, :email, :phone)");
    $stmt->bindParam(':name', $data->name);
    $stmt->bindParam(':email', $data->email);
    $stmt->bindParam(':phone', $data->phone);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Contact added successfully']);
    } else {
        echo json_encode(['error' => 'Failed to add contact']);
    }
}

// Fonction pour mettre à jour un contact
function updateContact($pdo) {
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->id) || !isset($data->name) || !isset($data->email) || !isset($data->phone)) {
        echo json_encode(['error' => 'Missing required fields']);
        return;
    }

    $stmt = $pdo->prepare("UPDATE contacts SET name = :name, email = :email, phone = :phone WHERE id = :id");
    $stmt->bindParam(':id', $data->id);
    $stmt->bindParam(':name', $data->name);
    $stmt->bindParam(':email', $data->email);
    $stmt->bindParam(':phone', $data->phone);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Contact updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update contact']);
    }
}

// Fonction pour supprimer un contact
function deleteContact($pdo) {
    $data = json_decode(file_get_contents("php://input"));

    if (!isset($data->id)) {
        echo json_encode(['error' => 'Missing contact ID']);
        return;
    }

    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
    $stmt->bindParam(':id', $data->id);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Contact deleted successfully']);
    } else {
        echo json_encode(['error' => 'Failed to delete contact']);
    }
}

// Fonction principale pour gérer le routage
function handleRequest($pdo) {
    // Vérifier la méthode HTTP
    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            getContacts($pdo);
            break;
        case 'POST':
            addContact($pdo);
            break;
        case 'PUT':
            updateContact($pdo);
            break;
        case 'DELETE':
            deleteContact($pdo);
            break;
        default:
            echo json_encode(['error' => 'Method not allowed']);
            break;
    }
}

// Appel de la fonction de gestion des requêtes
handleRequest($pdo);

$pdo = null; // Fermer la connexion à la base de données
?>
